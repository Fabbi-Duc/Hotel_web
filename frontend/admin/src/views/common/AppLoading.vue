<template>
  <div class="app-loading">
    <img :src="require('@/assets/image/loading.png')" alt="loading data" />
  </div>
</template>

<script>
export default {
  name: "AppLoading"
};
</script>

<style lang="scss" scoped>
.app-loading {
  width: 25px;
  height: 25px;
  margin: 0 auto;
  animation: loading infinite linear 2s;

  img {
    width: 100%;
  }
}

@keyframes loading {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>s