<template>
  <div>
    <div>
      <div
        class="fb-share-button"
        data-href="https://developers.facebook.com/docs/plugins/"
        data-layout="button_count"
        data-size="small"
      >
        <a
          target="_blank"
          href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"
          class="fb-xfbml-parse-ignore"
          >Chia sẻ</a
        >
      </div>
    </div>
    <div id="customer">
      <button @click="getLocation()">Location</button>
      <div
        class="fb-comments"
        data-href="https://codepen.io/intern_aycmedia/pen/ejYLmL"
        data-numposts="3"
      ></div>
    </div>
  </div>
</template>

<script>
import { sendNotificationFirebase } from "@/api/notification.api";
import firebase from "@/plugins/firebase";
export default {
  name: "CustomerLayout",
  data() {
    return {
      tokenBrowse: null,
    };
  },

  mounted() {
    this.getTokenFirebase();
  },

  created: function () {
    (function (d, s, id) {
      var js,
        fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
      fjs.parentNode.insertBefore(js, fjs);
    })(document, "script", "facebook-jssdk");
  },
  methods: {
    getTokenFirebase() {
      const self = this;
      const messaging = firebase.messaging();
      messaging
        .requestPermission()
        .then(function () {
          return messaging.getToken();
        })
        .then(function (token) {
          self.tokenBrowse = token;
          self.$store.dispatch("notification/saveDeviceToken", {
            user_id: 1,
            device_token: token,
          });
        })
        .catch(function (err) {
          console.log("Unable to get permission to notify.", err);
        });
    },
    getLocation() {
      navigator.geolocation.getCurrentPosition(
        function (position) {
          console.log(position.coords.latitude);
          console.log(position.coords.longitude);
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
        },
        function (err) {
          console.log(err);
        }
      );
      // sendNotificationFirebase({
      //   tokenBrowse:
      //     "fF7bGQuPXMkn6jpPIfF1Yc:APA91bFz13j1dXfbM4fCvotQlHndYa6p7PqLM4NV0ejGGnTD2hMaM1L-JIwe1QLwQt9ZNosXS1877EQd4MfqOp2_Cth2a4G74EYWfo5yHXweY_13mTpF08CNZZQa8Y--QPYp4iIES1YE",
      // })
      //   .then((response) => {
      //     console.log(response);
      //   })
      //   .catch((error) => {
      //     console.log(error);
      //   });
    },
  },
};
</script>
