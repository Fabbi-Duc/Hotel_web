<template>
  <CHeader fixed with-subheader light>
    <CToggler
      in-header
      class="ml-3 d-lg-none"
      @click="$store.commit('toggleSidebarMobile')"
    />
    <CToggler
      in-header
      class="ml-3 d-md-down-none"
      @click="$store.commit('toggleSidebarDesktop')"
    />
    <CHeaderBrand class="mx-auto d-lg-none" to="/">
      <CIcon name="logo" height="48" alt="Logo" />
    </CHeaderBrand>
    <CHeaderNav class="d-md-down-none mr-auto">
      <CHeaderNavItem class="px-3">
        <CHeaderNavLink to="/dashboard"> Trang chủ </CHeaderNavLink>
      </CHeaderNavItem>
      <CHeaderNavItem class="px-3">
        <CHeaderNavLink to="/users" exact> Nhân viên </CHeaderNavLink>
      </CHeaderNavItem>
      <!-- <CHeaderNavItem class="px-3">
        <CHeaderNavLink> Settings </CHeaderNavLink>
      </CHeaderNavItem> -->
    </CHeaderNav>
    <CHeaderNav class="mr-4">
      <CHeaderNavItem class="d-md-down-none mx-2">
        <div class="language">
          <BoxLanguage />
        </div>
      </CHeaderNavItem>
      <CHeaderNavItem class="d-md-down-none mx-2">
        <div class="notification-icon position-relative" @click.prevent="showBoxNotification">
          <CIcon name="cil-bell" />
          <div
            class="position-absolute d-flex justify-content-center align-items-center notification-number"
            v-if="numberNotice > 0"
          >
            {{ numberNotice }}
          </div>
        </div>
        <transition name="fade">
          <BoxNotification
            :notifications="notifications"
            @closeBoxNotification="showBoxNotification"
            v-if="boxNotificationStatus === true"
          />
        </transition>
      </CHeaderNavItem>
      <CHeaderNavItem class="d-md-down-none mx-2">
        <CHeaderNavLink>
          <CIcon name="cil-list" />
        </CHeaderNavLink>
      </CHeaderNavItem>
      <CHeaderNavItem class="d-md-down-none mx-2">
        <CHeaderNavLink>
          <CIcon name="cil-envelope-open" />
        </CHeaderNavLink>
      </CHeaderNavItem>
      <TheHeaderDropdownAccnt @handleLogout="handleLogout" />
    </CHeaderNav>
    <CSubheader class="px-3">
      <CBreadcrumbRouter class="border-0 mb-0" />
    </CSubheader>
  </CHeader>
</template>

<script>
import TheHeaderDropdownAccnt from "./TheHeaderDropdownAccnt";
import { mapActions } from "vuex";
import BoxNotification from "@/components/BoxNotification";
import BoxLanguage from "../components/BoxLanguage";
import firebase from "@/plugins/firebase";

export default {
  name: "TheHeader",
  components: {
    BoxLanguage,
    BoxNotification,
    TheHeaderDropdownAccnt,
  },
  data() {
    return {
      boxNotificationStatus: false,
      notifications: [],
      numberNotice: null,
      deviceToken: null,
      user: null
    };
  },  
  methods: {
    ...mapActions("auth", ["logout"]),
    async showBoxNotification() {
      this.boxNotificationStatus = !this.boxNotificationStatus;
      if(!this.boxNotificationStatus) {
        await this.$store.dispatch('notification/updateNotification', this.user.position);
      }
      await this.getNotification();
    },
    async handleLogout() {
      await this.logout();
      this.$router.push({ name: "SignIn" });
    },
    receiveMessage() {
      try {
        navigator.serviceWorker.addEventListener("message", (event) => {
          if(this.user.position == event.data.firebaseMessaging.payload.data.id) {
            this.numberNotice = event.data.firebaseMessaging.payload.data.count;
          }
        });
      } catch (e) {
        console.log(e);
      }
    },
    async getNotification() {
      await this.$store.dispatch('notification/getNotification', this.user.position).then(res => {
        this.numberNotice = res.number;
        this.notifications = res.data;
      })
    },
    async getUser() {
      await this.$store.dispatch('auth/getAccount').then(res => {
        this.user = res.data;
      })
    }
  },
  async created() {
    await this.getUser();
    await this.getNotification();
    await this.receiveMessage();
  },
};
</script>

<style lang="scss" scoped>
.notification-icon {
  position: relative;
  cursor: pointer;
}
.notification-number {
  position: absolute;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  background-color: red;
  top: -5px;
  right: -4px;
  color: white;
}
</style>
