<template>
  <div id="main">
    <router-view />
  </div>
</template>

<script>
export default {
  name: "MainLayout",
  data() {
    return {};
  },
  created() {},
  mounted() {
    this.sendNotification();
  },
  methods: {
    sendNotification() {
      this.$store.dispatch("notification/sendNotificationSystem", {
        message: "aaa",
        user: "bbb",
      });
    },
  },
};
</script>
