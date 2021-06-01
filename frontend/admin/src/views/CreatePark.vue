<template>
  <div>
    <ValidationObserver ref="form" v-slot="{ handleSubmit }">
      <form @submit.prevent="handleSubmit(createPark)" class="form">
        <ValidationProvider name="Name" rules="required" v-slot="{ errors }">
          <label for="">Name</label>
          <input type="text" class="form-control" v-model="name" />
          <div class="text-left">
            <span class="warning">{{ errors[0] }}</span>
          </div>
        </ValidationProvider>
        <ValidationProvider name="Type" rules="required" v-slot="{ errors }">
          <label for="">Type</label>
          <b-form-select
            class="type__select form-control col"
            v-model="type"
            :options="typeOptions"
          />
          <div class="text-left">
            <span class="warning">{{ errors[0] }}</span>
          </div>
        </ValidationProvider>
        <ValidationProvider name="Floor" rules="required" v-slot="{ errors }">
          <label for="">Floor</label>
          <b-form-select
            class="type__select form-control col"
            v-model="floor"
            :options="floorOptions"
          />
          <div class="text-left">
            <span class="warning">{{ errors[0] }}</span>
          </div>
        </ValidationProvider>
        <div class="text-center">
          <button
            type="submit"
            class="btn-info mt-3"
            style="width: 200px"
          >
            Create Park
          </button>
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
      name: null,
      type: 1,
      floor: 1,
      typeOptions: [
        { value: 1, text: "Mobile" },
        { value: 2, text: "Car" },
      ],
      floorOptions: [
        { value: 1, text: "G1" },
        { value: 2, text: "G2" },
      ],
    };
  },
  methods: {
    createPark() {
      const params = {
        name: this.name,
        type: this.type,
        floor: this.floor
      }
      this.$store.dispatch('user/createPark', params).then(() => {
        alert('Ban da them thanh cong');
        this.$emit('closeModal')
      })
    }
  }
};
</script>

<style lang="scss" scoped>
.warning {
  color: red;
}
</style>
