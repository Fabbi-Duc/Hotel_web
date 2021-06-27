<template>
  <div class="detail-bill">
    <label for="">Khách hàng : </label>
    <span> {{ billsPdf[0].name }}</span>
    <br />
    <label for="">Giờ bắt đầu : </label>
    <span> {{ billsPdf[0].start_time }}</span>
    <br />
    <label for="">Giờ kết thúc : </label>
    <span> {{ billsPdf[0].end_time }}</span>
    <br />
    <label for="">Số giờ : </label>
    <span> {{ billsPdf[0].hour }}</span>
    <br />
    <label for="">Tiền phòng : </label>
    <span> {{ Intl.NumberFormat().format(Math.ceil(billsPdf[0].money_room)) }} VND</span>
    <br />
    <label for="" v-if="billsPdf[0].money_food">Tiền đồ ăn : </label>
    <span v-if="billsPdf[0].money_food"> {{ Intl.NumberFormat().format(Math.ceil(billsPdf[0].money_food)) }} VND</span>
    <br />
    <label>Tiền cọc : </label>
    <span> {{ Intl.NumberFormat().format(Math.ceil(billsPdf[0].deposit)) }} VND</span>
    <br />
    <label for="">Danh sách đồ hỏng: </label>
    <br />
    <b-icon
      icon="plus-square"
      scale="3"
      class="mr-3"
      @click="plus()"
      v-if="options.length < 1"
    ></b-icon>
    <br />
    <ValidationObserver v-slot="{ handleSubmit }">
      <form @submit.prevent="handleSubmit(pay)" class="form" ref="form">
        <div
          class="mt-3 row position-relative"
          v-for="(option, indexOption) in options"
          :key="indexOption"
        >
          <div class="col-3 position-relative d-flex">
            <div class="w-100">
              <label for="">Đồ dùng</label>
              <br />
              <ValidationProvider
                name="Houseware"
                rules="required"
                v-slot="{ errors }"
              >
                <div
                  class="position-relative w-100 d-flex justify-content-center align-items-center option"
                  @click="showOption(indexOption)"
                >
                  <input
                    type="text"
                    v-model="option.name"
                    class="form-control"
                    disabled
                    style="background-color: white"
                  />
                  <b-icon
                    icon="caret-down-fill"
                    class="position-absolute"
                    style="right: 10px"
                  ></b-icon>
                </div>
                <div class="text-left">
                  <span class="warning">{{ errors[0] }}</span>
                </div>
              </ValidationProvider>
              <div
                v-if="show == indexOption"
                class="position-absolute"
                style="
                  top: 70px;
                  max-height: 200px;
                  background-color: white;
                  border: 1px solid gray;
                  width: 95%;
                  padding: 10px;
                  overflow: auto;
                  border-radius: 5px;
                  z-index: 2;
                "
              >
                <p
                  v-for="(houseware, index) in housewareOption"
                  :key="index"
                  class="option-houseware"
                  @click="chooseOption(index, indexOption)"
                >
                  {{ houseware.name }}
                </p>
              </div>
            </div>
          </div>
          <div class="w-100 col-3">
            <label for="">Số lượng</label>
            <br />
            <ValidationProvider
              name="Quantity"
              rules="required"
              v-slot="{ errors }"
            >
              <input
                type="number"
                @change="focus()"
                @keyup="focus()"
                min="0"
                class="form-control"
                v-model="option.quantity"
              />
              <div class="text-left">
                <span class="warning">{{ errors[0] }}</span>
              </div>
            </ValidationProvider>
          </div>
          <div class="w-100 col-3">
            <label for="">Số tiền</label>
            <br />
            <div
              class="d-flex align-items-center"
              style="
                border-radius: 5px;
                border: 1px solid gray;
                height: 35px;
                background-color: white;
                padding-left: 10px;
              "
            >
              <span class="mb-0" v-if="option.name && option.quantity">
                {{ option.cost * option.quantity }}
              </span>
            </div>
          </div>
          <div class="d-flex position-absolute" style="right: 0; top: 40px">
            <b-icon
              icon="plus-square"
              scale="3"
              class="mr-3"
              @click="plus()"
            ></b-icon>
            <b-icon
              icon="file-x"
              scale="3"
              @click="deleteOption(indexOption)"
            ></b-icon>
          </div>
        </div>
        <label for="" style="margin-top: 40px">Tổng tiền : </label>
        <span> {{ Intl.NumberFormat().format(billsPdf[0].total_cost) }} VND</span>
        <br />
        <label>Tiền cọc : </label>
        <span>  {{ Intl.NumberFormat().format(Math.ceil(billsPdf[0].deposit)) }} VND</span>
        <br />
        <label style="color: red; font-size: 20px">Tổng tiền cần thanh toán: : </label>
        <span style="color: red; font-size: 20px">  {{ Intl.NumberFormat().format(Math.ceil(billsPdf[0].total_price)) }} VND</span>
        <div class="d-flex justify-content-center">
          <button class="btn-info" style="width: 150px; margin-top: 50px">
            Pay
          </button>
        </div>
      </form>
    </ValidationObserver>
    <pdfAllBills ref="allBills" :options="billsPdf" />
  </div>
</template>

<script>
import { ValidationObserver, ValidationProvider } from "vee-validate";
import { sendNotificationFirebase } from "@/api/notification.api";
import pdfAllBills from "./PdfExport/pdfAllBills.vue"
export default {
  components: {
    ValidationObserver,
    ValidationProvider,
    pdfAllBills
  },
  data() {
    return {
      billsPdf: [
        {
          end_time: null,
          start_time: null,
          hour: null,
          total_cost: 0,
          total_price: 0,
          money_room: null,
          money_food: null,
          deposit: null,
          name: null,
          broken: null
        }
      ],
      options: [
        {
          houseware_id: null,
          quantity: null,
          name: null,
          cost: null,
        },
      ],
      housewareOption: null,
      show: null,
      user: null,
    };
  },

  props: ["id"],

  async created() {
    await this.getUser();
    await this.getBill();
    await this.getHouseware();
  },
  methods: {
    getUser() {
      this.$store.dispatch("auth/getAccount").then((res) => {
        this.user = res.data;
      });
    },
    getBill() {
      this.$store.dispatch("customer/detailBill", this.id).then((res) => {
        this.billsPdf[0].start_time = res.start_time;
        this.billsPdf[0].end_time = res.end_time;
        this.billsPdf[0].hour = res.hour / 3600;
        this.billsPdf[0].money_room = res.data;
        this.billsPdf[0].money_food = res.money;
        this.billsPdf[0].total_cost = this.billsPdf[0].money_room + this.billsPdf[0].money_food;
        (this.billsPdf[0].deposit = res.deposit),
          (this.billsPdf[0].total_price = this.billsPdf[0].total_cost - this.billsPdf[0].deposit),
          (this.billsPdf[0].name = res.name);
      });
    },
    focus() {
      let cost = 0;
      if (this.options.length >= 1) {
        for (let i = 0; i < this.options.length; i++) {
          for (let j = 0; j < this.housewareOption.length; j++) {
            if (this.options[i].houseware_id == this.housewareOption[j].id) {
              cost +=
                this.housewareOption[j].cost * this.options[i].quantity;
            }
          }
        }
        this.billsPdf[0].total_cost = this.billsPdf[0].money_room + this.billsPdf[0].money_food + cost;
        this.billsPdf[0].broken = this.options;
        this.billsPdf[0].total_price = this.billsPdf[0].total_cost - this.billsPdf[0].deposit;
      } else {
        this.billsPdf[0].total_cost = this.billsPdf[0].money_food + this.billsPdf[0].money_room;
        this.billsPdf[0].total_price = this.billsPdf[0].total_cost - this.billsPdf[0].deposit;
      }
    },
    getHouseware() {
      this.$store.dispatch("houseware/getAllHouseware").then((res) => {
        this.housewareOption = res;
      });
    },
    showOption(index) {
      if (this.show == index) {
        this.show = null;
        return;
      }
      this.show = index;
    },
    chooseOption(index, indexOption) {
      this.options[indexOption].houseware_id = this.housewareOption[index].id;
      this.options[indexOption].name = this.housewareOption[index].name;
      this.options[indexOption].cost = this.housewareOption[index].cost;
      this.show = null;
    },
    plus() {
      let option = {
        houseware_id: null,
        quantity: null,
        name: null,
      };
      this.options.push(option);
    },
    async deleteOption(index) {
      this.options.splice(index, 1);
      await this.focus();
    },
    pay() {
      const params = {
        id: this.id,
        cost_houseware: this.billsPdf[0].total_cost,
        options: this.options,
        user_id: this.user.id,
      };
      this.$store.dispatch("customer/pay", params).then(() => {
        alert("Thanh toan thanh cong");
        sendNotificationFirebase({
          device_type: "0",
          body: "Le tan da yeu cau xuat kho",
          user_id: "0",
          title: "Export Houseware",
        })
          .then((response) => {
            console.log(response);
          })
          .catch((error) => {
            console.log(error);
          });
        this.$router.push({ name: "Room" });
      });
      this.$refs.allBills.generateReport();
    },
  },
};
</script>

<style lang="scss" scoped>
.warning {
  color: red;
}
</style>
