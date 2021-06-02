import Vue from "vue";

export const toast = (
  message,
  title = null,
  variant = "secondary",
  toaster = "b-toaster-top-tight",
  autoHideDelay = 2000
) => {
  const vm = new Vue({});
  return vm.$bvToast.toast(message, {
    title,
    noCloseButton: false,
    autoHideDelay,
    appendToast: true,
    toaster,
    variant,
    noFade: false,
    solid: true
  });
};