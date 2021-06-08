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
      <template #cell(status_update)="row">
        <span v-if="row.item.status_update == 1">Đã tạo</span>
        <span v-if="row.item.status_update == 2">Bị từ chối</span>
        <span v-if="row.item.status_update == 3">Đã phê duyệt</span>
      </template>
      <template #cell(action)="row">
        <div class="d-flex" v-if="row.item.status_update != 3">
          <b-icon
            icon="trash"
            scale="1.25"
            variant="danger"
            @click="deleteUpdateTimeSheet(row.item.id)"
          />
          <b-icon
            icon="pencil-square"
            scale="1.25"
            class="ml-3"
            variant="dark"
            @click="updateUpdateTimeSheet(row.item.id)"
          />
        </div>
      </template>
    </b-table>
    <b-modal
      ref="modal-time-sheet"
      title="Cập nhật ngày công"
      centered
      hide-footer
    >
      <label for="">Ngày giờ bắt đầu</label>
      <br />
      <input
        type="datetime-local"
        v-model="work_start_time"
        class="form-control"
      />
      <br />
      <label for="">Ngày giờ kết thúc</label>
      <br />
      <input
        type="datetime-local"
        v-model="work_end_time"
        class="form-control"
      />
      <br />
      <label for="">Lý do</label>
      <br />
      <textarea
        name=""
        id=""
        v-model="description"
        style="height: 100px"
        class="form-control"
      />
      <br />
      <div class="de-flex justify-content-center" style="margin-top: 20px">
        <button
          class="form-control"
          style="background-color: blue; color: white"
          @click="createUpdateTimesheet()"
        >
          Cập nhật
        </button>
      </div>
    </b-modal>
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
      list: null,
      user: null,
      work_start_time: null,
      work_end_time: null,
      description: null,
      id: null,
      fields: [
        { key: "numerical", label: "STT" },
        { key: "day", label: "Ngày" },
        { key: "time_check_in", label: "TG bắt đầu" },
        { key: "time_check_out", label: "TG kết thúc" },
        { key: "start_time_update", label: "TG bắt đầu mong muốn" },
        { key: "end_time_update", label: "TG kết thúc mong muốn" },
        { key: "status_update", label: "Trạng thái" },
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
    await this.getInfoListUpdateTimeSheet();
  },
  methods: {
    changePage(value) {
      this.paginate.page = value;
      this.getInfoListUpdateTimeSheet()
    },
    async getInfoListUpdateTimeSheet() {
      const params = {
        user_id: this.user.id,
        page: this.paginate.page
      };
      await this.$store
        .dispatch("user/getInfoListUpdateTimeSheet", params)
        .then((res) => {
          this.list = res.data.data;
          this.paginate.total = res.data.total
        });
    },

    deleteUpdateTimeSheet(id) {
      if (confirm("Bạn có muốn xóa đơn không")) {
        this.$store.dispatch("user/deleteUpdateTimeSheet", id).then(() => {
          this.$toasted.show("Bạn đã xóa thành công", { duration: 3000 });
          this.getInfoListUpdateTimeSheet();
        });
      }
    },

    updateUpdateTimeSheet(id) {
      this.$refs["modal-time-sheet"].show();
      this.id = id;
    },

    createUpdateTimesheet() {
      const params = {
        id: this.id,
        work_start_time: this.work_start_time,
        work_end_time: this.work_end_time,
        description: this.description,
      };

      this.$store.dispatch("user/updateUpdateTimeSheet", params).then(() => {
        this.$toasted.show("Bạn đã cập nhật thành công", { duration: 3000 });
        this.getInfoListUpdateTimeSheet();
        this.$refs["modal-time-sheet"].hide();
      });
    },

    async getUser() {
      await this.$store.dispatch("auth/getAccount").then((res) => {
        this.user = res.data;
      });
    },
  },
};
</script>
