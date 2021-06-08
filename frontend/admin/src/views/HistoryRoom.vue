<template>
  <div
    class="history-room"
    style="margin-top: 170px; margin-bottom: 240px; padding: 0 50px"
  >
    <label for="" style="font-weight: bold; font-size: 20px"
      >Lịch sử thuê phòng</label
    >
    <b-table
      striped
      hover
      :items="listHistory"
      :fields="fields"
      :current-page="paginate.currentPage"
      v-if="listHistory"
    >
      <template #cell(numerical)="row">
        {{
          ++row.index + (Number(paginate.page) - 1) * Number(paginate.perPage)
        }}
      </template>
      <template #cell(status)="row">
        <span v-if="row.item.status == 4"> Đơn đã hủy </span>
        <span v-if="row.item.status == 3"> Đã trả phòng </span>
        <span v-if="row.item.status == 2"> Đang ở </span>
        <div v-if="row.item.status == 1" class="d-flex">
          <b-icon
            icon="trash"
            variant="danger mr-3"
            scale="1.25"
            @click="deleteBill(row.item.id)"
          ></b-icon>
          <b-icon
            icon="pencil-square"
            variant="dark"
            scale="1.25"
            @click="showUpdateBill(row.item.id)"
          ></b-icon>
        </div>
      </template>
    </b-table>
    <div class="pagination" v-if="listHistory">
      <b-pagination
        v-model="paginate.page"
        :total-rows="paginate.total"
        :per-page="paginate.perPage"
        @change="changePage"
      >
      </b-pagination>
    </div>
    <b-modal ref="modal-hour" title="Thay đổi ngày giờ" centered hide-footer>
      <ValidationObserver ref="form" v-slot="{ handleSubmit }">
        <form @submit.prevent="handleSubmit(updateBill)" class="form">
          <label for="">Ngày bắt đầu</label>
          <ValidationProvider
            name="Time start"
            rules="required"
            v-slot="{ errors }"
          >
            <input type="datetime-local" class="form-control" />
            <div class="text-left">
              <span class="warning">{{ errors[0] }}</span>
            </div>
          </ValidationProvider>
          <label for="" class="mt-3 mb-3">Ngày kết thúc</label>
          <ValidationProvider
            name="Time start"
            rules="required"
            v-slot="{ errors }"
          >
            <input type="datetime-local" class="form-control" />
            <div class="text-left">
              <span class="warning">{{ errors[0] }}</span>
            </div>
          </ValidationProvider>
          <div class="d-flex justify-content-center">
            <button
              class="form-control mt-3"
              style="width: 120px; background-color: blue; color: white"
            >
              Cập nhật
            </button>
          </div>
        </form>
      </ValidationObserver>
    </b-modal>
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
      user: null,
      listHistory: null,
      room_customer_id: null,
      start_time: null,
      end_time: null,
      fields: [
        { key: "numerical", label: "STT" },
        { key: "name", label: "Tên phòng" },
        { key: "start_time", label: "Thời gian bắt đầu" },
        { key: "end_time", label: "Thời gian kết thúc" },
        { key: "status", label: "Trạng thái" },
      ],
      paginate: {
        perPage: 10,
        total: 50,
        page: 1,
      },
    };
  },

  async created() {
    await this.$store.dispatch("auth/getAccountCustomer").then((res) => {
      this.user = res.data;
    });
    await this.getHistory();
  },
  methods: {
    async getHistory() {
      const params = {
        user_id: this.user.id,
        page: this.paginate.page,
      };
      await this.$store.dispatch("customer/getHistory", params).then((res) => {
        this.listHistory = res.data.data;
        this.paginate.total = res.data.total;
      });
    },

    async changePage(value) {
      this.paginate.page = value;
      await this.getHistory();
    },

    async deleteBill(id) {
      await this.$store.dispatch("customer/deleteBill", id).then(() => {
        this.getHistory();
      });
    },
    async updateBill() {
      const params = {
        room_id: this.room_id,
        room_customer_id: this.room_customer_id,
        start_time: this.start_time,
        end_time: this.end_time,
      };
      await this.$store.dispatch("customer/updateBill", params).then(() => {
        this.getHistory();
      });
    },
    showUpdateBill(id) {
      this.room_customer_id = id;
      this.$router.push({ name: "Customer", query: { room_customer_id: id } });
    },

    async updateBill() {
      const params = {
        room_customer_id: this.room_customer_id,
        start_time: this.start_time,
      };
      await this.$store.dispatch("customer/updateBill", params).then((res) => {
        this.getHistory();
      });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
