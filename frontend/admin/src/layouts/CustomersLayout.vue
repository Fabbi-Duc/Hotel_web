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
          <b-icon icon="facebook" class="header__contact__icon--right"></b-icon>
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
              src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/12/3Logo-5star-regular.png"
              alt=""
              class="mr-3"
            />
            <div
              class="fb-share-button"
              data-href="https://2cc28894e19d.ngrok.io"
              data-layout="button_count"
              data-size="large"
            >
              <a
                target="_blank"
                href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2F2cc28894e19d.ngrok.io%2F&amp;src=sdkpreparse"
                class="fb-xfbml-parse-ignore"
                >Chia sẻ</a
              >
            </div>
          </b-col>
          <b-col md="6" class="header__nav__top text-right">
            <a class="active" href="#home">Home</a>
            <a href="#news">News</a>
            <a href="/food" v-if="isFood">Contact</a>
            <a href="/food">About</a>
            <button @click="chat()">Chat</button>
            <button @click="clean()" v-if="isFood">Clean</button>
            <button @click="getLocation()" class="ml-3">Share Location</button>
            <button @click="logoutCustomer()" class="ml-3">Logout</button>
            <a href=""><b-icon icon="search"></b-icon></a>
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
          </b-col>
        </b-row>
        <div class="footer__copyright text-center mt-5">
          © 2021 QODE INTERACTIVE, ALL RIGHTS RESERVED
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import store from "@/store";
import { sendNotificationFirebase } from "@/api/notification.api";
import { mapActions } from "vuex";
export default {
  name: "Customer",
  data() {
    return {
      isFood: false,
      room_id: null,
      user: null,
    };
  },

  async created() {
    await store.dispatch("auth/getAccountCustomer").then((res) => {
      this.user = res.data;
    });
    this.getUser();
  },
  methods: {
    ...mapActions("firebase", ["createRoom"]),

    async chat() {
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
          this.$router.push({ name: "Chat", params: { id: result } });
        })
        .catch(() => {
          console.log("error");
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
    async clean() {
      await store.dispatch("customer/clean", this.room_id).then(() => {
        alert("Vui long cho doi nguoi don phong toi");
        sendNotificationFirebase({
          device_type: "1",
          body: "Khach hang " + this.user.name + " da dat don phong",
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
          let lat2 = 21.0403401;
          let log2 = 105.7880043;
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
              "Khach hang " +
              self.user.name +
              " hien dang cach khach san " +
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
    height: 70px;
    margin: 0 auto;
    width: 100%;
    &__brand {
      width: 150px;
      height: 26px;
      img {
        width: auto;
        height: 100%;
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
