<template>
  <div>
    <template v-if="isLoading">
      <AppLoading />
    </template>
    <template v-else>
      <!-- <h3>Số lượng</h3> -->
      <b-row v-if="user && user.position == 0">
        <b-col cols="12" md="3">
          <div class="wrap wrap--color1">
            <div class="wrap__label">
              <div class="d-flex justify-content-between align-items-center">
                <p>{{ countRoom }}</p>
                <div class="wrap__button" @click.prevent="nextPage('RoomList')">
                  View
                </div>
              </div>
              Phòng
            </div>
          </div>
        </b-col>
        <b-col cols="12" md="3">
          <div class="wrap wrap--color2">
            <div class="wrap__label">
              <div class="d-flex justify-content-between align-items-center">
                <p>{{ countCustomer }}</p>
                <div
                  class="wrap__button"
                  @click.prevent="nextPage('CustomersList')"
                >
                  View
                </div>
              </div>
              Khách hàng
            </div>
          </div>
        </b-col>
        <b-col cols="12" md="3">
          <div class="wrap wrap--color3">
            <div class="wrap__label">
              <div class="d-flex justify-content-between align-items-center">
                <p>
                  {{
                    parseInt(AllRevenue) > 0
                      ? Intl.NumberFormat()
                          .format(AllRevenue)
                          .replace(/\./g, ",")
                      : Intl.NumberFormat()
                          .format(AllRevenue)
                          .replace(/\./g, ",")
                  }}Đ
                </p>
                <div class="wrap__button">View</div>
              </div>
              Tổng doanh thu
            </div>
          </div>
        </b-col>
        <b-col cols="12" md="3">
          <div class="wrap wrap--color4">
            <div class="wrap__label">
              <div class="d-flex justify-content-between align-items-center">
                <p>{{ countUser }}</p>
                <div class="wrap__button" @click.prevent="nextPage('Users')">
                  View
                </div>
              </div>
              Nhân viên
            </div>
          </div>
        </b-col>
      </b-row>
      <div else>
        <div class="d-flex position-relative">
          <div class="start_time mr-3">
            <label for="">Ngày bắt đầu</label>
            <br />
            <input type="datetime-local" class="form-control" />
          </div>
          <div class="start_time ml-3 mr-3">
            <label for="">Ngày kết thúc</label>
            <br />
            <input type="datetime-local" class="form-control" />
          </div>
          <div>
            <button
              class="form-control ml-3 position-absolute"
              style="
                background-color: blue;
                color: white;
                width: 100px;
                bottom: 0;
              "
              @click="search()"
            >
              Tìm kiếm
            </button>
          </div>
          <div style="margin-left: 120px" v-if="check_in">
            <button
              class="form-control ml-3 position-absolute"
              style="
                background-color: green;
                color: white;
                width: 100px;
                bottom: 0;
              "
              @click="checkIn"
            >
              Check In
            </button>
          </div>
          <div style="margin-left: 120px" v-if="!check_in">
            <button
              class="form-control ml-3 position-absolute"
              style="
                background-color: gray;
                color: white;
                width: 100px;
                bottom: 0;
              "
              @click="checkOut"
            >
              Check Out
            </button>
          </div>
        </div>
      </div>
    </template>
    <br /><br />
    <h3 v-if="user && user.position == 0">Số lượng khách hàng / tháng</h3>
    <LineChart v-if="user && user.position == 0" />
    <br /><br />
    <h3 v-if="user && user.position == 0">Doanh thu / tháng</h3>
    <BarChart v-if="user && user.position == 0" />
  </div>
</template>

<script>
import LineChart from "../views/ChartDashboard/LineChart.vue";
import BarChart from "../views/ChartDashboard/BarChart.vue";
import { mapGetters } from "vuex";
import moment from "moment";
export default {
  name: "Dashboard",
  components: {
    LineChart,
    BarChart,
  },
  data() {
    return {
      countRoom: null,
      countCustomer: null,
      AllRevenue: null,
      countUser: null,
      user: null,
      check_in: null,
    };
  },
  computed: {
    ...mapGetters({
      isLoading: "common/isLoading",
    }),
  },
  async created() {
    this.$store.dispatch("common/setIsLoading", true);
    await this.getCount();
    await this.$store.dispatch("auth/getAccount").then((res) => {
      this.user = res.data;
    });
    await this.checkTimeSheet();
    this.$store.dispatch("common/setIsLoading", false);
  },
  methods: {
    async checkTimeSheet() {
      await this.$store
      .dispatch("user/checkTimeSheet", this.user.id)
      .then((res) => {
        if (res.data) {
          if (res.check_in) {
            this.check_in = false;
          } else {
            this.check_in = true;
          }
        }
      });
    },
    color(value) {
      let $color;
      if (value <= 25) {
        $color = "info";
      } else if (value > 25 && value <= 50) {
        $color = "success";
      } else if (value > 50 && value <= 75) {
        $color = "warning";
      } else if (value > 75 && value <= 100) {
        $color = "danger";
      }
      return $color;
    },
    nextPage(name) {
      this.$router.push({ name: name });
    },
    getCount() {
      this.$store.dispatch("room/getCountRoom").then((response) => {
        this.countRoom = response.count;
      });
      this.$store.dispatch("customer/getCountCustomer").then((response) => {
        this.countCustomer = response.count;
      });
      this.$store.dispatch("bills/getRevenue").then((response) => {
        this.AllRevenue = response.Revenue;
      });
      this.$store.dispatch("user/getCountUser").then((response) => {
        this.countUser = response.count;
      });
    },
    checkIn() {
      let time = moment(new Date()).format("YYYY-MM-DDTHH:mm");
      const params = {
        user_id: this.user.id,
        time: time,
      };
      this.$store.dispatch("user/checkIn", params).then(() => {
        this.checkTimeSheet();
      });
    },
    checkOut() {
      let time = moment(new Date()).format("YYYY-MM-DDTHH:mm");
      const params = {
        user_id: this.user.id,
        time: time,
      };
      this.$store.dispatch("user/checkOut", params).then(() => {
        this.checkTimeSheet();
      });
    },
    search() {},
  },
};
</script>
<style lang="scss" scoped>
.wrap {
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  &--color1 {
    background-color: #321fdb;
  }
  &--color2 {
    background-color: #39f;
  }
  &--color3 {
    background-color: #f9b115;
  }
  &--color4 {
    background-color: #e55353;
  }
  &__label {
    font-size: 20px;
    p {
      margin-bottom: 0;
      font-size: 1.3125rem;
      font-weight: 600;
    }
  }
  &__button {
    display: inline-block;
    padding: 0.3rem 1.25rem;
    border-radius: 10rem;
    color: #fff;
    text-transform: uppercase;
    font-size: 1rem;
    letter-spacing: 0.15rem;
    transition: all 0.3s;
    position: relative;
    overflow: hidden;
    z-index: 1;
    &:after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #0cf;
      border-radius: 10rem;
      z-index: -2;
    }
    &:before {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0%;
      height: 100%;
      background-color: darken(#0cf, 15%);
      transition: all 0.3s;
      border-radius: 10rem;
      z-index: -1;
    }
    &:hover {
      color: #fff;
      &:before {
        width: 100%;
      }
    }
  }
  width: 100%;
  height: 160px;
  border-radius: 5px;
  color: #ffffff;
  padding: 20px;
  transition: transform 0.2s;
  cursor: pointer;
}
.wrap:hover {
  transform: scale(1.05);
}
</style>
