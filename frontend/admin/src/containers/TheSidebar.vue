<template>
  <CSidebar
    fixed
    :minimize="minimize"
    :show="show"
    @update:show="(value) => $store.commit('set', ['sidebarShow', value])"
  >
    <CSidebarBrand class="d-md-down-none py-2" to="/">
      <!-- <CIcon
        class="c-sidebar-brand-full"
        name="logo"
        size="custom-size"
        :height="35"
        viewBox="0 0 556 134"
      />
      <CIcon
        class="c-sidebar-brand-minimized"
        name="logo"
        size="custom-size"
        :height="35"
        viewBox="0 0 110 134"
      /> -->
    <img src="../assets/image/logo.svg" style="height: 85px;" alt="">
    </CSidebarBrand>

    <CRenderFunction
      v-if="user && user.position == 0"
      flat
      :content-to-render="$options.nav"
    />
    <CRenderFunction
      v-if="user && user.position == 5"
      flat
      :content-to-render="$options.nav_receptionists"
    />
    <CRenderFunction
      v-if="user && user.position == 3"
      flat
      :content-to-render="$options.nav_chef"
    />
    <CRenderFunction
      v-if="user && user.position == 4"
      flat
      :content-to-render="$options.nav_guard"
    />
    <CRenderFunction
      v-if="user && user.position == 2"
      flat
      :content-to-render="$options.nav_chat"
    />
    <CRenderFunction
      v-if="user && user.position == 1"
      flat
      :content-to-render="$options.nav_clean"
    />
    <CSidebarMinimizer
      class="d-md-down-none"
      @click.native="$store.commit('set', ['sidebarMinimize', !minimize])"
    />
  </CSidebar>
</template>

<script>
import nav from "./_nav";
import nav_receptionists from "./_nav-receptionists";
import nav_chef from "./_nav-chef";
import nav_guard from "./_nav-guard";
import nav_clean from "./_nav-clean";
import nav_chat from "./_nav-chat";
import firebase from "@/plugins/firebase";

export default {
  name: "TheSidebar",
  nav,
  nav_receptionists,
  nav_chef,
  nav_guard,
  nav_clean,
  nav_chat,
  async created() {
    await this.getUser();
    await this.getTokenFirebase();
  },
  computed: {
    show() {
      return this.$store.state.sidebarShow;
    },
    minimize() {
      return this.$store.state.sidebarMinimize;
    },
  },
  data() {
    return {
      user: null,
    };
  },
  methods: {
    async getTokenFirebase() {
      const self = this;
      const messaging = firebase.firebaseApp.messaging();
      await messaging
        .requestPermission()
        .then(function () {
          return messaging.getToken();
        })
        .then(function (token) {
          self.tokenBrowse = token;
          console.log(token);
          self.$store.dispatch("notification/saveDeviceToken", {
            user_id: self.user.id,
            device_token: token,
            position: self.user.position,
          });
        })
        .catch(function (err) {
          console.log("Unable to get permission to notify.", err);
        });
    },
    async getUser() {
      await this.$store.dispatch("auth/getAccount").then((res) => {
        this.user = res.data;
      });
    },
  },
};
</script>
