<template>
  <div>
    <div class="row" style="max-height: 100vh">
      <div
        class="col-3 list-user"
        style="height: 800px; overflow:scroll; border: 1px solid gray; background-color: white"
      >
        <p
          v-for="(room, index) in this.firebaseListRoom"
          :key="index"
          @click="showRoom(room.roomId)"
          style="cursor: pointer"
        >
          {{ room.name }}
        </p>
      </div>
      <div
        class="room-chat col-9 position-relative w-100"
        style="height: 800px;padding: 60px 10px; overflow: auto; border: 1px solid gray; background-color: white"
      >
        <div style="" class="d-flex flex-column">
          <div
            v-for="message in this.firebaseMessages"
            :key="message.id"
            class=""
          >
            <p
              class="message"
              :class="[
                user.lastname == message.data().userName
                  ? 'message-user'
                  : 'message-admin',
              ]"
            >
              {{ message.data().message }}
            </p>
            <!-- {{ message.data().createdAt.toDate() }} -->
          </div>
        </div>
        <div class="w-100">
          <input
            type="text"
            class="form-control position-fixed"
            v-model="message"
            style="bottom: 50px; right: 30px; width: 100%"
          />
          <b-icon
            icon="cursor-fill"
            class="position-fixed"
            style="right: 50px; bottom: 60px"
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
    await this.getListRoom("admin-" + this.user.id.toString());
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
        roomId: this.roomId,
      });
    },
  },
};
</script>

<style lang="scss" scoped>
.message {
  margin-bottom: 10px;
  display: block;
  max-width: 160px;
  border-radius: 23px;
}
.message-admin {
  float: left;
  text-align: left;
  padding: 10px;
  background-color: #e4e6eb;
  color: #050505;
}
.message-user {
  text-align: left;
  padding: 10px;
  background-color: #0084ff;
  color: white;
  // width: 150px;
  float: right;
  word-wrap: break-word;
  border-radius: 23px;
}
</style>
