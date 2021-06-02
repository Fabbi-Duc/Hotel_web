<template>
  <div v-if="rooms">
    <b-row class="mb-3">
      <b-col cols="3">
        <label for="">Name</label>
        <br />
        <input type="text" v-model="name" />
      </b-col>
      <b-col cols="3">
        <label for="">Type</label>
        <br />
        <b-form-select
          class="type__select"
          v-model="type"
          :options="types"
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
    <b-table
      striped
      hover
      :items="rooms"
      :fields="fields"
      :current-page="paginate.currentPage"
    >
      <template #cell(numerical)="row">
        {{
          ++row.index + (Number(paginate.page) - 1) * Number(paginate.perPage)
        }}
      </template>
      <template #cell(status)="row">
        <span v-if="row.item.status == 1">Empty</span>
        <span v-if="row.item.status == 2" style="color: red">Hired</span>
        <span v-if="row.item.status == 3" style="color: orange">Reserve</span>
      </template>
      <template #cell(room_type_id)="row">
        <span v-if="row.item.room_type_id == 1">{{ types[0].text }}</span>
        <span v-if="row.item.room_type_id == 2">{{ types[1].text }}</span>
        <span v-if="row.item.room_type_id == 3">{{ types[2].text }}</span>
        <span v-if="row.item.room_type_id == 4">{{ types[3].text }}</span>
      </template>
      <template #cell(cost_first_hour)="row">
        <span v-if="row.item.room_type_id == 1">{{ roomType[0].cost_first_hour }}</span>
        <span v-if="row.item.room_type_id == 2">{{ roomType[1].cost_first_hour }}</span>
        <span v-if="row.item.room_type_id == 3">{{ roomType[2].cost_first_hour }}</span>
        <span v-if="row.item.room_type_id == 4">{{ roomType[3].cost_first_hour }}</span>
      </template>
      <template #cell(cost_next_hour)="row">
        <span v-if="row.item.room_type_id == 1">{{ roomType[0].cost_next_hour }}</span>
        <span v-if="row.item.room_type_id == 2">{{ roomType[1].cost_next_hour }}</span>
        <span v-if="row.item.room_type_id == 3">{{ roomType[2].cost_next_hour }}</span>
        <span v-if="row.item.room_type_id == 4">{{ roomType[3].cost_next_hour }}</span>
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
          @click="updateRoom(row.item.id)"
        >
        </b-icon>
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
      name: "",
      type: "",
      rooms: null,
      id: null,
      types: [
        { value: 1, text: "Vip Single Room" },
        { value: 2, text: "Normal Double Room" },
        { value: 3, text: "Normal Single Room" },
        { value: 4, text: "Vip Double Room" },
      ],
      fields: [
        { key: "numerical", label: "Numerical" },
        { key: "name", label: "Name" },
        { key: "room_type_id", label: "Type" },
        { key: "code_room", label: "Code" },
        { key: "status", label: "Status" },
        { key: "cost_first_hour", label: "Cost First Hour" },
        { key: "cost_next_hour", label: "Cost Next Hour" },
        { key: "floor", label: "Floor" },
        { key: "action", label: "Action" },
      ],
      records: [
        { value: 5, text: "5" },
        { value: 10, text: "10" },
        { value: 15, text: "15" },
        { value: 20, text: "20" },
      ],
      paginate: {
        perPage: 5,
        total: 50,
        page: 1,
      },
      roomType: null,
    };
  },

  created() {
    this.getRoom();
    this.getRoomType();
  },
  methods: {
    async getRoom() {
      const params = {
        name: this.name,
        roomType: this.type,
        perPage: this.paginate.perPage,
        page: this.paginate.page,
      };
      await this.$store
        .dispatch("room/getListRooms", params)
        .then((response) => {
          this.rooms = response.listRoom.data;
          this.paginate.total = response.listRoom.total;
          this.paginate.perPage = response.listRoom.per_page;
        });
    },
    async changePage(value) {
      this.paginate.page = value;
      await this.getRoom();
    },
    customPaginate() {
      this.getRoom();
    },
    search() {
      this.getRoom();
    },
    async getRoomType() {
      await this.$store.dispatch("room/getRoomType").then((respone) => {
        this.roomType = respone.listRoomTypes;
      });
    },
    async deletRoom(id) {
      const params = {
        id: id,
      };
      if (confirm("Do you want to delete this record ?") == true) {
        await this.$store
          .dispatch("room/deleteRoom", params)
          .then(this.getRoom());
      }
    },
    updateRoom(id) {
      this.$router.push({name: 'RoomUpdate', params: { id: id }})
    }
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
.type__select {
  width: 100%;
  height: 40px;
  border: 1px solid black;
}
.detailRoom {
  margin: 0 10px;
}
</style>
