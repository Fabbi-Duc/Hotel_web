<template>
  <div>
    <template v-if="isLoading">
      <AppLoading />
    </template>
    <template v-else>
      <b-row class="mb-3" v-if="users">
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
          <label for="">Chức vụ</label>
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
            Tìm kiếm
          </button>
        </b-col>
      </b-row>
      <div
        class="d-flex f-w3 record justify-content-start align-items-center"
        v-if="users"
      >
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
        :items="users"
        :fields="fields"
        :current-page="paginate.currentPage"
        v-if="users"
      >
        <template #cell(numerical)="row">
          {{
            ++row.index + (Number(paginate.page) - 1) * Number(paginate.perPage)
          }}
        </template>
        <template #cell(position)="row">
          <span>{{positions[row.item.position].text}}</span>
        </template>
        <template #cell(gender)="row">
          <span>
            {{ row.item.gender == 1 ? "Nam" : "Nữ" }}
          </span>
        </template>
        <template #cell(shift)="row">
          <span>
            {{ row.item.shift == 1 ? "Ca sáng" : "Ca tối" }}
          </span>
        </template>
        <template #cell(action)="row">
          <b-icon
            icon="trash"
            variant="danger"
            font-scale="1.5"
            class="deleteRoom"
            @click="deletRoom(row.item.id)"
          >
          </b-icon>
          <b-icon
            icon="pencil-square"
            variant="dark"
            font-scale="1.5"
            class="updateRoom"
            @click="
              $router.push({ name: 'UsersUpdate', params: { id: row.item.id } })
            "
          >
          </b-icon>
        </template>
      </b-table>
      <div class="pagination" v-if="users">
        <b-pagination
          v-model="paginate.page"
          :total-rows="paginate.total"
          :per-page="paginate.perPage"
          @change="changePage"
        >
        </b-pagination>
      </div>
    </template>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      page: 1,
      firstName: null,
      lastName: null,
      position: null,
      positions: [
        { value: 0, text: "Admin" },
        { value: 1, text: "Nhân viên vệ sinh" },
        { value: 2, text: "Nhân viên tư vấn" },
        { value: 3, text: "Đầu bếp" },
        { value: 4, text: "Bảo vệ" },
        { value: 5, text: "Lễ tân" },
      ],
      fields: [
        { key: "numerical", label: "STT" },
        { key: "firstname", label: "firstname" },
        { key: "lastname", label: "lastname" },
        { key: "birthday", label: "Ngày sinh" },
        { key: "position", label: "Chức vụ" },
        { key: "gender", label: "Giới tính" },
        { key: "phone", label: "SDT" },
        { key: "email", label: "email" },
        { key: "shift", label: "Ca làm việc" },
        { key: "salary", label: "Lương" },
        { key: "action", label: "Hành động" },
      ],
      users: null,
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
    };
  },
  computed: {
    ...mapGetters({
      isLoading: "common/isLoading",
    }),
  },
  async created() {
    this.$store.dispatch("common/setIsLoading", true);
    await this.getUsers();
    this.$store.dispatch("common/setIsLoading", false);
  },
  methods: {
    deletRoom(id) {
      if (confirm('xoa')) {
        this.$store.dispatch("common/setIsLoading", true);
        this.$store.dispatch("user/deleteUser", id);
        this.getUsers();
        this.$store.dispatch("common/setIsLoading", false);
      }
    },
    async getUsers() {
      const params = {
        firstname: this.firstName,
        lastname: this.lastName,
        position: this.position,
        perPage: this.paginate.perPage,
        page: this.paginate.page,
      };
      await this.$store.dispatch("user/getListUsers", params).then((res) => {
        this.users = res.data.listUser.data;
        this.paginate.total = res.data.listUser.total;
      });
    },
    customPaginate() {
      this.getUsers();
    },
    search() {
      this.paginate.currentPage = 1;
      this.getUsers();
    },
    async changePage(page) {
      this.paginate.page = page;
      await this.getUsers();
    },
  },
};
</script>

<style lang="scss" scoped>
input {
  border-radius: 5px;
  height: 40px;
  padding: 0 15px;
  width: 100%;
}
button {
  height: 40px;
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
.position__select {
  width: 100%;
  height: 40px;
  border: 1px solid black;
}
</style>