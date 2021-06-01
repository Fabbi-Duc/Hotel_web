<template>
  <CRow>
    <template v-if="!noCharts">
      <CCol md="3" sm="6">
        <CWidgetBrand
          color="facebook"
          left-footer="feeds"
          left-header="459"
          right-footer="friends"
          right-header="89k"
        >
          <CIcon class="my-4" height="52" name="cib-facebook" />
          <CChartLineSimple
            :data-points="[65, 59, 84, 84, 51, 55, 40]"
            background-color="rgba(255,255,255,.1)"
            class="c-chart-brand"
            label="Friends"
            labels="months"
          />
        </CWidgetBrand>
      </CCol>
      <CCol md="3" sm="6">
        <CWidgetBrand
          color="twitter"
          left-footer="tweets"
          left-header="1.792"
          right-footer="followers"
          right-header="973k"
        >
          <CIcon class="my-4" height="52" name="cib-twitter" />
          <CChartLineSimple
            :data-points="[1, 13, 9, 17, 34, 41, 38]"
            background-color="rgba(255,255,255,.1)"
            class="c-chart-brand"
            label="Followers"
            labels="months"
          />
        </CWidgetBrand>
      </CCol>
      <CCol md="3" sm="6">
        <CWidgetBrand
          color="linkedin"
          left-footer="feeds"
          left-header="292"
          right-footer="contracts"
          right-header="500+"
        >
          <CIcon class="my-4" height="52" name="cib-linkedin" />
          <CChartLineSimple
            :data-points="[78, 81, 80, 45, 34, 12, 40]"
            background-color="rgba(255,255,255,.1)"
            class="c-chart-brand"
            label="Contracts"
            labels="months"
          />
        </CWidgetBrand>
      </CCol>
      <CCol md="3" sm="6">
        <CWidgetBrand
          color="warning"
          left-footer="meetings"
          left-header="4"
          right-footer="events"
          right-header="12"
        >
          <CIcon class="my-4" height="52" name="cil-calendar" />
          <CChartLineSimple
            :data-points="[35, 23, 56, 22, 97, 23, 64]"
            background-color="rgba(255,255,255,.1)"
            class="c-chart-brand"
            label="Followers"
            labels="months"
          />
        </CWidgetBrand>
      </CCol>
    </template>
    <template v-else>
      <CCol md="3" sm="6">
        <CWidgetBrand
          color="facebook"
          left-footer="feeds"
          left-header="459"
          right-footer="friends"
          right-header="89k"
        >
          <CIcon class="my-4" height="56" name="cib-facebook" />
        </CWidgetBrand>
      </CCol>
      <CCol md="3" sm="6">
        <CWidgetBrand
          color="twitter"
          left-footer="tweets"
          left-header="1.792"
          right-footer="followers"
          right-header="973k"
        >
          <CIcon class="my-4" height="56" name="cib-twitter" />
        </CWidgetBrand>
      </CCol>
      <CCol md="3" sm="6">
        <CWidgetBrand
          color="linkedin"
          left-footer="feeds"
          left-header="292"
          right-footer="contracts"
          right-header="500+"
        >
          <CIcon class="my-4" height="56" name="cib-linkedin" />
        </CWidgetBrand>
      </CCol>
      <CCol md="3" sm="6">
        <CWidgetBrand
          color="warning"
          left-footer="meetings"
          left-header="4"
          right-footer="events"
          right-header="12"
        >
          <CIcon class="my-4" height="56" name="cil-calendar" />
        </CWidgetBrand>
      </CCol>
    </template>
  </CRow>
</template>

<script>
import { CChartLineSimple } from "../charts/index.js";

export default {
  name: "WidgetsBrand",
  components: {
    CChartLineSimple
  },
  props: {
    noCharts: Boolean
  }
};
</script>

<style scoped>
.c-chart-brand {
  position: absolute;
  width: 100%;
  height: 100px;
}
</style>
