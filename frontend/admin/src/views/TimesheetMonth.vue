<template>
  <div>
    <p>Danh Sách Công Trong Tháng</p>
    <b-table
      striped
      hover
      :items="info"
      :fields="fields"
      :current-page="paginate.currentPage"
      v-if="info"
    >
      <template #cell(numerical)="row">
        {{
          ++row.index + (Number(paginate.page) - 1) * Number(paginate.perPage)
        }}
      </template>
      <template #cell(money)="row">
        {{
          (row.item.salary*row.item.total_time/(day*11)).toFixed(2)
        }}
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
      users: null,
      listTimesheet: null,
      info: [],
      day: null,
      fields: [
        { key: "numerical", label: "STT" },
        { key: "name", label: "Tên nhân viên" },
        { key: "salary", label: "Lương" },
        { key: "total_time", label: "Tổng giờ làm việc trong tháng" },
        { key: "money", label: "Thành tiền" },
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
    var d = new Date();
    var n = d.getMonth();
    var y = d.getFullYear();
    this.day = new Date(y, n, 0).getDate();
  },
  methods: {
    async getUser() {
      const params = {
        perPage: 10,
        page: this.paginate.page,
      };
      await this.$store.dispatch("user/getListUsers", params).then(async (res) => {
        this.users = await res.data.listUser.data;
        this.paginate.total = await res.data.listUser.total;
        this.info = [];
        for (let i = 0; i < this.users.length; i++) {
          await this.getListTimeSheet(this.users[i].id);
        }
      });
    },
   async getListTimeSheet(id) {
      await this.$store.dispatch("user/getTimeSheetMounth", id).then((res) => {
        let info_option = {
          name: res.name,
          salary: res.salary,
          total_time: res.total_time ? (res.total_time).toFixed(2) : null,
        };
        this.info.push(info_option);
      });
    },
    async changePage(value) {
      this.paginate.page = value;
      await this.getUser();
    },
  },
};
</script>
