<template>
  <div>
    <div class="row mb-3 position-relative">
      <div class="form-group col mb-0">
        <label for="">Floor</label>
        <br />
        <b-form-select
          class="type__select form-control col mb-0"
          v-model="floor"
          :options="floorOptions"
        />
      </div>
      <div class="form-group col mb-0">
        <label for="">Type</label>
        <br />
        <b-form-select
          class="type__select form-control col"
          v-model="type"
          :options="room_type"
        />
      </div>
      <div class="col">
        <button class="btn-info btn-search" @click="search()">Search</button>
      </div>
    </div>
    <div class="room__div row mt-3">
      <div
        class="col-3 flex-column justify-content-center align-items-center mb-3"
        v-for="(room, index) in rooms"
        :key="index"
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
            <p style="color: white; font-size: 40px">
              {{ room.name }}
            </p>
            <p style="color: white; font-size: 40px">
              {{ room_type[room.room_type_id].text }}
            </p>
            <p style="color: white; font-size: 15px">
              Cost First Hour:
              {{ cost_first_hour[room.room_type_id - 1].value }} VND
            </p>
            <p style="color: white; font-size: 15px">
              Cost Next Hour:
              {{ cost_next_hour[room.room_type_id - 1].value }} VND
            </p>
          </div>
        </div>
        <div class="btn justify-content-center align-items-center d-flex">
          <button
            v-if="room.status != 1"
            class="btn-info mr-3"
            @click="
              $router.push({ name: 'RoomDetailBook', params: { id: room.id } })
            "
          >
            Chi tiết
          </button>
          <button
            v-if="room.status == 3"
            class="btn-info mr-3"
            @click="$router.push({ name: 'RoomFood', params: { id: room.id } })"
          >
            Đặt món
          </button>
          <button
            class="btn-primary"
            @click="bookRoom(room.id)"
            v-if="room.status != 3"
          >
            Đặt phòng
          </button>
          <button
            class="btn-danger"
            v-if="room.status == 3"
            @click="pay(room.id)"
          >
            Thanh toán
          </button>
          <button
            class="btn-danger ml-3"
            v-if="room.status == 3"
            @click="changeRoom(room.id)"
          >
            Đổi phòng
          </button>
        </div>
      </div>
    </div>
    <b-modal
      title="Danh sách phòng có thể đặt"
      hide-footer
      centered
      ref="modal-change-room"
    >
      <div class="d-flex flex-wrap justify-content-center align-item-center">
        <div
          v-for="(list, index) in list_room"
          :key="index"
          class="
            position-relative
            d-flex
            flex-column
            justify-content-center
            align-item-center
            mr-3
            mt-3
            image
          "
          style="width: 200px; height: 200px"
        >
          <img
            :src="list.image_url"
            alt=""
            class="image"
          />
          <div
            class="price-room position-absolute w-100 h-100 text-center"
            style="background-color: black; left: 0; bottom: 25px"
          >
            <p style="color: white; font-size: 20px">
              {{ list.name }}
            </p>
            <p style="color: white; font-size: 20px">
              {{ room_type[list.room_type_id].text }}
            </p>
            <p style="color: white; font-size: 10px">
              Cost First Hour:
              {{ cost_first_hour[list.room_type_id - 1].value }} VND
            </p>
            <p style="color: white; font-size: 10px">
              Cost Next Hour:
              {{ cost_next_hour[list.room_type_id - 1].value }} VND
            </p>
          </div>
          <button @click="changeRoomId(list.id)">Đổi phòng</button>
        </div>
      </div>
    </b-modal>
  </div>
</template>

<script>
export default {
  data() {
    return {
      rooms: null,
      list_room: null,
      floor: 1,
      room_id: null,
      type: "",
      cost_room: null,
      cost_food: null,
      floorOptions: [
        { value: 1, text: "1" },
        { value: 2, text: "2" },
      ],
      room_type: [
        { value: "", text: "" },
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

  mounted() {
    this.getRoom();
  },

  methods: {
    async getRoom() {
      const params = {
        floor: this.floor,
        type: this.type,
      };
      await this.$store
        .dispatch("room/getRoomFloor", params)
        .then((response) => {
          this.rooms = response.data;
        });
    },
    search() {
      this.getRoom();
    },

    bookRoom(id) {
      this.$router.push({ name: "BookRoom", params: { id: id } });
    },
    async changeRoom(id) {
      await this.$store.dispatch("user/getRoom", id).then((res) => {
        this.list_room = res.list;
      });
      this.room_id = id;
      this.$refs["modal-change-room"].show();
    },
    changeRoomId(id) {
      const params = {
        id: id,
        room_id: this.room_id,
      }
      this.$store.dispatch('user/updateChangeRoom', params).then(async () => {
        this.$refs["modal-change-room"].hide();
        await this.getRoom();
        this.$toasted.show("Đổi phòng thành công", {
        duration: 3000,
      });
      })
    },
    async pay(id) {
      this.$router.push({ name: "Pay", params: { id: id } });
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
