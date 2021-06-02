<template>
  <div>
    <div>
      <p
        v-for="(message, index) in this.firebaseMessages"
        :key="index"
      >
        {{ message.data().message + "," + message.data().userName }}
      </p>
    </div>
    <div>
      <input
        type="text"
        class="form-control position-absolute"
        style="bottom: 0"
        v-model="message"
      />
      <b-icon
        icon="trash"
        class="position-absolute"
        style="right: 20px; bottom: 10px"
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
      firebaseMessages: "firebase/messages"
    })
  },
  async created() {
    await store.dispatch("auth/getAccountCustomer").then((res) => {
      this.user = res.data;
    });
    await this.getRoomInfo();
    await console.log(this.firebaseRoom);
  },
  methods: {
    ...mapActions("firebase", ["createMessage", "getRoom"]),

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
