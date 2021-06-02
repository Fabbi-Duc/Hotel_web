<template>
  <div>
    <div class="row">
      <div class="col-4">
        <label for="">Thời gian tạo</label>
        <br />
        <input type="date" class="form-control" v-model="time_lower" />
      </div>
      <div class="col-4">
        <label for="">Thời gian cập nhật</label>
        <br />
        <input type="date" class="form-control" v-model="time_upper" />
      </div>
      <div class="position-relative">
        <div class="position-absolute" style="bottom: 0">
          <button class="btn-info ml-3" style="height: 35px; width: 100px" @click="getList()">
            Tìm kiếm
          </button>
        </div>
      </div>
    </div>
    <b-table
      class="mt-3"
      striped
      hover
      :items="list"
      :fields="fields"
      :current-page="paginate.currentPage"
    >
      <template #cell(numerical)="row">
        {{
          ++row.index + (Number(paginate.page) - 1) * Number(paginate.perPage)
        }}
      </template>
      <template #cell(action)="row">
        <b-icon
          v-if="row.item.status == 1"
          icon="trash"
          variant="danger"
          font-scale="1.5"
          class="deleteRoom cursor"
          @click="deleteData(row.item.id)"
        >
        </b-icon>
        <span v-if="row.item.status == 2" @click="updateHouse(row.item.id)" class="cursor"> Đã hoàn thành </span>
        <b-icon
          v-if="row.item.status == 1"
          icon="pencil-square"
          variant="dark"
          font-scale="1.5"
          class="updateRoom cursor ml-3"
          @click="updateHouse(row.item.id)"
        >
        </b-icon>
      </template>
    </b-table>
    <div class="pagination">
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
      time_lower: "",
      time_upper: "",
      fields: [
        { key: "numerical", label: "STT" },
        { key: "cost", label: "Giá" },
        { key: "description", label: "Mô tả" },
        { key: "created_at", label: "Thời gian tạo" },
        { key: "updated_at", label: "Thời gian cập nhật" },
        { key: "action", label: "Tùy chọn" },
      ],
      paginate: {
        perPage: 10,
        total: 50,
        page: 1,
      },
    };
  },

  created() {
    this.getList();
  },
  methods: {
    getList() {
      const params = {
        time_lower: this.time_lower,
        time_upper: this.time_upper,
        perPage: 10,
        page: this.paginate.page,
      };
      this.$store
        .dispatch("houseware/listCouponHouseware", params)
        .then((res) => {
          this.list = res.data.data;
          this.paginate.total = res.data.total;
        });
    },
    async changePage(page) {
      this.paginate.page = page;
      await this.getList();
    },
    async deleteData(id) {
      if (confirm("Ban co muon xoa khong")) {
        await this.$store
          .dispatch("houseware/deleteCouponHouseware", id)
          .then(() => {
            this.getList();
          });
      }
    },
    updateHouse(id) {
      this.$router.push({ name: "UpdateCouponHouseware", params: { id: id } });
    },
  },
};
</script>

<style lang="scss" scoped>
.cursor {
  cursor: pointer;
}
</style>
