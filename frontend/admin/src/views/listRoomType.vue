<template>
  <div class="list-room-type" style="padding: 30px">
    <template v-if="isLoading">
      <AppLoading />
    </template>
    <template v-else>
      <div class="row position-relative" style="margin-top: 120px">
        <div class="col-4">
          <label for="">Tên phòng</label>
          <input type="text" class="form-control" v-model="name" />
        </div>
        <div>
          <button
            class="position-absolute btn-info"
            @click="search()"
            style="bottom: 0; height: 33px"
          >
            Tìm kiếm
          </button>
        </div>
      </div>
      <div class="room__div row" style="margin-top: 30px">
        <div
          style="cursor: pointer"
          class="col-3 flex-column justify-content-center align-items-center mb-3"
          v-for="(room, index) in rooms"
          :key="index"
          @click="roomDetail(room.id, room.status)"
        >
          <div
            class="image position-relative"
            :class="{
              'image--reserve': room.status == 2,
              'image--empty': room.status == 1,
              'image--hired': room.status == 3,
            }"
          >
            <img :src="room.image_url" alt="" class="w-100 h-100" />
            <div
              class="price-room position-absolute w-100 h-100 text-center"
              style="background-color: black; left: 0; bottom: 0"
            >
              <p style="color: white; font-size: 50px">
                {{ room.name }}
              </p>
              <p style="color: white; font-size: 15px">
                Giá giờ đầu:
                {{ cost_first_hour[room.room_type_id - 1].value }} VND
              </p>
              <p style="color: white; font-size: 15px">
                Giá các giờ tiếp theo:
                {{ cost_next_hour[room.room_type_id - 1].value }} VND
              </p>
            </div>
          </div>
        </div>
      </div>
      <div
        class="pagination d-flex justify-content-center"
        style="margin-top: 100px"
      >
        <b-pagination
          v-model="paginate.page"
          :total-rows="paginate.total"
          :per-page="paginate.perPage"
          aria-controls="my-table"
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
      rooms: [],
      name: "",
      paginate: {
        perPage: 5,
        total: 50,
        page: 1,
      },
      room_type: [
        { value: 1, text: "Vip Single Room" },
        { value: 2, text: "Normal Double Room" },
        { value: 3, text: "Normal Single Room" },
        { value: 4, text: "Vip Double Room" },
      ],

      cost_first_hour: [
        { value: 2000000 },
        { value: 1000000 },
        { value: 700000 },
        { value: 2500000 },
      ],

      cost_next_hour: [
        { value: 1500000 },
        { value: 700000 },
        { value: 500000 },
        { value: 2000000 },
      ],
    };
  },

  created() {
    this.$store.dispatch("common/setIsLoading", true);
    this.getRoom();
    this.$store.dispatch("common/setIsLoading", false);
  },
  computed: {
    ...mapGetters({
      isLoading: "common/isLoading",
    }),
  },
  methods: {
    async search() {
      await this.getRoom();
    },
    async getRoom() {
      const params = {
        name: this.name,
        roomType: this.$route.query.type_room_id,
        perPage: this.paginate.perPage,
        page: this.paginate.page,
      };
      this.$store.dispatch("room/getListRooms", params).then((response) => {
        this.rooms = response.listRoom.data;
        this.paginate.total = response.listRoom.total;
      });
    },
    roomDetail(id, status) {
      if (this.$route.query.room_customer_id) {
        this.$router.push({
          name: "RoomDetails",
          query: {
            room_id: id,
            room_status: status,
            room_customer_id: this.$route.query.room_customer_id
          },
        });
      } else {
        this.$router.push({
          name: "RoomDetails",
          query: {
            room_id: id,
            room_status: status,
          },
        });
      }
    },
    async changePage(value) {
      this.paginate.page = value;
      await this.getRoom();
    },
  },
};
</script>

<style lang="scss" scoped>
.image {
  height: 300px;
  border-radius: 5px;
  overflow: hidden;
  &--reserve {
    border: 3px solid orange;
  }
  &--empty {
    border: 3px solid black;
  }
  &--hired {
    border: 3px solid red;
  }
}
.price-room {
  opacity: 0;
}

.image:hover {
  .price-room {
    z-index: 2;
    opacity: 0.5;
  }
}
button {
  border-radius: 5px;
}
.btn-search {
  position: absolute;
  bottom: 0;
}
</style>
