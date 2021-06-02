import { ValidationObserver, ValidationProvider } from "vee-validate";

export default {
  install(Vue) {
    Vue.component("ValidationObserver", ValidationObserver);
    Vue.component("ValidationProvider", ValidationProvider);
    Vue.component("AppLoading", () => import("@/views/common/AppLoading.vue"));
  }
};
