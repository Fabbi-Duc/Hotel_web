<template>
  <div>
    <b-row class="mb-3">
      <b-col cols="3">
        <label for="">FirstName</label>
        <br />
        <input type="text" v-model="firstName" />
      </b-col>
      <b-col cols="3">
        <label for="">LastName</label>
        <br />
        <input type="text" v-model="lastName" />
      </b-col>
      <b-col cols="3">
        <label for="">Position</label>
        <br />
        <b-form-select
          class="position__select"
          v-model="position"
          :options="positions"
          @change="customPaginate()"
        />
      </b-col>
      <b-col>
        <button
          class="position-absolute btn-primary"
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
    <table>

    </table>
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
      fields: [
        { key: "room", label: "Room" },
        { key: "firstname", label: "firstname" },
        { key: "lastname", label: "lastname" },
        { key: "birthday", label: "birthday" },
        { key: "position", label: "position" },
        { key: "gender", label: "gender" },
        { key: "phone", label: "phone" },
        { key: "email", label: "email" },
        { key: "action", label: "action" },
      ],
      records: [
        { value: 10, text: "10" },
        { value: 15, text: "15" },
        { value: 20, text: "20" },
        { value: 25, text: "25" },
      ],
      paginate: {
        perPage: 10,
        total: 50,
        page: 1,
      },
    }
  },
}
</script>

<style lang="scss" scoped>

</style>
