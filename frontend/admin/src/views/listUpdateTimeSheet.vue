<template>
  <div>
    <b-table
      striped
      hover
      :items="list"
      :fields="fields"
      :current-page="paginate.currentPage"
      v-if="list"
    >
      <template #cell(numerical)="row">
        {{
          ++row.index + (Number(paginate.page) - 1) * Number(paginate.perPage)
        }}
      </template>
      <template #cell(action)="row">
        <div class="d-flex" v-if="row.item.status_update == 1">
          <button
            class="form-control"
            style="width: 100px; background-color: blue; color: white"
            @click="
              success(
                row.item.id,
                row.item.start_time_update,
                row.item.end_time_update
              )
            "
          >
            Phê duyệt
          </button>
          <button
            class="form-control ml-3"
            style="width: 100px; background-color: red; color: white"
            @click="refuse(row.item.id)"
          >
            Từ chối
          </button>
        </div>
        <div v-if="row.item.status_update == 2">
          <span>Đã từ chối</span>
        </div>
        <div v-if="row.item.status_update == 3">
          <span>Đã đồng ý</span>
        </div>
      </template>
    </b-table>
    <div class="pagination" v-if="list">
      <b-pagination
        v-model="paginate.page"
        :total-rows="paginate.total"
        :per-page="paginate.perPage"
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
      user: null,
      list: null,
      fields: [
        { key: "numerical", label: "STT" },
        { key: "day", label: "Ngày" },
        { key: "time_check_in", label: "TG bắt đầu" },
        { key: "time_check_out", label: "TG kết thúc" },
        { key: "start_time_update", label: "TG bắt đầu mong muốn" },
        { key: "end_time_update", label: "TG kết thúc mong muốn" },
        { key: "description", label: "Lý do" },
        { key: "action", label: "Hành động" },
      ],
      paginate: {
        perPage: 10,
        total: 50,
        page: 1,
      },
    };
  },

  async created() {
    await this.getUser();
    await this.getList();
  },

  methods: {
    async success(id, start_time, end_time) {
      const data = {
        id: id,
        start_time: start_time,
        end_time: end_time,
      };

      await this.$store
        .dispatch("user/successUpdateTimeSheet", data)
        .then(() => {
          this.getList();
          this.$toasted("Bạn đẫ đồng ý", { duration: 3000 });
        });
    },
    async refuse(id) {
      const data = {
        id: id,
      };

      await this.$store
        .dispatch("user/refuseUpdateTimeSheet", data)
        .then(() => {
          this.getList();
          this.$toasted("Bạn đẫ từ chối", { duration: 3000 });
        });
    },
    async getUser() {
      await this.$store.dispatch("auth/getAccount").then((res) => {
        this.user = res.data;
      });
    },
    async getList() {
      const params = {
        user_id: this.user.id,
        page: this.paginate.page,
      };
      await this.$store
        .dispatch("user/getListUpdateTimeSheet", params)
        .then((res) => {
          this.list = res.data.data;
          this.paginate.total = res.data.total;
        });
    },
    async changePage(value) {
      this.paginate.page = value;
      await this.getList();
    },
  },
};
</script>