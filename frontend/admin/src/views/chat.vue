<template>
  <div class="d-flex justify-content-center" style="background-color: #F5f5f5">
    <div style="max-height: 100vh; overflow: scroll">
      <p
        v-for="(room, index) in this.firebaseListRoom"
        :key="index"
      >
        {{ room.name }}
      </p>
      --------------
      <p
      style="padding: 10px 0"
        v-for="(message) in this.firebaseMessages"
        :key="message.id"
        class="d-flex justify-content-between align-items-center"
      >
        <span class="user-name" v-if="user.name == message.data().userName">{{ message.data().userName }}</span>
        <span class="user-admin" v-if="user.name !== message.data().userName">admin</span>
        <span class="message text-left">{{ message.data().message }}</span>
      </p>
    </div>
    <div>
      <input
        type="text"
        class="form-control position-absolute"
        style="bottom: 0; height: 50px"
        v-model="message"
      />
      <b-icon
        icon="cursor-fill"
        scale="1.5"
        class="position-absolute"
        style="right: 20px; bottom: 15px; cursor: pointer"
        @click="sendMessage"
      ></b-icon>
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
    };
  },
  computed: {
    ...mapGetters({
      firebaseRoom: "firebase/room",
      firebaseMessages: "firebase/messages",
      firebaseListRoom: "firebase/listRoom"
    })
  },
  async created() {
    await store.dispatch("auth/getAccountCustomer").then((res) => {
      this.user = res.data;
    });
    await this.getRoomInfo();
    await this.getListRoom(this.user.id.toString());
  },
  methods: {
    ...mapActions("firebase", ["createMessage", "getRoom", "getListRoom"]),

    async sendMessage() {
      let data = {
        roomId: this.$route.params.id,
        message: {
          userId: this.user.id,
          userName: this.user.name,
          message: this.message,
          createdAt: new Date()
        }
      };
      await this.$store
        .dispatch("firebase/createMessage", data)
        .then(() => {
          this.message = "";
        })
        .catch(error => {
          console.log(error);
        });
    },
    async getRoomInfo() {
      await this.getRoom({
        roomId: this.$route.params.id
      });
    }
  },
};
</script>
<style lang="scss">
  .user-name {
    display: inline-block;
    background-color: green;
    border-radius: 3px;
    color: white;
    margin-right: 10px;
    width: 200px;
    padding: 10px 0;
  }
  .user-admin {
    display: inline-block;
    background-color: red;
    border-radius: 3px;
    color: white;
    margin-right: 10px;
    width: 200px;
    padding: 10px 0;
  }
</style>
