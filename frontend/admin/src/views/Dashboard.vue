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
      <div v-if="user.position != 0">
        <div class="d-flex position-relative">
          <div class="start_time mr-3">
            <label for="">Ngày bắt đầu</label>
            <br />
            <input type="date" class="form-control" v-model="start_time" />
          </div>
          <div class="start_time ml-3 mr-3">
            <label for="">Ngày kết thúc</label>
            <br />
            <input type="date" class="form-control" v-model="end_time" />
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
        <div style="margin-top: 40px">
          <b-table
            striped
            hover
            :items="time_sheet"
            :fields="fields"
            :current-page="paginate.currentPage"
            v-if="time_sheet"
          >
            <template #cell(numerical)="row">
              {{
                ++row.index +
                (Number(paginate.page) - 1) * Number(paginate.perPage)
              }}
            </template>
            <template #cell(time_check_in)="row">
              <span v-if="row.item.time_check_in">
                {{ formatTime(row.item.time_check_in) }}
              </span>
            </template>
            <template #cell(time_check_out)="row">
              <span v-if="row.item.time_check_out">
                {{ formatTime(row.item.time_check_out) }}
              </span>
            </template>
            <template #cell(late)="row">
              <span
                v-if="
                  row.item.time_check_in &&
                  formatTime(row.item.time_check_in) >
                    formatTime('2017-06-01T06:00') &&
                  user.shift == 1
                "
              >
                {{
                  Math.floor(
                    (formatTimeHour(row.item.time_check_in) -
                      formatTimeHour("2017-06-01T06:00")) /
                      60
                  )
                }}:{{
                  formatTimeHour(row.item.time_check_in) -
                  formatTimeHour("2017-06-01T06:00") -
                  60 *
                    Math.floor(
                      (formatTimeHour(row.item.time_check_in) -
                        formatTimeHour("2017-06-01T06:00")) /
                        60
                    )
                }}
              </span>
              <span
                v-if="
                  row.item.time_check_in &&
                  row.item.time_check_in > formatTime('2017-06-01T18:00') &&
                  user.shift == 2
                "
              >
                {{
                  Math.floor(
                    (formatTimeHour(row.item.time_check_in) -
                      formatTimeHour("2017-06-01T18:00")) /
                      60
                  )
                }}:{{
                  formatTimeHour(row.item.time_check_in) -
                  formatTimeHour("2017-06-01T18:00") -
                  60 *
                    Math.floor(
                      (formatTimeHour(row.item.time_check_in) -
                        formatTimeHour("2017-06-01T18:00")) /
                        60
                    )
                }}
              </span>
            </template>
            <template #cell(soon)="row">
              <span
                v-if="
                  row.item.time_check_out &&
                  formatTime(row.item.time_check_out) <
                    formatTime('2017-06-01T17:30') &&
                  user.shift == 1
                "
              >
                {{
                  Math.floor(
                    (formatTimeHour("2017-06-01T17:30") -
                      formatTimeHour(row.item.time_check_out)) /
                      60
                  )
                }}:{{
                  formatTimeHour("2017-06-01T17:30") -
                  formatTimeHour(row.item.time_check_out) -
                  60 *
                    Math.floor(
                      (formatTimeHour("2017-06-01T17:30") -
                        formatTimeHour(row.item.time_check_out)) /
                        60
                    )
                }}
              </span>
              <span
                v-if="
                  row.item.time_check_out &&
                  formatTimeHour(row.item.time_check_out) <
                    formatTimeHourTomorrow('2017-06-01T05:30') &&
                  user.shift == 2
                "
              >
                {{
                  Math.floor(
                    (formatTimeHourTomorrow("2017-06-01T05:30") -
                      formatTimeHour(row.item.time_check_out)) /
                      60
                  )
                }}:{{
                  formatTimeHourTomorrow("2017-06-01T05:30") -
                  formatTimeHour(row.item.time_check_out) -
                  60 *
                    Math.floor(
                      (formatTimeHourTomorrow("2017-06-01T05:30") -
                        formatTimeHour(row.item.time_check_out)) /
                        60
                    )
                }}
              </span>
            </template>
            <template #cell(status)="row">
              <button
                class="form-control"
                @click="updateTime(row.item.id)"
                style="background-color: gray; width: 150px; color: white"
              >
                Bổ sung công
              </button>
            </template>
          </b-table>
          <div class="pagination" v-if="time_sheet">
            <b-pagination
              v-model="paginate.page"
              :total-rows="paginate.total"
              :per-page="paginate.perPage"
              @change="changePage"
            >
            </b-pagination>
          </div>
        </div>
      </div>
      <b-modal
        ref="modal-work-day"
        title="Cập nhật ngày công"
        centered
        hide-footer
      >
        <label for="">Ngày giờ bắt đầu</label>
        <br />
        <input
          type="datetime-local"
          v-model="work_start_time"
          class="form-control"
        />
        <br />
        <label for="">Ngày giờ kết thúc</label>
        <br />
        <input
          type="datetime-local"
          v-model="work_end_time"
          class="form-control"
        />
        <br />
        <label for="">Lý do</label>
        <br />
        <textarea
          name=""
          id=""
          v-model="description"
          style="height: 100px"
          class="form-control"
        />
        <br />
        <div class="de-flex justify-content-center" style="margin-top: 20px">
          <button
            class="form-control"
            style="background-color: blue; color: white"
            @click="createUpdateTimesheet()"
          >
            Cập nhật
          </button>
        </div>
      </b-modal>
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
import { sendNotificationFirebase } from "@/api/notification.api";
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
      start_time: null,
      end_time: null,
      time_sheet: null,
      work_start_time: null,
      work_end_time: null,
      description: null,
      time_sheet_id: null,
      fields: [
        { key: "numerical", label: "STT" },
        { key: "day", label: "Ngày" },
        { key: "time_check_in", label: "Thời gian bắt đầu" },
        { key: "time_check_out", label: "Thời gian kết thúc" },
        { key: "late", label: "Đến muộn" },
        { key: "soon", label: "Về sớm" },
        { key: "status", label: "Trạng thái" },
      ],
      paginate: {
        perPage: 10,
        total: 50,
        page: 1,
      },
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
    await this.getTimeSheet();
    this.$store.dispatch("common/setIsLoading", false);
  },
  methods: {
    updateTime(id) {
      this.time_sheet_id = id;
      this.$refs["modal-work-day"].show();
    },
    createUpdateTimesheet() {
      const params = {
        time_sheet_id: this.time_sheet_id,
        work_start_time: this.work_start_time,
        work_end_time: this.work_end_time,
        description: this.description,
      };

      this.$store.dispatch("user/createUpdateTimeSheet", params).then((res) => {
        this.$refs["modal-work-day"].hide();
        if (res.success) {
          this.$toasted.show("Bổ sung công thành công", {
            duration: 3000,
          });
          sendNotificationFirebase({
            device_type: "0",
            body: "Nhân viên" + this.user.lastname + "đã tạo đơn bổ sung công",
            user_id: "0",
            title: "Bổ sung công",
          });
        } else {
          this.$toasted.show("Bạn đã tạo đơn rồi", {
            duration: 3000,
          });
        }
      });
    },
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
    formatTime(time) {
      return moment(time).format("HH:mm");
    },
    formatTimeHour(time) {
      return (
        Number(moment(time).format("HH") * 60) +
        Number(moment(time).format("mm"))
      );
    },
    formatTimeHourTomorrow(time) {
      return (
        Number(moment(time).format("HH") * 60) +
        24 * 60 +
        Number(moment(time).format("mm"))
      );
    },
    checkIn() {
      let vm = this;
      navigator.geolocation.getCurrentPosition(function (position) {
        // console.log(position.coords.latitude);
        // console.log(position.coords.longitude);
        let lat1 = 21.0476192;
        let log1 = 105.79381839999999;
        let lat2 = position.coords.latitude;
        let log2 = position.coords.longitude;
        var pi = Math.PI;

        let deglat1 = lat1 * (pi / 180);
        let deglog1 = log1 * (pi / 180);
        let deglat2 = lat2 * (pi / 180);
        let deglog2 = log2 * (pi / 180);

        let difflat = deglat2 - deglat1;
        let difflog = deglog2 - deglog1;

        let val =
          Math.pow(Math.sin(difflat / 2), 2) +
          Math.cos(deglat1) *
            Math.cos(deglat2) *
            Math.pow(Math.sin(difflog / 2), 2);
        let res = 6378.8 * (2 * Math.asin(Math.sqrt(val)));
        if (res < 0.1) {
          let time = moment(new Date()).format("YYYY-MM-DDTHH:mm");
          const params = {
            user_id: vm.user.id,
            time: time,
          };
          vm.$store.dispatch("user/checkIn", params).then(() => {
            vm.checkTimeSheet();
            vm.getTimeSheet();
            vm.$toasted.show("Checkin thành công", {
              duration: 3000,
            });
          });
        } else {
          vm.$toasted.show("Checkin thất bại", {
            duration: 3000,
          });
        }
      });
    },
    checkOut() {
      let vm = this;
      navigator.geolocation.getCurrentPosition(function (position) {
        // console.log(position.coords.latitude);
        // console.log(position.coords.longitude);
        let lat1 = 21.0476192;
        let log1 = 105.79381839999999;
        let lat2 = position.coords.latitude;
        let log2 = position.coords.longitude;
        var pi = Math.PI;

        let deglat1 = lat1 * (pi / 180);
        let deglog1 = log1 * (pi / 180);
        let deglat2 = lat2 * (pi / 180);
        let deglog2 = log2 * (pi / 180);

        let difflat = deglat2 - deglat1;
        let difflog = deglog2 - deglog1;

        let val =
          Math.pow(Math.sin(difflat / 2), 2) +
          Math.cos(deglat1) *
            Math.cos(deglat2) *
            Math.pow(Math.sin(difflog / 2), 2);
        let res = 6378.8 * (2 * Math.asin(Math.sqrt(val)));
        if (res < 0.1) {
          let time = moment(new Date()).format("YYYY-MM-DDTHH:mm");
          const params = {
            user_id: vm.user.id,
            time: time,
          };
          vm.$store.dispatch("user/checkOut", params).then(() => {
            vm.checkTimeSheet();
            vm.getTimeSheet();
            vm.$toasted.show("Checkout thành công", {
              duration: 3000,
            });
          });
        } else {
          vm.$toasted.show("Checkout thất bại", {
            duration: 3000,
          });
        }
      });
    },
    async search() {
      this.getTimeSheet();
    },
    async getTimeSheet() {
      const params = {
        user_id: this.user.id,
        start_time: this.start_time,
        end_time: this.end_time,
        page: this.paginate.page,
      };
      await this.$store.dispatch("user/getTimeSheet", params).then((res) => {
        this.time_sheet = res.data.data;
        this.paginate.total = res.data.total;
      });
    },
    async changePage(value) {
      thia.paginate.paginate = value;
      await this.getTimeSheet();
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
