<template>
  <div>
    <ValidationObserver v-slot="{ handleSubmit }">
      <form @submit.prevent="handleSubmit(onSubmit)" class="form" ref="form">
        <label for="">Description</label>
        <textarea
          type="text"
          class="form-control"
          style="height: 200px"
          v-model="description"
          disabled
        />
        <div
          class="mt-3 row position-relative"
          v-for="(option, indexOption) in options"
          :key="indexOption"
        >
          <div class="col-3 position-relative d-flex">
            <div class="w-100">
              <label for="">Houseware</label>
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
            </div>
          </div>
          <div class="w-100 col-3">
            <label for="">Quantity</label>
            <br />
            <ValidationProvider
              name="Quantity"
              rules="required"
              v-slot="{ errors }"
            >
              <input
                disabled
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
            <label for="">Cost</label>
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
        </div>
        <div class="d-flex justify-content-center" v-if="status != 2">
          <button
            class="btn-success mt-3"
            style="width: 120px"
            @click="update()"
          >
            Xác nhận
          </button>
          <button
            class="btn-danger mt-3 ml-3"
            style="width: 120px"
            v-if="status != 3"
            @click="refuse()"
          >
            Không chấp nhận
          </button>
        </div>
      </form>
    </ValidationObserver>
  </div>
</template>

<script>
import { ValidationObserver, ValidationProvider } from "vee-validate";
import { sendNotificationFirebase } from "@/api/notification.api";

export default {
  components: {
    ValidationObserver,
    ValidationProvider,
  },
  data() {
    return {
      options: null,
      description: null,
      housewareOption: null,
      show: null,
      status: null,
      user_id: null,
    };
  },
  props: ["id"],

  created() {
    this.getList();
    this.getHouseware();
  },
  methods: {
    onSubmit() {},
    getList() {
      this.$store
        .dispatch("houseware/getInfoExportHouseware", this.id)
        .then((res) => {
          this.description = res.description;
          this.status = res.status;
          this.user_id = res.id
          this.options = res.data;
        });
    },
    getHouseware() {
      this.$store.dispatch("houseware/getAllHouseware").then((res) => {
        this.housewareOption = res;
      });
    },
    async update() {
      await this.$store
        .dispatch("houseware/completeExportHouseware", this.id)
        .then(() => {
          alert("Ban da cap nhat thanh cong");
          sendNotificationFirebase({
            device_type: "5",
            body: "Don cua ban da duoc chap nhan",
            user_id: "5",
            title: "Export Houseware",
          })
            .then((response) => {
              console.log(response);
            })
            .catch((error) => {
              console.log(error);
            });
        });
    },
    async refuse() {
      await this.$store
        .dispatch("houseware/refuseExportHouseware", this.id)
        .then(() => {
          alert("Ban da cap nhat thanh cong");
          window.location.reload()
        });
    },
  },
};
</script>
