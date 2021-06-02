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
            v-if="room.status == 2"
            class="btn-info mr-3"
            @click="
              $router.push({ name: 'RoomDetailBook', params: { id: room.id } })
            "
          >
            Detail
          </button>
          <button
            v-if="room.status == 3"
            class="btn-info mr-3"
            @click="$router.push({ name: 'RoomFood', params: { id: room.id } })"
          >
            Food
          </button>
          <button
            class="btn-primary"
            @click="bookRoom(room.id)"
            v-if="room.status != 3"
          >
            Book Room
          </button>
          <button class="btn-danger" v-else @click="pay(room.id)">Pay</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      rooms: null,
      floor: 1,
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
    async pay(id) {
      this.$router.push({ name: "Pay", params: { id: id } });
      // await this.$store.dispatch("user/pay", id).then((res) => {
      //   (this.cost_room = res.data), (this.cost_food = res.money);
      //   alert("Ban da thanh toan thanh cong");
      // });
      // window.location.reload()
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
