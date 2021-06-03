<template>
  <div>
    <div class="row" style="max-height: 100vh">
      <div
        class="col-3 list-user"
        style="height: 800px; border: 1px solid gray; background-color: white"
      >
        <p
          v-for="(room, index) in this.firebaseListRoom"
          :key="index"
          @click="showRoom(room.roomId)"
        >
          {{ room.name }}
        </p>
      </div>
      <div
        class="room-chat col-9"
        style="height: 800px; border: 1px solid gray; background-color: white"
      >
        <div>
          <p v-for="message in this.firebaseMessages" :key="message.id">
            {{ message.data().message + "," + message.data().userName }}
          </p>
        </div>
        <div class="w-100">
          <input
            type="text"
            class="form-control position-absolute"
            style="bottom: 0; right: 0px"
            v-model="message"
          />
          <b-icon
            icon="cursor-fill"
            class="position-absolute"
            style="right: 20px; bottom: 10px"
            @click="sendMessage"
          ></b-icon>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import store from "@/store";
export default {
  data() {
    return {
      message: "",
      user: null,
      roomId: null,
    };
  },
  computed: {
    ...mapGetters({
      firebaseRoom: "firebase/room",
      firebaseMessages: "firebase/messages",
      firebaseListRoom: "firebase/listRoom",
    }),
  },
  async created() {
    await store.dispatch("auth/getAccount").then((res) => {
      this.user = res.data;
    });
    await this.getListRoom('admin-' + this.user.id.toString());
  },
  methods: {
    ...mapActions("firebase", ["createMessage", "getRoom", "getListRoom"]),

    async sendMessage() {
      let data = {
        roomId: this.roomId,
        message: {
          userId: this.user.id,
          userName: this.user.lastname,
          message: this.message,
          createdAt: new Date(),
        },
      };
      await this.$store
        .dispatch("firebase/createMessage", data)
        .then(() => {
          this.message = "";
        })
        .catch((error) => {
          console.log(error);
        });
    },
    showRoom(roomId) {
      this.roomId = roomId;
      this.getRoom({
        roomId: this.roomId
      });
    },
  },
};
</script>
