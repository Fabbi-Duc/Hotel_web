<template>
  <div>
    <ValidationObserver v-slot="{ handleSubmit }">
      <form @submit.prevent="handleSubmit(create)" class="form" ref="form">
        <label for="">Ngày nhập</label>
        <input
          type="date"
          class="form-control"
          style="margin-bottom: 20px; width: 500px; "
          v-model="day"
        />
        <b-row>
          <b-col>
            <label for="">Người nhập</label>
            <br />
            <b-form-select
              style="margin-bottom: 20px"
              class="position__select"
              v-model="user_id"
              :options="userOption"
            />
            <br />
          </b-col>
          <b-col>
            <label for="">Chiết khấu</label>
            <input
              type="text"
              class="form-control"
              style="width: 500px; margin-bottom: 20px"
              v-model="discount"
            />
          </b-col>
        </b-row>
        <label for="">Mô tả</label>
        <textarea
          type="text"
          class="form-control"
          style="height: 200px"
          v-model="description"
        />
        <div
          class="mt-3 row position-relative"
          v-for="(option, indexOption) in options"
          :key="indexOption"
        >
          <div class="col-3 position-relative d-flex">
            <div class="w-100">
              <label for="">Tên đồ dùng</label>
              <br />
              <ValidationProvider
                name="Houseware"
                rules="required"
                v-slot="{ errors }"
              >
                <div
                  class="
                    position-relative
                    w-100
                    d-flex
                    justify-content-center
                    align-items-center
                    option
                  "
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
            <label for="">Giá</label>
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
              class="mr-3 cursor"
              @click="plus()"
            ></b-icon>
            <b-icon
              icon="file-x"
              scale="3"
              class="cursor"
              @click="deleteOption(indexOption)"
            ></b-icon>
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <button
            type="submit"
            class="btn-success mt-3"
            style="width: 120px"
            @click="exportPdf()"
          >
            Tạo phiếu
          </button>
        </div>
      </form>
    </ValidationObserver>
    <pdfCouponHouseware ref="pdfCouponHouseware" :options="options" :user="user"/>
  </div>
</template>

<script>
import { ValidationObserver, ValidationProvider } from "vee-validate";
import pdfCouponHouseware from "../PdfExport/pdfCouponHouseware.vue";

export default {
  components: {
    ValidationObserver,
    ValidationProvider,
    pdfCouponHouseware,
  },
  data() {
    return {
      description: null,
      housewareOption: null,
      day: null,
      user_id: 1,
      discount: null,
      show: null,
      user: {
        day: null,
        user_name: null,
        discount: null
      },
      userOption: [
        { value: 1, text: "Nguyễn Huy Đức" },
        { value: 2, text: "Nguyễn Huy Trung" },
        { value: 3, text: "Nguyễn Huy Nam" },
        { value: 4, text: "Nguyễn Đình Tân" },
      ],
      options: [
        {
          houseware_id: null,
          quantity: null,
          name: null,
          cost: null,
        },
      ],
    };
  },
  created() {
    this.getHouseware();
  },
  methods: {
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
    deleteOption(index) {
      this.options.splice(index, 1);
    },
    create() {
      const params = {
        description: this.description,
        data: this.options,
        day: this.day,
        discount: this.discount,
        user_id: this.user_id
      };
      this.$store.dispatch("houseware/createCouponHouseware", params);
    },
    exportPdf() {
      this.user = {
        user_name: this.userOption[this.user_id -1].text,
        day: this.day,
        discount: this.discount,
        decription: this.decription,
      }
      this.$refs.pdfCouponHouseware.generateReport();
    },
  },
};
</script>

<style lang="scss" scoped>
.option-houseware,
.option {
  cursor: pointer;
}
.warning {
  color: red;
}
.cursor {
  cursor: pointer;
}
</style>
