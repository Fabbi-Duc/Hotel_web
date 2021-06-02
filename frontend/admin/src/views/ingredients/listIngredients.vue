<template>
  <div class="list-houseware">
    <b-row style="margin-bottom: 30px">
      <b-col cols="4" class="position-relative">
        <label for="">Tên</label>
        <br />
        <input type="text" class="form-control" v-model="name" />
        <b-button
          style="height: 30px; right: -100px; bottom: 0"
          class="position-absolute"
          @click="getListHouseWare()"
          >Tìm kiếm</b-button
        >
        <b-button
          style="height: 30px; right: -200px; bottom: 0"
          class="position-absolute"
          @click="createHouseware()"
          >Tạo mới</b-button
        >
      </b-col>
    </b-row>
    <b-table
      striped
      hover
      :items="list_houseware"
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
          icon="trash"
          variant="danger"
          font-scale="1.5"
          class="deleteRoom cursor"
          @click="deleteData(row.item.id)"
        >
        </b-icon>
        <b-icon
          icon="pencil-square"
          variant="dark"
          font-scale="1.5"
          class="updateRoom cursor ml-3"
          @click="updateHouseware(row.item.id)"
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
    <b-modal
      title="Ingredients"
      centered
      ref="modal-ingredients"
      id="modal-ingredients"
      hide-footer
    >
      <label for="">Tên</label>
      <input type="text" class="form-control" v-model="name_houseware" />
      <label for="">Giá</label>
      <input type="text" class="form-control" v-model="cost_houseware" />
      <label for="">Số lượng</label>
      <input type="text" class="form-control" v-model="quantity_houseware" />
      <div class="mt-3 d-flex justify-content-center">
        <b-button style="width: 100px" @click="create()" v-if="!update"
          >Tạo mới</b-button
        >
        <b-button style="width: 100px" @click="updateData()" v-else
          >Cập nhật</b-button
        >
      </div>
    </b-modal>
  </div>
</template>

<style lang="scss" scoped>
</style>

<script>
export default {
  data() {
    return {
      name: "",
      paginate: {
        perPage: 10,
        total: 50,
        page: 1,
      },
      list_houseware: null,
      name_houseware: null,
      cost_houseware: null,
      quantity_houseware: null,
      update: false,
      id: null,
      fields: [
        { key: "numerical", label: "STT" },
        { key: "name", label: "Tên" },
        { key: "cost", label: "Giá" },
        { key: "quantity", label: "Số lượng" },
        { key: "action", label: "Tùy chọn" },
      ],
    };
  },
  created() {
    this.getListHouseWare();
  },
  methods: {
    getListHouseWare() {
      const params = {
        name: this.name,
        perPage: 10,
        page: this.paginate.page,
      };
      this.$store.dispatch("ingredients/getListHouseware", params).then((res) => {
        this.list_houseware = res.data.data;
        this.paginate.total = res.data.total;
      });
    },
    async changePage(page) {
      this.paginate.page = page;
      await this.getListHouseWare();
    },
    createHouseware() {
      this.name_houseware = null;
      this.cost_houseware = null;
      this.quantity_houseware = null;
      this.quantity_broken_houseware = null;
      this.$refs["modal-ingredients"].show();
    },
    async updateHouseware(id) {
      this.id = id;
      this.$store.dispatch("ingredients/infoHouseware", id).then((res) => {
        this.name_houseware = res.data.name;
        this.cost_houseware = res.data.cost;
        this.quantity_houseware = res.data.quantity;
      });
      await this.$refs["modal-ingredients"].show();
      this.update = true;
    },
    deleteData(id) {
      if (confirm("Ban co muon xoa khong!")) {
        this.$store.dispatch("ingredients/deleteData", id).then(() => {
          this.paginate.page = 1;
          this.getListHouseWare();
        });
      }
    },
    async updateData() {
      const params = {
        id: this.id,
        name: this.name_houseware,
        cost: this.cost_houseware,
        quantity: this.quantity_houseware,
      };

      await this.$store
        .dispatch("ingredients/updateHouseware", params)
        .then((res) => {
          alert("Ban da cap nhat thanh cong");
        });
      this.$refs["modal-ingredients"].hide();
      window.location.reload();
    },
    async create() {
      const params = {
        name: this.name_houseware,
        cost: this.cost_houseware,
        quantity: this.quantity_houseware,
      };

      this.$store.dispatch("ingredients/createHouseware", params).then((res) => {
        alert("Ban da tao ingredients thanh cong");
        this.$refs["modal-ingredients"].hide();
        this.name_houseware = null;
        this.cost_houseware = null;
        this.quantity_houseware = null;
      });
    },
  },
};
</script>
<style lang="scss">
  .cursor {
    cursor: pointer;
  }
</style>
