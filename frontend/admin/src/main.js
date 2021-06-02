import "core-js/stable";
import "regenerator-runtime/runtime";
import Vue from "vue";
import App from "./App";
import router from "./router";
import CoreUIVue from "@coreui/vue";
import { iconsSet as icons } from "./assets/icons/icons.js";
import store from "./store";
import i18n from "./plugins/i18n";
import plugins from "./plugins";
import echo from "./plugins/echo";
import MainLayout from "./layouts/MainLayout.vue";
import GuestLayout from "./layouts/GuestLayout.vue";
import CustomersLayout from "./layouts/CustomersLayout.vue";
import SocialLayout from "./layouts/SocialLayout";
import CustomerLayout from "./layouts/CustomerLayout";
import { extend } from "vee-validate";
import * as rules from "vee-validate/dist/rules";
import { loadVeeValidate } from "@/plugins/vee-validate";
import "./registerServiceWorker";
import { BootstrapVue,  BootstrapVueIcons} from 'bootstrap-vue';
import components from "./commons/component";
import Toasted from 'vue-toasted';


Vue.use(Toasted)
Vue.use(BootstrapVue);
Vue.use(components);
Vue.use(BootstrapVueIcons)
Vue.component("MainLayout", MainLayout);
Vue.component("GuestLayout", GuestLayout);
Vue.component("SocialLayout", SocialLayout);
Vue.component("CustomersLayout", CustomersLayout);
Vue.component("CustomerLayout", CustomerLayout);

Object.keys(rules).forEach(rule => {
  extend(rule, {
    ...rules[rule], // copies rule configuration,
    message: loadVeeValidate() // assign message
  });
});

Vue.config.performance = true;
Vue.use(CoreUIVue);
Vue.use(plugins);
Vue.prototype.$log = console.log.bind(console);

new Vue({
  el: "#app",
  router,
  store,
  i18n,
  echo,
  icons,
  template: "<App/>",
  components: {
    App
  }
});
