<template>
  <div>
    <ValidationObserver v-slot="{ handleSubmit }">
      <form @submit.prevent="handleSubmit(update)" class="form" ref="form">
        <label for="">Description</label>
        <textarea type="text" class="form-control" style="height: 200px" v-model="description" />
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
            <label for="">Quantity</label>
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
        <div class="d-flex justify-content-center">
          <button class="btn-success mt-3" style="width: 120px">Update</button>
        </div>
      </form>
    </ValidationObserver>
  </div>
</template>

<script>
import { ValidationObserver, ValidationProvider } from "vee-validate";

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
    }
  },
  props: ['id'],

  created() {
    this.getList();
    this.getHouseware();
  },
  methods: {
    getList() {
      this.$store.dispatch('houseware/getInfoExportHouseware', this.id).then(res => {
        this.description = res.description;
        this.options = res.data;
      })
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
      this.options[indexOption].cost = this.housewareOption[index].cost
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
    update() {
      const params = {
        description: this.description,
        data: this.options,
        id: this.id
      };
      this.$store.dispatch('houseware/updateExportHouseware', params).then(() => {
        alert('Ban da update thanh cong')
      })
    }
  }
}
</script>
