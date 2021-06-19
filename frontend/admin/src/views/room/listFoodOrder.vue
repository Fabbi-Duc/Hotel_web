<template>
  <div class="list-food-order">
    <div class="row">
      <div
        class="col-md-4"
        v-for="(food, index) in listFood"
        :key="index"
        style="margin-bottom: 50px"
      >
        <div class="food mb-3 w-100">
          <img :src="food.image_url" alt="" class="w-100" />
        </div>
        <div class="text-center">Tên: {{ food.name }}</div>
        <div class="text-center">Số lượng: {{ food.count }}</div>
      </div>
    </div>

    <div class="btn-submit text-center">
      <button class="submit btn-success" @click="complete()">Xác nhận</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      listFood: [],
    };
  },
  created() {
    this.getListFood();
  },
  props: ["id"],
  methods: {
    async getListFood() {
      this.$store.dispatch("customer/listFoodOrder", this.id).then((res) => {
        this.listFood = res.data;
      });
    },
    async complete() {
      this.$store.dispatch("customer/updateOrder", this.id).then((res) => {
        alert("Cap nhat thanh cong");
        this.$router.push({ name: "ListFoodOrder" });
      });
    },
  },
};
</script>

<style lang="scss" scoped>
.submit {
  width: 120px;
  height: 40px;
  border-radius: 5px;
}
</style>
