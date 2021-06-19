<template>
  <div class="detail-room" v-if="customer_room">
    <b-table striped hover :items="customer_room" :fields="fields">
      <template #cell(numerical)="row">
        {{ ++row.index }}
      </template>
      <template #cell(name)="row">
        <span @click="bookRoom(row.item.id, row.item.start_time)">
          {{ row.item.name }}
        </span>
      </template>
      <template #cell(status)="row">
        <span v-if="row.item.status == 2">
          Đang ở
        </span>
        <span v-if="row.item.status == 1">
          Đang thuê
        </span>
      </template>
    </b-table>
  </div>
</template>

<script>
export default {
  props: ["id"],
  data() {
    return {
      customer_room: null,
      types: [
        { value: 1, text: "Vip One" },
        { value: 2, text: "Normal One" },
        { value: 3, text: "Vip Two" },
        { value: 4, text: "Normal Two" },
      ],
      fields: [
        { key: "numerical", label: "STT" },
        { key: "name", label: "Tên người dùng" },
        { key: "start_time", label: "Thời gian bắt đầu" },
        { key: "end_time", label: "Thời gian kết thúc" },
        { key: "status", label: "Trạng thái" },
      ],
      records: [
        { value: 5, text: "5" },
        { value: 10, text: "10" },
        { value: 15, text: "15" },
        { value: 20, text: "20" },
      ],
    };
  },
  mounted() {
    this.getInfoCustomerRoom(this.id);
  },
  methods: {
    async getInfoCustomerRoom(id) {
      await this.$store.dispatch("room/getInfoRoomCustomer", id).then((res) => {
        this.customer_room = res.data;
      });
    },
    bookRoom(id, start_time) {
      this.$router.push({
        name: "BookRoomUpdate",
        params: { id: this.id, user_id: id, start: start_time },
      });
    },
  },
};
</script>
