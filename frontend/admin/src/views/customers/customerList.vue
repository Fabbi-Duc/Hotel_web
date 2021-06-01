<template>
  <div>
    <b-row class="mb-3">
      <b-col cols="3">
        <label for="">Name</label>
        <br />
        <input type="text" class="form-control" v-model="name" />
      </b-col>
      <b-col>
        <button
          class="position-absolute btn-info"
          style="bottom: 0"
          @click="search()"
        >
          Search
        </button>
      </b-col>
    </b-row>
    <div class="d-flex f-w3 record justify-content-start align-items-center">
      <b-form-select
        class="record__select"
        v-model="paginate.perPage"
        :options="records"
        @change="customPaginate()"
      />
      <span>Number of records returned</span>
    </div>
    <b-table
      striped
      hover
      :items="customers"
      :fields="fields"
      :current-page="paginate.currentPage"
    >
      <template #cell(numerical)="row">
        {{
          ++row.index + (Number(paginate.page) - 1) * Number(paginate.perPage)
        }}
      </template>
      <template #cell(gender)="row">
        <span>
          {{
            row.item.gender == 1
            ? 'male'
            : 'female'
          }}
        </span>
      </template>
    </b-table>
    <div class="pagination">
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
      name: '',
      fields: [
        { key: "numerical", label: "numerical" },
        { key: "name", label: "lastname" },
        { key: "birthday", label: "birthday" },
        { key: "gender", label: "gender" },
        { key: "phone", label: "phone" },
        { key: "email", label: "email" },
        { key: "identity_card", label: "identity_card" },
      ],

      customers: null,
      records: [
        { value: 5, text: "5" },
        { value: 10, text: "10" },
        { value: 15, text: "15" },
        { value: 20, text: "20" },
      ],
      paginate: {
        perPage: 10,
        total: 50,
        page: 1,
      },
    }
  },

  mounted() {
    this.getCustomers();
  },
  methods: {
    async getCustomers() {
      const params = {
        name: this.name,
        perPage: this.paginate.perPage,
        page: this.paginate.page,
      };
      await this.$store.dispatch("customer/getListCustomer", params).then((res) => {
        this.customers = res.data.data;
        this.paginate.total = res.data.total;
      });
    },
    customPaginate() {
      this.getCustomers();
    },
    search() {
      this.paginate.currentPage = 1;
      this.getCustomers();
    },
    async changePage(page) {
      this.paginate.page = page;
      await this.getCustomers();
    },
  }
}
</script>

<style lang="scss" scoped>
button {
  height: 30px;
  border-radius: 5px;
  left: 30px;
}
.record {
  font-size: 15px;
  margin-top: 30px;
  margin-bottom: 20px;
  &__select {
    margin-right: 10px;
    width: 80px;
    height: 40px;
    box-shadow: none;
  }
}
</style>
