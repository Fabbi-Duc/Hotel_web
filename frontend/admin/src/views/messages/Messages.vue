<template>
  <article class="wrapper">
    <div class="content-wrapper" @click.prevent="showBoxMessage">
      <div class="image">
        <img
          src="https://ssl.gstatic.com/bt/C3341AA7A1A076756462EE2E5CD71C11/avatars/avatar_tile_k_56.png"
        />
      </div>
      <div class="name"><span>Kennedy</span></div>
      <div class="subject">
        <div class="actions">
          <a href="#" class="pinned-msg"><i class="fa fa-thumb-tack"></i></a>
          <ul>
            <li>
              <a href="#"><i class="fa fa-thumb-tack"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa fa-clock-o"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa fa-check"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa fa-ellipsis-v"></i></a>
            </li>
          </ul>
        </div>
        <div class="content">
          <span class="fs">FW: Jobs to Apply for</span><span> - </span
          ><span class="sn"
            >Here are some of the jobs that you can apply for</span
          >
        </div>
      </div>
    </div>
    <div
      class="send-notice"
      style="margin-left: 159px; margin-right: 159px; margin-top: 10px;display: flex;flex-direction: column"
    >
      <label style="margin-bottom: 0px">Token Browse</label>
      <input
        type="text"
        v-model="tokenBrowse"
        placeholder="Please enter token browse"
        id="testing-code"
      />
      <button
        class="btn-token"
        @click="copyTestingCode"
        style="width: 200px; margin-top: 5px"
      >
        Copy
      </button>
      <button
        class="btn-token"
        @click="sendNotificationFirebase"
        style="width: 200px; margin-top: 5px"
      >
        Send notification
      </button>
    </div>
  </article>
</template>
<script>
import { sendNotificationFirebase } from "../../api/notification.api";
import firebase from "@/plugins/firebase";
export default {
  data() {
    return {
      tokenBrowse: null
    };
  },
  created() {
    this.getTokenFirebase();
  },
  methods: {
    getTokenFirebase() {
      const self = this;
      const messaging = firebase.messaging();
      messaging
        .requestPermission()
        .then(function() {
          return messaging.getToken();
        })
        .then(function(token) {
          self.tokenBrowse = token;
          console.log(token);
          self.$store.dispatch("notification/saveDeviceToken", {
            user_id: 1,
            device_token: token
          });
        })
        .catch(function(err) {
          console.log("Unable to get permission to notify.", err);
        });
    },
    showBoxMessage() {
      this.$router.push({ path: `/messages/${1}` });
    },
    sendNotificationFirebase() {
      sendNotificationFirebase({ tokenBrowse: this.tokenBrowse })
        .then(response => {
          console.log(response);
        })
        .catch(error => {
          console.log(error);
        });
    },
    copyTestingCode() {
      let testingCodeToCopy = document.querySelector("#testing-code");
      testingCodeToCopy.setAttribute("type", "text");
      testingCodeToCopy.select();
      document.execCommand("copy");
      try {
        var successful = document.execCommand("copy");
        var msg = successful ? "successful" : "unsuccessful";
        alert("Copy success " + msg);
      } catch (err) {
        alert("Oops, unable to copy");
      }
      window.getSelection().removeAllRanges();
    }
  }
};
</script>
<style lang="css" scoped>
@media only screen and (max-width: 768px) {
  .wrapper {
    width: 100%;
  }
  .content-wrapper {
    margin: 0 !important;
    padding: 10px 0 20px 0;
  }
  .send-notice {
    margin-left: 0 !important;
    margin-right: 0 !important;
  }
  .btn-token {
    width: 100% !important;
  }
}
.wrapper .content-wrapper {
  transition: all 0.2s ease-in-out;
  margin: 0 10%;
  position: relative;
  overflow: hidden;
  background: #fff;
  cursor: pointer;
  box-shadow: 0 -1px 0 #e5e5e5, 0 0 2px rgba(0, 0, 0, 0.12),
    0 2px 4px rgba(0, 0, 0, 0.24);
}
.wrapper .content-wrapper:hover > .subject > .actions ul {
  display: block;
}
.wrapper .content-wrapper:hover > .subject > .actions ul a {
  padding: 1px;
}
.wrapper .content-wrapper:focus {
  border-left: 2px solid #4285f4;
}
.wrapper .content-wrapper .name {
  float: left;
  width: 184px;
  overflow: hidden;
  text-overflow: elipsis;
  word-wrap: noword;
}
.wrapper .content-wrapper .name span {
  display: inline-block;
  padding-top: 16px;
}
.wrapper .content-wrapper .subject {
  position: relative;
  display: block;
  margin: 0 20px 0 8px;
  min-width: 150px;
  text-overflow: elipsis;
  overflow: hidden;
}
.wrapper .content-wrapper .subject .actions {
  float: right;
  width: 50px;
  font-size: 16px;
}
.wrapper .content-wrapper .subject .actions ul {
  overflow: hidden;
  list-style: none;
  position: absolute;
  top: 16px;
  right: 5px;
  display: none;
  background: white;
}
.wrapper .content-wrapper .subject .actions ul li {
  display: inline-block;
  margin: 0 5px;
}
.wrapper .content-wrapper .subject .actions ul li a {
  text-decoration: none;
  padding: 5px;
  color: black;
  opacity: 0.5;
}
.wrapper .content-wrapper .subject .actions ul li a:hover {
  opacity: 0.8;
}
.wrapper .content-wrapper .subject .actions ul li a.pinned {
  opacity: 1;
  color: #4285f4;
}
.wrapper .content-wrapper .subject .content {
  float: left;
  overflow: hidden;
}
.wrapper .content-wrapper .subject .content span {
  display: inline-block;
  padding-top: 16px;
}
.wrapper .content-wrapper .subject .content .fs {
  padding-right: 5px;
}
.wrapper .content-wrapper .subject .content .sn {
  display: inline-block;
  color: #757575;
  padding-right: 5px;
}
.wrapper .content-wrapper .pinned-msg {
  position: absolute;
  display: none;
  top: 16px;
  right: 5px;
  color: #4285f4;
}

.wrapper .shadow {
  box-shadow: 0 -1px 1px #e5e5e5, 0 2px 1px rgba(0, 0, 0, 0.12);
}

.image {
  float: left;
  padding: 12px 24px;
}
.image > img {
  width: 24px;
  border-radius: 50%;
}
</style>
