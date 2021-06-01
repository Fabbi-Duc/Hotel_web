<template>
  <CCol class="mb-4" md="4" sm="6" xl="2" xs="12">
    <div
      :class="['theme-color w-75 rounded mb-3', color]"
      :style="{ paddingTop: '75%' }"
    ></div>
    <slot></slot>
    <ColorView />
  </CCol>
</template>

<script>
import ColorView from "./ColorView";

export default {
  name: "ColorTheme",
  components: { ColorView },
  props: {
    color: String
  }
};
</script>
