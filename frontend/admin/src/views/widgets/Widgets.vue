<template>
  <div>
    <CRow>
      <CCol lg="3" sm="6">
        <CWidgetProgress footer="Lorem ipsum dolor sit amet enim.">
          <div class="h4 m-0">89.9%</div>
          <div class="card-header-actions">
            <a
              class="card-header-action position-absolute"
              href="https://coreui.io/vue/docs/components/widgets"
              rel="noreferrer noopener"
              style="right:5px; top:5px"
              target="_blank"
            >
              <small class="text-muted">docs</small>
            </a>
          </div>
          <div>Lorem ipsum...</div>
          <CProgress
            :value="25"
            class="progress-xs my-3 mb-0"
            color="gradient-success"
          />
        </CWidgetProgress>
      </CCol>
      <CCol lg="3" sm="6">
        <CWidgetProgress
          :value="25"
          color="gradient-info"
          footer="Lorem ipsum dolor sit amet enim."
          header="12.124"
          text="Lorem ipsum..."
        />
      </CCol>
      <CCol lg="3" sm="6">
        <CWidgetProgress
          :value="25"
          color="gradient-warning"
          footer="Lorem ipsum dolor sit amet enim."
          header="$98.111,00"
          text="Lorem ipsum..."
        />
      </CCol>
      <CCol lg="3" sm="6">
        <CWidgetProgress
          :value="25"
          color="gradient-danger"
          footer="Lorem ipsum dolor sit amet enim."
          header="2 TB"
          text="Lorem ipsum..."
        />
      </CCol>
    </CRow>
    <CRow>
      <CCol lg="3" sm="6">
        <CWidgetProgress
          :value="25"
          color="gradient-success"
          footer="Lorem ipsum dolor sit amet enim."
          header="89.9%"
          inverse
          text="Lorem ipsum..."
        />
      </CCol>
      <CCol lg="3" sm="6">
        <CWidgetProgress
          :value="25"
          color="gradient-info"
          footer="Lorem ipsum dolor sit amet enim."
          header="12.124"
          inverse
          text="Lorem ipsum..."
        />
      </CCol>
      <CCol lg="3" sm="6">
        <CWidgetProgress
          :value="25"
          color="gradient-warning"
          footer="Lorem ipsum dolor sit amet enim."
          header="$98.111,00"
          inverse
          text="Lorem ipsum..."
        />
      </CCol>
      <CCol lg="3" sm="6">
        <CWidgetProgress
          :value="25"
          color="gradient-danger"
          footer="Lorem ipsum dolor sit amet enim."
          header="2 TB"
          inverse
          text="Lorem ipsum..."
        />
      </CCol>
    </CRow>
    <CRow>
      <CCol col="12" lg="3" sm="6">
        <CWidgetIcon color="gradient-primary" header="$1.999,50" text="Income">
          <CIcon name="cil-settings" width="24" />
        </CWidgetIcon>
      </CCol>
      <CCol col="12" lg="3" sm="6">
        <CWidgetIcon color="gradient-info" header="$1.999,50" text="Income">
          <CIcon name="cil-laptop" width="24" />
        </CWidgetIcon>
      </CCol>
      <CCol col="12" lg="3" sm="6">
        <CWidgetIcon color="gradient-warning" header="$1.999,50" text="Income">
          <CIcon name="cil-moon" width="24" />
        </CWidgetIcon>
      </CCol>
      <CCol col="12" lg="3" sm="6">
        <CWidgetIcon color="gradient-danger" header="$1.999,50" text="Income">
          <CIcon name="cil-bell" width="24" />
        </CWidgetIcon>
      </CCol>
    </CRow>
    <CRow>
      <CCol col="12" lg="3" sm="6">
        <CWidgetIcon
          :icon-padding="false"
          color="gradient-primary"
          header="$1.999,50"
          text="Income"
        >
          <CIcon name="cil-settings" width="24" />
        </CWidgetIcon>
      </CCol>
      <CCol col="12" lg="3" sm="6">
        <CWidgetIcon
          :icon-padding="false"
          color="gradient-info"
          header="$1.999,50"
          text="Income"
        >
          <CIcon name="cil-laptop" width="24" />
        </CWidgetIcon>
      </CCol>
      <CCol col="12" lg="3" sm="6">
        <CWidgetIcon
          :icon-padding="false"
          color="gradient-warning"
          header="$1.999,50"
          text="Income"
        >
          <CIcon name="cil-moon" width="24" />
        </CWidgetIcon>
      </CCol>
      <CCol col="12" lg="3" sm="6">
        <CWidgetIcon
          :icon-padding="false"
          color="gradient-danger"
          header="$1.999,50"
          text="Income"
        >
          <CIcon name="cil-bell" width="24" />
        </CWidgetIcon>
      </CCol>
    </CRow>
    <CRow>
      <CCol col="12" lg="4" sm="6">
        <CWidgetIcon
          :icon-padding="false"
          color="gradient-primary"
          header="$1.999,50"
          text="Income"
        >
          <CIcon class="mx-5 " name="cil-settings" width="24" />
        </CWidgetIcon>
      </CCol>
      <CCol col="12" lg="4" sm="6">
        <CWidgetIcon
          :icon-padding="false"
          color="gradient-info"
          header="$1.999,50"
          text="Income"
        >
          <CIcon class="mx-5 " name="cil-laptop" width="24" />
        </CWidgetIcon>
      </CCol>
      <CCol col="12" lg="4" sm="6">
        <CWidgetIcon
          :icon-padding="false"
          color="gradient-warning"
          header="$1.999,50"
          text="Income"
        >
          <CIcon class="mx-5 " name="cil-moon" width="24" />
          <template #footer>
            <CCardFooter class="px-3 py-2">
              <CLink
                class="font-weight-bold font-xs text-muted d-flex justify-content-between"
                href="https://coreui.io/"
                target="_blank"
              >
                View more
                <CIcon name="cil-arrow-right" width="16" />
              </CLink>
            </CCardFooter>
          </template>
        </CWidgetIcon>
      </CCol>
    </CRow>
    <!-- <CRow>
      <CCol col="12" sm="6" lg="4">
        <CWidgetIcon
          header="$1.999,50"
          text="Income"
          color="gradient-primary"
          :icon-padding="false"
          link="#"
        >
          <CIcon name="cil-settings" class="mx-5 " width="24"/>
        </CWidgetIcon>
      </CCol>
      <CCol col="12" sm="6" lg="4">
        <CWidgetIcon
          header="$1.999,50"
          text="Income"
          color="gradient-info"
          :icon-padding="false"
          link="#"
        >
          <CIcon name="cil-laptop" class="mx-5 " width="24"/>
        </CWidgetIcon>
      </CCol>
      <CCol col="12" sm="6" lg="4">
        <CWidgetIcon
          header="$1.999,50"
          text="Income"
          color="gradient-warning"
          :icon-padding="false"
          link="#"
        >
          <CIcon name="cil-moon" class="mx-5" width="24"/>
        </CWidgetIcon>
      </CCol>
    </CRow> -->
    <WidgetsBrand noCharts />
    <WidgetsBrand />
    <CCardGroup class="mb-4">
      <CWidgetProgressIcon
        color="gradient-info"
        header="87.500"
        text="Visitors"
      >
        <CIcon height="36" name="cil-people" />
      </CWidgetProgressIcon>
      <CWidgetProgressIcon
        color="gradient-success"
        header="385"
        text="New Clients"
      >
        <CIcon height="36" name="cil-userFollow" />
      </CWidgetProgressIcon>
      <CWidgetProgressIcon
        color="gradient-warning"
        header="1238"
        text="Products sold"
      >
        <CIcon height="36" name="cil-basket" />
      </CWidgetProgressIcon>
      <CWidgetProgressIcon header="28%" text="Returning Visitors">
        <CIcon height="36" name="cil-chartPie" />
      </CWidgetProgressIcon>
      <CWidgetProgressIcon
        color="gradient-danger"
        header="5:34:11"
        text="Avg. Time"
      >
        <CIcon height="36" name="cil-speedometer" />
      </CWidgetProgressIcon>
    </CCardGroup>
    <CCardGroup class="mb-4">
      <CWidgetProgressIcon
        color="gradient-info"
        header="87.500"
        inverse
        text="Visitors"
      >
        <CIcon height="36" name="cil-people" />
      </CWidgetProgressIcon>
      <CWidgetProgressIcon
        color="gradient-success"
        header="385"
        inverse
        text="New Clients"
      >
        <CIcon height="36" name="cil-userFollow" />
      </CWidgetProgressIcon>
      <CWidgetProgressIcon
        color="gradient-warning"
        header="1238"
        inverse
        text="Products sold"
      >
        <CIcon height="36" name="cil-basket" />
      </CWidgetProgressIcon>
      <CWidgetProgressIcon
        color="gradient-primary"
        header="28%"
        inverse
        text="Returning Visitors"
      >
        <CIcon height="36" name="cil-chartPie" />
      </CWidgetProgressIcon>
      <CWidgetProgressIcon
        color="gradient-danger"
        header="5:34:11"
        inverse
        text="Avg. Time"
      >
        <CIcon height="36" name="cil-speedometer" />
      </CWidgetProgressIcon>
    </CCardGroup>
    <CRow>
      <CCol md="2" sm="6">
        <CWidgetProgressIcon
          color="gradient-info"
          header="87.500"
          text="Visitors"
        >
          <CIcon height="36" name="cil-people" />
        </CWidgetProgressIcon>
      </CCol>
      <CCol md="2" sm="6">
        <CWidgetProgressIcon
          color="gradient-success"
          header="385"
          text="New Clients"
        >
          <CIcon height="36" name="cil-userFollow" />
        </CWidgetProgressIcon>
      </CCol>
      <CCol md="2" sm="6">
        <CWidgetProgressIcon
          color="gradient-warning"
          header="1238"
          text="Products sold"
        >
          <CIcon height="36" name="cil-basket" />
        </CWidgetProgressIcon>
      </CCol>
      <CCol md="2" sm="6">
        <CWidgetProgressIcon
          color="gradient-primary"
          header="28%"
          text="Returning Visitors"
        >
          <CIcon height="36" name="cil-chartPie" />
        </CWidgetProgressIcon>
      </CCol>
      <CCol md="2" sm="6">
        <CWidgetProgressIcon
          color="gradient-danger"
          header="5:34:11"
          text="Avg. Time"
        >
          <CIcon height="36" name="cil-speedometer" />
        </CWidgetProgressIcon>
      </CCol>
      <CCol md="2" sm="6">
        <CWidgetProgressIcon color="gradient-info" header="972" text="comments">
          <CIcon height="36" name="cil-speech" />
        </CWidgetProgressIcon>
      </CCol>
    </CRow>
    <CRow>
      <CCol md="2" sm="6">
        <CWidgetProgressIcon
          color="gradient-info"
          header="87.500"
          inverse
          text="Visitors"
        >
          <CIcon height="36" name="cil-people" />
        </CWidgetProgressIcon>
      </CCol>
      <CCol md="2" sm="6">
        <CWidgetProgressIcon
          color="gradient-success"
          header="385"
          inverse
          text="New Clients"
        >
          <CIcon height="36" name="cil-userFollow" />
        </CWidgetProgressIcon>
      </CCol>
      <CCol md="2" sm="6">
        <CWidgetProgressIcon
          color="gradient-warning"
          header="1238"
          inverse
          text="Products sold"
        >
          <CIcon height="36" name="cil-basket" />
        </CWidgetProgressIcon>
      </CCol>
      <CCol md="2" sm="6">
        <CWidgetProgressIcon
          color="gradient-primary"
          header="28%"
          inverse
          text="Returning Visitors"
        >
          <CIcon height="36" name="cil-chartPie" />
        </CWidgetProgressIcon>
      </CCol>
      <CCol md="2" sm="6">
        <CWidgetProgressIcon
          color="gradient-danger"
          header="5:34:11"
          inverse
          text="Avg. Time"
        >
          <CIcon height="36" name="cil-speedometer" />
        </CWidgetProgressIcon>
      </CCol>
      <CCol md="2" sm="6">
        <CWidgetProgressIcon
          color="gradient-info"
          header="972"
          inverse
          text="comments"
        >
          <CIcon height="36" name="cil-speech" />
        </CWidgetProgressIcon>
      </CCol>
    </CRow>
    <WidgetsDropdown />
    <CRow>
      <CCol lg="2" sm="4">
        <CWidgetSimple header="title" text="1,123">
          <CChartLineSimple border-color="danger" style="height:40px" />
        </CWidgetSimple>
      </CCol>
      <CCol lg="2" sm="4">
        <CWidgetSimple header="title" text="1,123">
          <CChartLineSimple border-color="primary" style="height:40px" />
        </CWidgetSimple>
      </CCol>
      <CCol lg="2" sm="4">
        <CWidgetSimple header="title" text="1,123">
          <CChartLineSimple border-color="success" style="height:40px" />
        </CWidgetSimple>
      </CCol>
      <CCol lg="2" sm="4">
        <CWidgetSimple header="title" text="1,123">
          <CChartBarSimple background-color="danger" style="height:40px" />
        </CWidgetSimple>
      </CCol>
      <CCol lg="2" sm="4">
        <CWidgetSimple header="title" text="1,123">
          <CChartBarSimple background-color="primary" style="height:40px" />
        </CWidgetSimple>
      </CCol>
      <CCol lg="2" sm="4">
        <CWidgetSimple header="title" text="1,123">
          <CChartBarSimple background-color="success" style="height:40px" />
        </CWidgetSimple>
      </CCol>
    </CRow>
  </div>
</template>

<script>
import WidgetsBrand from "./WidgetsBrand";
import WidgetsDropdown from "./WidgetsDropdown";
import { CChartBarSimple, CChartLineSimple } from "../charts/index.js";

export default {
  name: "Widgets",
  components: {
    CChartLineSimple,
    CChartBarSimple,
    WidgetsBrand,
    WidgetsDropdown
  }
};
</script>
