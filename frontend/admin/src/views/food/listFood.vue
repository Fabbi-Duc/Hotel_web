<template>
  <div>
    <b-form class="row position-relative">
      <div class="col-3 mr-3">
        <p>Type</p>
        <b-form-select
          class="type__select"
          v-model="type"
          :options="types"
          @change="chooseType"
        />
      </div>
      <div class="col-3">
        <p>Name</p>
        <input class="form-control w-100" v-model="name" />
      </div>
      <b-button
        class="btn-info ml-3 position-absolute"
        style="right: 150px; bottom: 0"
        @click="searchFood()"
      >
        Search
      </b-button>
      <b-button
        class="btn-success ml-3 position-absolute"
        style="right: 0; bottom: 0"
        @click="createFood()"
      >
        Create Food
      </b-button>
    </b-form>
    <div class="row">
      <div class="col-3 mt-3" v-for="(food, index) in listFood" :key="index">
        <div class="d-flex justify-content-center flex-column">
          <div class="image w-100" style="height: 200px">
            <img :src="food.image_url" alt="" class="w-100 h-100" />
          </div>
          <div class="mt-3 d-flex justify-content-center">
            <p class="mr-3">Name: {{ food.name }}</p>
            <p class="">Cost: {{ food.cost }}</p>
          </div>
          <div class="d-flex justify-content-center">
            <p>Type: {{ types[food.type].text }}</p>
          </div>
          <div class="button d-flex justify-content-center">
            <b-icon
              icon="trash"
              class="mr-3"
              variant="danger"
              font-scale="2"
              @click="deleteFood(food.id)"
            />
            <b-icon
              icon="pencil-square"
              variant="dark"
              font-scale="2"
              @click="updateFood(food.id)"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="pagination mt-3">
      <b-pagination
        v-model="paginate.page"
        :total-rows="paginate.total"
        :per-page="paginate.perPage"
        @change="changePage"
      >
      </b-pagination>
    </div>
    <b-modal centered hide-footer ref="modal-food" title="Food">
      <ValidationObserver ref="form" v-slot="{ handleSubmit }">
        <form @submit.prevent="handleSubmit(update)" class="form">
          <div class="row">
            <div class="col">
              <div
                class="image w-100 h-100 mt-3 mb-3"
                style="boder-radius: 5px; border: 1px solid black"
              >
                <img
                  :src="image_food"
                  alt=""
                  v-if="image_food != null"
                  class="w-100 h-100"
                />
                <label
                  class="d-flex align-items-center add-image justify-content-center position-relative label--top f-w3 w-100"
                >
                  <b-form-file
                    :state="Boolean(avatar)"
                    class="d-none"
                    ref="form-file"
                    v-model="avatar"
                    v-on:change="chooseImage"
                    accept="image/*"
                  />
                  <div class="text-center posision-absolute w-100 text-center">
                    Add Image
                  </div>
                </label>
              </div>
            </div>
            <div class="col">
              <div class="mb-3 mt-3">
                <ValidationProvider
                  name="Name"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <b-form>
                    <p>Name</p>
                    <input
                      type="text"
                      class="form-control"
                      v-model="name_food"
                    />
                  </b-form>
                  <div class="text-left">
                    <span class="warning">{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
                <ValidationProvider
                  name="Cost"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <b-form>
                    <p>Cost</p>
                    <input
                      type="text"
                      class="form-control"
                      v-model="cost_food"
                    />
                  </b-form>
                  <div class="text-left">
                    <span class="warning">{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
                <ValidationProvider
                  name="Type"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <b-form>
                    <p>Type</p>
                    <b-form-select
                      class="type__select"
                      v-model="type_food"
                      :options="types_food"
                    />
                  </b-form>
                  <div class="text-left">
                    <span class="warning">{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <b-button
              type="submit"
              class="btn-success"
              style="margin-top: 30px"
            >
              {{ isUpdate ? "Update" : "Create" }}
            </b-button>
          </div>
        </form>
      </ValidationObserver>
    </b-modal>
  </div>
</template>

<script>
import firebase from "@/plugins/firebase";
import { ValidationObserver, ValidationProvider } from "vee-validate";
export default {
  components: {
    ValidationObserver,
    ValidationProvider,
  },
  data() {
    return {
      types: [
        { value: "", text: "" },
        { value: 1, text: "Drink" },
        { value: 2, text: "Food" },
      ],
      types_food: [
        { value: 1, text: "Drink" },
        { value: 2, text: "Food" },
      ],
      type_food: 1,
      name_food: null,
      cost_food: null,
      type: "",
      name: "",
      food_id: null,
      listFood: [],
      paginate: {
        perPage: 5,
        total: 50,
        page: 1,
      },
      image_food: null,
      avatar: null,
      isUpdate: false,
    };
  },

  created() {
    this.getListFood();
  },
  methods: {
    async getListFood() {
      const params = {
        name: this.name,
        type: this.type,
        page: this.paginate.page,
      };
      await this.$store.dispatch("user/listFood", params).then((res) => {
        this.listFood = res.data.data;
        this.paginate.total = res.data.total;
      });
    },
    async chooseType() {
      await this.getListFood();
    },
    async changePage(page) {
      this.paginate.page = page;
      await this.getListFood();
    },
    async searchFood() {
      await this.getListFood();
    },
    async deleteFood(food_id) {
      await this.$store.dispatch("user/deleteFood", food_id).then(() => {
        alert("Ban da xoa mon an thanh cong");
        this.getListFood();
      });
    },
    createFood() {
      this.isUpdate = false;
      this.$refs["modal-food"].show();
    },
    chooseImage(event) {
      this.imageData = event.target.files[0];
      var storage = firebase.storage();
      var storageRef = storage.ref();
      const imgRef = storageRef.child(`imagesRoom/${this.imageData.name}`);
      imgRef.put(this.imageData).then(() => {
        imgRef.getDownloadURL().then((url) => {
          this.image_food = url;
        });
      });
    },
    async updateFood(food_id) {
      this.isUpdate = true;
      this.food_id = food_id;
      await this.$store.dispatch("user/getInfoFood", food_id).then((res) => {
        console.log(res);
        this.name_food = res.data.name;
        this.type_food = res.data.type;
        this.cost_food = res.data.cost;
        this.image_food = res.data.image_url;
      });
      this.$refs["modal-food"].show();
    },
    async update() {
      if (this.isUpdate) {
        const payload = {
          food_id: this.food_id,
          name: this.name_food,
          type: this.type_food,
          cost: this.cost_food,
          image_url: this.image_food,
        };
        await this.$store.dispatch("user/updateFood", payload).then(() => {
          alert("Cap nhat mon an thanh cong");
          this.$refs["modal-food"].hide();
          this.getListFood();
        });
      } else {
        const payload = {
          name: this.name_food,
          type: this.type_food,
          cost: this.cost_food,
          image_url: this.image_food,
        };
        await this.$store.dispatch("user/createFood", payload).then(() => {
          alert("Them mon an thanh cong");
          this.$refs["modal-food"].hide();
          this.getListFood();
        });
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.warning {
  color: red;
}
</style>
