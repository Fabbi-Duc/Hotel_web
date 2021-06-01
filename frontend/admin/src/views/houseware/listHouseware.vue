<template>
  <div class="list-houseware">
    <b-row style="margin-bottom: 30px">
      <b-col cols="4" class="position-relative">
        <label for="">Name</label>
        <br />
        <input type="text" class="form-control" v-model="name" />
        <b-button
          style="height: 30px; right: -100px; bottom: 0"
          class="position-absolute"
          @click="getListHouseWare()"
          >Search</b-button
        >
        <b-button
          style="height: 30px; right: -250px; bottom: 0"
          class="position-absolute"
          @click="createHouseware()"
          >Create Houseware</b-button
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
          class="deleteRoom"
          @click="deleteData(row.item.id)"
        >
        </b-icon>
        <b-icon
          icon="pencil-square"
          variant="dark"
          font-scale="1.5"
          class="updateRoom ml-3"
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
      title="Houseware"
      centered
      ref="modal-houseware"
      id="modal-houseware"
      hide-footer
    >
      <label for="">Name</label>
      <input type="text" class="form-control" v-model="name_houseware" />
      <label for="">Cost</label>
      <input type="text" class="form-control" v-model="cost_houseware" />
      <label for="">Quantity</label>
      <input type="text" class="form-control" v-model="quantity_houseware" />
      <label for="">Quantity_Broken</label>
      <input
        type="text"
        class="form-control"
        v-model="quantity_broken_houseware"
      />
      <div class="mt-3 d-flex justify-content-center">
        <b-button style="width: 100px" @click="create()" v-if="!update"
          >Create</b-button
        >
        <b-button style="width: 100px" @click="updateData()" v-else
          >Update</b-button
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
      quantity_broken_houseware: null,
      update: false,
      id: null,
      fields: [
        { key: "numerical", label: "numerical" },
        { key: "name", label: "name" },
        { key: "cost", label: "cost" },
        { key: "quantity", label: "quantity" },
        { key: "quantity_broken", label: "quantity_broken" },
        { key: "action", label: "action" },
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
      this.$store.dispatch("houseware/getListHouseware", params).then((res) => {
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
      this.$refs["modal-houseware"].show();
    },
    async updateHouseware(id) {
      this.id = id;
      this.$store.dispatch("houseware/infoHouseware", id).then((res) => {
        this.name_houseware = res.data.name;
        this.cost_houseware = res.data.cost;
        this.quantity_houseware = res.data.quantity;
        this.quantity_broken_houseware = res.data.quantity_broken;
      });
      await this.$refs["modal-houseware"].show();
      this.update = true;
    },
    deleteData(id) {
      if (confirm("Ban co muon xoa khong!")) {
        this.$store.dispatch("houseware/deleteData", id).then(() => {
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
        quantity_broken: this.quantity_broken_houseware,
      };

      await this.$store
        .dispatch("houseware/updateHouseware", params)
        .then((res) => {
          alert("Ban da cap nhat thanh cong");
        });
      this.$refs["modal-houseware"].hide();
      window.location.reload();
    },
    async create() {
      const params = {
        name: this.name_houseware,
        cost: this.cost_houseware,
        quantity: this.quantity_houseware,
        quantity_broken: this.quantity_broken_houseware,
      };

      this.$store.dispatch("houseware/createHouseware", params).then((res) => {
        alert("Ban da tao houseware thanh cong");
        this.$refs["modal-houseware"].hide();
        this.name_houseware = null;
        this.cost_houseware = null;
        this.quantity_houseware = null;
        this.quantity_broken_houseware = null;
      });
    },
  },
};
</script>
