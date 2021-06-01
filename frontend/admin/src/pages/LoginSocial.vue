<template>
  <div>
    Loading ....
  </div>
</template>

<script>
import axios from "axios";
import Cookies from "js-cookie";

export default {
  name: "LoginSocial",
  methods: {
    callBackSocial() {
      axios
        .get(
          "http://localhost/api/auth/google/callback?code=" +
            this.$route.query.code
        )
        .then(response => {
          Cookies.set("access_token", response.data.data.access_token, {
            expires: response.data.data.expires_in / 86400
          });
          this.$router.push({ name: "Home" });
        });
    }
  },
  created() {
    this.callBackSocial();
  }
};
</script>
