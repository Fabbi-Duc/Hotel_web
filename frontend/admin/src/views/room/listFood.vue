<template>
  <div class="list-food-order" v-if="list_order">
    <div class="row">
      <div
        class="order-room col-md-3"
        style="margin-bottom: 50px"
        v-for="(order, index) in list_order"
        :key="index"
        @click="listFoodOrder(order.id)"
      >
        <div class="w-100 h-100">
          <img :src="order.image_url" alt="" class="w-100 h-100" />
        </div>
        <p class="text-center" style="font-size: 20px">P{{ order.name }}</p>
      </div>
    </div>

    <div class="pagination justify-content-center">
      <b-pagination
        v-model="paginate.page"
        :total-rows="paginate.total"
        :per-page="paginate.perPage"
        aria-controls="my-table"
        @change="changePage"
      >
      </b-pagination>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      list_order: [],
      paginate: {
        perPage: 5,
        total: 50,
        page: 1,
      },
    };
  },

  created() {
    this.getListOrder();
  },
  methods: {
    async getListOrder() {
      const params = {
        page: this.paginate.page,
      };
      await this.$store.dispatch("customer/listOrder", params).then((res) => {
        this.list_order = res.data.data;
        this.paginate.total = res.data.total;
      });
    },
    async changePage(page) {
      this.paginate.page = page;
      await this.getListOrder();
    },
    listFoodOrder(room_service_food_id) {
      this.$router.push({
        name: 'FoodListOrders',
        params: { id: room_service_food_id },
      });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
