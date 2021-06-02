<template>
  <div>
    <template v-if="isLoading">
      <AppLoading />
    </template>
    <template>
      <!-- <h3>Số lượng</h3> -->
      <b-row>
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
                    ? Intl.NumberFormat().format(AllRevenue).replace(/\./g, ",")
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
              <div class="wrap__button" @click.prevent="nextPage('Users')">View</div>
            </div>
            Nhân viên
          </div>
        </div>
      </b-col>
    </b-row>
    </template>
    <br /><br />
    <h3>Số lượng khách hàng / tháng</h3>
    <LineChart />
    <br /><br />
    <h3>Doanh thu / tháng</h3>
    <BarChart />
  </div>
</template>

<script>
import LineChart from "../views/ChartDashboard/LineChart.vue";
import BarChart from "../views/ChartDashboard/BarChart.vue";
import { mapGetters } from "vuex";
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
      countUser: null
    };
  },
  computed: {
    ...mapGetters({
      isLoading: "common/isLoading",
    }),
  },
  created() {
    this.$store.dispatch("common/setIsLoading", true);
    this.getCount();
    this.$store.dispatch("common/setIsLoading", false);
  },
  methods: {
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
      })
    },
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
