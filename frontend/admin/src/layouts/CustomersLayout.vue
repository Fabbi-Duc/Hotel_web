<template>
  <div id="customer">
    <div class="header">
      <b-row
        class="header__contact d-flex justify-content-between align-items-center"
      >
        <b-col cols="12" md="8" class="d-flex">
          <div>
            <b-icon icon="geo-alt-fill" class="header__contact__icon"></b-icon>
            <span>9 Crosby Street, New York City</span>
          </div>
          |
          <div>
            <b-icon icon="envelope" class="header__contact__icon"></b-icon>
            <span>Nguyendinhtanvp07@gmail.com</span>
          </div>
          <div>
            <b-icon icon="telephone" class="header__contact__icon"></b-icon>
            <span>0123456789</span>
          </div>
        </b-col>
        <b-col cols="12" md="4" class="text-right">
          <b-icon icon="twitter" class="header__contact__icon--right"></b-icon>
          <a href="https://www.facebook.com/nguyendinhtan5555/"
            ><b-icon
              icon="facebook"
              class="header__contact__icon--right"
            ></b-icon
          ></a>
          <b-icon
            icon="instagram"
            class="header__contact__icon--right"
          ></b-icon>
          <b-icon icon="twitter" class="header__contact__icon--right"></b-icon>
        </b-col>
      </b-row>
      <div class="header__nav">
        <b-row
          class="header__nav__wrap justify-content-between align-items-center"
        >
          <b-col
            md="4"
            class="header__nav__brand d-flex justify-content-start align-items-center"
          >
            <img
              @click="home()"
              src="../assets/image/logo.svg"
              alt=""
              class="mr-3"
              style="cursor: pointer"
            />
          </b-col>
          <b-col md="8" class="header__nav__top text-right">
            <a style="cursor: pointer" class="active" @click="home()"
              >Trang chủ</a
            >
            <a href="/food" v-if="isFood">Đặt đồ ăn</a>
            <!-- <a href="/food">About</a> -->
            <!-- <button @click="chat()">Chat</button> -->
            <a style="cursor: pointer" @click="clean()" v-if="isFood">Clean</a>
            <b-button @click="chat()" variant="success" class="button-action"
              >Chat với lễ tân</b-button
            >
            <!-- <button @click="getLocation()" class="ml-3">Share Location</button> -->
            <b-button
              @click="getLocation()"
              variant="info"
              class="button-action"
              >Chia sẻ vị trí</b-button
            >
            <!-- <button @click="logoutCustomer()" class="ml-3">Logout</button> -->
            <b-button @click="logoutCustomer()" variant="dark"
              >Đăng xuất</b-button
            >
          </b-col>
        </b-row>
      </div>
    </div>
    <router-view />
    <div class="footer">
      <div class="footer__wrap">
        <b-row>
          <b-col md="4" class="text-center">
            <h5 class="footer__wrap__contact">CONTACT</h5>
            <p class="footer__wrap__address">
              9 Crosby Street, New York City, NY
            </p>
            <p class="footer__wrap__mail">fivestar@qodeinteractive.com</p>
            <p class="footer__wrap__phone">( 646 ) 218-6400</p>
            <div
              class="footer__wrap__bank d-flex justify-content-center align-item-center"
            >
              <img
                src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/05/fotter-card-img-haver-1.png"
                alt=""
              />
              <img
                src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/05/fotter-card-img-haver-2.png"
                alt=""
              />
              <img
                src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/05/fotter-card-img-haver-3.png"
                alt=""
              />
              <img
                src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/05/fotter-card-img-haver-4.png"
                alt=""
              />
              <img
                src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/05/fotter-card-img-haver-5.png"
                alt=""
              />
            </div>
          </b-col>
          <b-col md="4" class="text-center">
            <h5 class="footer__wrap__name">VINTAGE</h5>
            <p class="footer__wrap__description">
              Lorem ipsum dolor sit amet, consecteturadipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
              enim ad ipsum dolor sit amet. Lorem ipsum dolor sit amet,
              consectetura iolor sit amet.
            </p>
          </b-col>
          <b-col md="4" class="text-center">
            <h5 class="footer__wrap__share">NEWSLETTER</h5>
            <div class="footer__wrap__send-mail">
              <input type="text" placeholder="E-Mail" />
              <span class="go">GO</span>
            </div>
            <div
              style="
                background-color: blue;
                width: 150px;
                padding: 10px 0;
                margin-left: 29px;
              "
              class="fb-share-button"
              data-href="https://2cc28894e19d.ngrok.io"
              data-layout="button_count"
              data-size="large"
            >
              <a
                target="_blank"
                style="color: #fff"
                href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2F2cc28894e19d.ngrok.io%2F&amp;src=sdkpreparse"
                class="fb-xfbml-parse-ignore"
                >Chia sẻ lên facebook</a
              >
            </div>
          </b-col>
        </b-row>
        <div class="footer__copyright text-center mt-5">
          © 2021 QODE INTERACTIVE, ALL RIGHTS RESERVED
        </div>
      </div>
    </div>
    <div v-if="isChat">
      <div
        class="label position-fixed"
        style="
          z-index: 12;
          background-color: #ffffff;
          right: 40px;
          bottom: 450px;
          padding: 20px 0 20px 20px;
          width: 300px;
          box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
          border-top-left-radius: 8px;
          border-top-right-radius: 8px;
        "
      >
        ADMIN
      </div>
      <b-icon
        icon="x-circle"
        class="position-fixed"
        scale="2"
        style="right: 50px; bottom: 475px; z-index: 1000; cursor: pointer"
        @click="closeChat"
      ></b-icon>
      <div
        class="room-chat position-fixed"
        id="chat-room"
        style="
          bottom: 0;
          right: 40px;
          width: 300px;
          height: 500px;
          padding-bottom: 60px;
          background-color: white;
          overflow: scroll;
          border-top-left-radius: 8px;
          border-top-right-radius: 8px;
          padding: 50px 20px 50px 20px;
          box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
            rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px,
            rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
            box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
          z-index: 10;
        "
      >
        <!-- <div
          style=""
          v-for="(room, index) in this.firebaseListRoom"
          :key="index"
        >
          {{ room.name }}
        </div>
        -------------- -->
        <div style="padding: 10px 0" class="d-flex flex-column">
          <!-- <span class="user-name" v-if="user.name == message.data().userName">{{
          message.data().userName
        }}</span>
        <span class="user-admin" v-if="user.name !== message.data().userName"
          >admin</span
        > -->
          <div
            v-for="message in this.firebaseMessages"
            :key="message.id"
            class=""
          >
            <p
              class="message"
              :class="[
                user.name == message.data().userName
                  ? 'message-user'
                  : 'message-admin',
              ]"
            >
              {{ message.data().message }}
            </p>
              <!-- {{ message.data().createdAt.toDate() }} -->
          </div>
        </div>
        <div>
          <input
            autofocus
            type="text"
            class="form-control position-fixed"
            style="
            bottom: 0;
            height: 50px;
            width: 280px;
            right: 50px;
            padding-right: 35px;
            border-radius: 20px;
            background: #f0f2f5
            color: #FFF;
          "
            v-model="message"
          />
          <b-icon
            icon="cursor-fill"
            scale="1.5"
            class="position-fixed"
            style="right: 60px; bottom: 18px; cursor: pointer"
            @click="sendMessage"
          ></b-icon>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import store from "@/store";
import { sendNotificationFirebase } from "@/api/notification.api";
import { mapActions, mapGetters } from "vuex";
export default {
  name: "Customer",
  data() {
    return {
      isFood: false,
      room_id: null,
      room_chat: null,
      user: null,
      message: "",
      isChat: false,
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
    await store.dispatch("auth/getAccountCustomer").then((res) => {
      this.user = res.data;
    });
    await this.getUser();
    await this.getListRoom(this.user.id.toString());
  },
  methods: {
    home() {
      this.$router.push({ name: "Customer" });
    },

    ...mapActions("firebase", ["createRoom", "getRoom", "getListRoom"]),

    async chat() {
      this.isChat = true;
      let data = {
        userId: ["admin-10", this.user.id.toString()],
        users: [
          {
            id: this.user.id.toString(),
            data: {
              name: this.user.name,
              createdAt: new Date(),
            },
          },
        ],
      };
      await this.$store
        .dispatch("firebase/createRoom", data)
        .then((result) => {
          // this.$router.push({ name: "Chat", params: { id: result } });
          this.room_chat = result;
          this.getRoomInfo();
        })
        .catch(() => {
          console.log("error");
        });
    },
    async sendMessage() {
      let data = {
        roomId: this.room_chat,
        message: {
          userId: this.user.id,
          userName: this.user.name,
          message: this.message,
          createdAt: new Date(),
        },
      };
      await this.$store
        .dispatch("firebase/createMessage", data)
        .then(() => {
          this.message = "";
          document.getElementById("chat-room").scrollIntoView(false);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    async getRoomInfo() {
      await this.getRoom({
        roomId: this.room_chat,
      });
    },
    async getUser() {
      await store
        .dispatch("customer/getCustomerFood", this.user.id)
        .then((res) => {
          if (res.success) {
            this.isFood = true;
            this.room_id = res.data;
          }
        });
    },
    closeChat() {
      this.isChat = false;
    },
    async clean() {
      await store.dispatch("customer/clean", this.room_id).then(() => {
        alert("Vui lòng chờ người dọn phòng tới");
        sendNotificationFirebase({
          device_type: "1",
          body: "Khách hàng " + this.user.name + " Đã đặt dọn phòng",
          user_id: "1",
          title: "Clean",
        })
          .then((response) => {
            console.log(response);
          })
          .catch((error) => {
            console.log(error);
          });
      });
    },
    getLocation() {
      let self = this;
      navigator.geolocation.getCurrentPosition(
        function (position) {
          // console.log(position.coords.latitude);
          // console.log(position.coords.longitude);
          let lat1 = 21.0603335;
          let log1 = 105.7826151;
          let lat2 = position.coords.latitude;
          let log2 = position.coords.longitude;
          var pi = Math.PI;

          let deglat1 = lat1 * (pi / 180);
          let deglog1 = log1 * (pi / 180);
          let deglat2 = lat2 * (pi / 180);
          let deglog2 = log2 * (pi / 180);

          let difflat = deglat2 - deglat1;
          let difflog = deglog2 - deglog1;

          let val =
            Math.pow(Math.sin(difflat / 2), 2) +
            Math.cos(deglat1) *
              Math.cos(deglat2) *
              Math.pow(Math.sin(difflog / 2), 2);
          let res = 6378.8 * (2 * Math.asin(Math.sqrt(val))); //for kilometers
          sendNotificationFirebase({
            device_type: "5",
            body:
              "Khách hàng " +
              self.user.name +
              " Hiện đang cách khách sạn " +
              res.toFixed(2) +
              " km",
            user_id: "5",
            title: "Location",
          })
            .then((response) => {
              console.log(response);
            })
            .catch((error) => {
              console.log(error);
            });
        },
        function (res) {
          console.log(res);
        }
      );
      this.$toasted.show("Chia sẻ vị trí thành công", {
        duration: 3000,
      });
    },
    ...mapActions("auth", ["logout"]),
    async logoutCustomer() {
      await this.logout();
      this.$router.push({ name: "LoginCustomer" });
    },
  },
};
</script>

<style lang="scss" scoped>
#chat-room::-webkit-scrollbar {
  
}
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
.footer {
  height: 400px;
  width: 100%;
  padding: 70px 0 39px;
  background-color: #333132;
  h5 {
    margin-bottom: 40px;
  }
  &__wrap {
    width: 1200px;
    margin: 0 auto;
    color: #fff;
    p {
      margin-bottom: 10px;
    }
    &__bank {
      img {
        margin: 0 5px 5px 0;
        cursor: pointer;
      }
    }
    &__send-mail {
      max-width: 320px;
      margin: 0 auto;
      height: 40px;
      border: 1px solid #716f70;
      input {
        float: left;
        width: 80%;
        height: 100%;
        border: none;
        outline: none;
        padding: 0 12px;
        background-color: transparent;
        color: #fff;
      }
      .go {
        float: right;
        display: inline-block;
        border-left: 1px solid #716f70;
        width: 60px;
        height: 40px;
        line-height: 40px;
        cursor: pointer;
      }
      .go:hover {
        color: #000000;
        background-color: #fff;
      }
    }
  }
}

.header {
  position: fixed;
  top: 0;
  z-index: 100;
  left: 0;
  right: 0;
  background-color: rgba(30, 30, 30, 0.9999999);
  .button-action {
    color: white;
    font-weight: 600;
    margin-right: 10px;
  }
  &__contact {
    height: 34px;
    margin: 0 auto;
    width: 1200px;
    color: #777;
    font-size: 11px;
    line-height: 1;
    &__icon {
      margin-right: 10px;
      color: #777;
      &--right {
        margin-left: 20px;
        color: #777;
      }
    }
  }
  &__nav {
    &__wrap {
      width: 1200px;
      height: 100%;
      margin: 0 auto;
    }
    background-color: rgba(51, 49, 50, 0.9999999);
    height: 85px;
    margin: 0 auto;
    padding: 5px 0;
    width: 100%;
    &__brand {
      width: 150px;
      height: 26px;
      img {
        margin-top: -5px;
        width: 100px;
        height: 90px;
      }
    }
  }
  .header__nav__top {
    overflow: hidden;
    background-color: #333;
    a {
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 12px;
      height: 100%;
      font-weight: 700;
      letter-spacing: 0.12em;
      text-transform: uppercase;
    }
    a:hover {
      color: rgb(138, 136, 136);
      transition: 0.3s ease-in;
    }
    a.active {
      color: rgb(138, 136, 136);
    }
  }
}
</style>
