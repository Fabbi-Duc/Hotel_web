<template>
  <div>
    <WidgetsDropdown />
    <CCard>
      <CCardBody>
        <CRow>
          <CCol sm="5">
            <h4 id="traffic" class="card-title mb-0">Traffic</h4>
            <div class="small text-muted">November 2017</div>
          </CCol>
          <CCol class="d-none d-md-block" sm="7">
            <CButton class="float-right" color="primary">
              <CIcon name="cil-cloud-download" />
            </CButton>
            <CButtonGroup class="float-right mr-3">
              <CButton
                v-for="(value, key) in ['Day', 'Month', 'Year']"
                :key="key"
                :pressed="value === selected ? true : false"
                class="mx-0"
                color="outline-secondary"
                @click="selected = value"
              >
                {{ value }}
              </CButton>
            </CButtonGroup>
          </CCol>
        </CRow>
        <MainChartExample style="height:300px;margin-top:40px;" />
      </CCardBody>
      <CCardFooter>
        <CRow class="text-center">
          <CCol class="mb-sm-2 mb-0" md sm="12">
            <div class="text-muted">Visits</div>
            <strong>29.703 Users (40%)</strong>
            <CProgress
              :precision="1"
              :value="40"
              class="progress-xs mt-2"
              color="success"
            />
          </CCol>
          <CCol class="mb-sm-2 mb-0 d-md-down-none" md sm="12">
            <div class="text-muted">Unique</div>
            <strong>24.093 Users (20%)</strong>
            <CProgress
              :precision="1"
              :value="20"
              class="progress-xs mt-2"
              color="info"
            />
          </CCol>
          <CCol class="mb-sm-2 mb-0" md sm="12">
            <div class="text-muted">Pageviews</div>
            <strong>78.706 Views (60%)</strong>
            <CProgress
              :precision="1"
              :value="60"
              class="progress-xs mt-2"
              color="warning"
            />
          </CCol>
          <CCol class="mb-sm-2 mb-0" md sm="12">
            <div class="text-muted">New Users</div>
            <strong>22.123 Users (80%)</strong>
            <CProgress
              :precision="1"
              :value="80"
              class="progress-xs mt-2"
              color="danger"
            />
          </CCol>
          <CCol class="mb-sm-2 mb-0 d-md-down-none" md sm="12">
            <div class="text-muted">Bounce Rate</div>
            <strong>Average Rate (40.15%)</strong>
            <CProgress :precision="1" :value="40" class="progress-xs mt-2" />
          </CCol>
        </CRow>
      </CCardFooter>
    </CCard>
    <WidgetsBrand />
    <CRow>
      <CCol md="12">
        <CCard>
          <CCardHeader>
            Traffic &amp; Sales
          </CCardHeader>
          <CCardBody>
            <CRow>
              <CCol lg="6" sm="12">
                <CRow>
                  <CCol sm="6">
                    <CCallout color="info">
                      <small class="text-muted">New Clients</small><br />
                      <strong class="h4">9,123</strong>
                    </CCallout>
                  </CCol>
                  <CCol sm="6">
                    <CCallout color="danger">
                      <small class="text-muted">Recurring Clients</small><br />
                      <strong class="h4">22,643</strong>
                    </CCallout>
                  </CCol>
                </CRow>
                <hr class="mt-0" />
                <div class="progress-group mb-4">
                  <div class="progress-group-prepend">
                    <span class="progress-group-text">
                      Monday
                    </span>
                  </div>
                  <div class="progress-group-bars">
                    <CProgress :value="34" class="progress-xs" color="info" />
                    <CProgress :value="78" class="progress-xs" color="danger" />
                  </div>
                </div>
                <div class="progress-group mb-4">
                  <div class="progress-group-prepend">
                    <span class="progress-group-text">
                      Tuesday
                    </span>
                  </div>
                  <div class="progress-group-bars">
                    <CProgress :value="56" class="progress-xs" color="info" />
                    <CProgress :value="94" class="progress-xs" color="danger" />
                  </div>
                </div>
                <div class="progress-group mb-4">
                  <div class="progress-group-prepend">
                    <span class="progress-group-text">
                      Wednesday
                    </span>
                  </div>
                  <div class="progress-group-bars">
                    <CProgress :value="12" class="progress-xs" color="info" />
                    <CProgress :value="67" class="progress-xs" color="danger" />
                  </div>
                </div>
                <div class="progress-group mb-4">
                  <div class="progress-group-prepend">
                    <span class="progress-group-text">
                      Thursday
                    </span>
                  </div>
                  <div class="progress-group-bars">
                    <CProgress :value="43" class="progress-xs" color="info" />
                    <CProgress :value="91" class="progress-xs" color="danger" />
                  </div>
                </div>
                <div class="progress-group mb-4">
                  <div class="progress-group-prepend">
                    <span class="progress-group-text">
                      Friday
                    </span>
                  </div>
                  <div class="progress-group-bars">
                    <CProgress :value="22" class="progress-xs" color="info" />
                    <CProgress :value="73" class="progress-xs" color="danger" />
                  </div>
                </div>
                <div class="progress-group mb-4">
                  <div class="progress-group-prepend">
                    <span class="progress-group-text">
                      Saturday
                    </span>
                  </div>
                  <div class="progress-group-bars">
                    <CProgress :value="53" class="progress-xs" color="info" />
                    <CProgress :value="82" class="progress-xs" color="danger" />
                  </div>
                </div>
                <div class="progress-group mb-4">
                  <div class="progress-group-prepend">
                    <span class="progress-group-text">
                      Sunday
                    </span>
                  </div>
                  <div class="progress-group-bars">
                    <CProgress :value="9" class="progress-xs" color="info" />
                    <CProgress :value="69" class="progress-xs" color="danger" />
                  </div>
                </div>
                <div class="legend text-center">
                  <small>
                    <sup>
                      <CBadge color="info" shape="pill">&nbsp;</CBadge>
                    </sup>
                    New clients &nbsp;&nbsp;
                    <sup>
                      <CBadge color="danger" shape="pill">&nbsp;</CBadge>
                    </sup>
                    Recurring clients
                  </small>
                </div>
              </CCol>
              <CCol lg="6" sm="12">
                <CRow>
                  <CCol sm="6">
                    <CCallout color="warning">
                      <small class="text-muted">Pageviews</small><br />
                      <strong class="h4">78,623</strong>
                    </CCallout>
                  </CCol>
                  <CCol sm="6">
                    <CCallout color="success">
                      <small class="text-muted">Organic</small><br />
                      <strong class="h4">49,123</strong>
                    </CCallout>
                  </CCol>
                </CRow>
                <hr class="mt-0" />
                <ul class="horizontal-bars type-2">
                  <div class="progress-group">
                    <div class="progress-group-header">
                      <CIcon class="progress-group-icon" name="cil-user" />
                      <span class="title">Male</span>
                      <span class="ml-auto font-weight-bold">43%</span>
                    </div>
                    <div class="progress-group-bars">
                      <CProgress
                        :value="43"
                        class="progress-xs"
                        color="warning"
                      />
                    </div>
                  </div>
                  <div class="progress-group mb-5">
                    <div class="progress-group-header">
                      <CIcon
                        class="progress-group-icon"
                        name="cil-user-female"
                      />
                      <span class="title">Female</span>
                      <span class="ml-auto font-weight-bold">37%</span>
                    </div>
                    <div class="progress-group-bars">
                      <CProgress
                        :value="37"
                        class="progress-xs"
                        color="warning"
                      />
                    </div>
                  </div>
                  <div class="progress-group">
                    <div class="progress-group-header">
                      <CIcon class="progress-group-icon" name="cil-globe-alt" />
                      <span class="title">Organic Search</span>
                      <span class="ml-auto font-weight-bold">
                        191,235 <span class="text-muted small">(56%)</span>
                      </span>
                    </div>
                    <div class="progress-group-bars">
                      <CProgress
                        :value="56"
                        class="progress-xs"
                        color="success"
                      />
                    </div>
                  </div>
                  <div class="progress-group">
                    <div class="progress-group-header">
                      <CIcon
                        class="progress-group-icon"
                        height="17"
                        name="cib-facebook"
                      />
                      <span class="title">Facebook</span>
                      <span class="ml-auto font-weight-bold">
                        51,223 <span class="text-muted small">(15%)</span>
                      </span>
                    </div>
                    <div class="progress-group-bars">
                      <CProgress
                        :value="15"
                        class="progress-xs"
                        color="success"
                      />
                    </div>
                  </div>
                  <div class="progress-group">
                    <div class="progress-group-header">
                      <CIcon
                        class="progress-group-icon"
                        height="17"
                        name="cib-twitter"
                      />
                      <span class="title">Twitter</span>
                      <span class="ml-auto font-weight-bold">
                        37,564 <span class="text-muted small">(11%)</span>
                      </span>
                    </div>
                    <div class="progress-group-bars">
                      <CProgress
                        :value="11"
                        class="progress-xs"
                        color="success"
                      />
                    </div>
                  </div>
                  <div class="progress-group">
                    <div class="progress-group-header">
                      <CIcon
                        class="progress-group-icon"
                        height="17"
                        name="cib-linkedin"
                      />
                      <span class="title">LinkedIn</span>
                      <span class="ml-auto font-weight-bold">
                        27,319 <span class="text-muted small">&nbsp;(8%)</span>
                      </span>
                    </div>
                    <div class="progress-group-bars">
                      <CProgress
                        :value="8"
                        class="progress-xs"
                        color="success"
                      />
                    </div>
                  </div>
                  <div class="divider text-center">
                    <CButton class="text-muted" color="link" size="sm">
                      <CIcon name="cil-options" />
                    </CButton>
                  </div>
                </ul>
              </CCol>
            </CRow>
            <br />
            <CDataTable
              :fields="tableFields"
              :items="tableItems"
              class="mb-0 table-outline"
              head-color="light"
              hover
              no-sorting
            >
              <td slot="avatar" slot-scope="{ item }" class="text-center">
                <div class="c-avatar">
                  <img :src="item.avatar.url" alt="" class="c-avatar-img" />
                  <span
                    :class="`bg-${item.avatar.status || 'secondary'}`"
                    class="c-avatar-status"
                  ></span>
                </div>
              </td>
              <td slot="user" slot-scope="{ item }">
                <div>{{ item.user.name }}</div>
                <div class="small text-muted">
                  <span>
                    <template v-if="item.user.new">New</template>
                    <template v-else>Recurring</template>
                  </span>
                  | Registered: {{ item.user.registered }}
                </div>
              </td>
              <td slot="country" slot-scope="{ item }" class="text-center">
                <CIcon :name="item.country.flag" height="25" />
              </td>
              <td slot="usage" slot-scope="{ item }">
                <div class="clearfix">
                  <div class="float-left">
                    <strong>{{ item.usage.value }}%</strong>
                  </div>
                  <div class="float-right">
                    <small class="text-muted">{{ item.usage.period }}</small>
                  </div>
                </div>
                <CProgress
                  v-model="item.usage.value"
                  :color="color(item.usage.value)"
                  class="progress-xs"
                />
              </td>
              <td slot="payment" slot-scope="{ item }" class="text-center">
                <CIcon :name="item.payment.icon" height="25" />
              </td>
              <td slot="activity" slot-scope="{ item }">
                <div class="small text-muted">Last login</div>
                <strong>{{ item.activity }}</strong>
              </td>
            </CDataTable>
          </CCardBody>
        </CCard>
      </CCol>
    </CRow>
  </div>
</template>

<script>
import MainChartExample from "./charts/MainChartExample";
import WidgetsDropdown from "./widgets/WidgetsDropdown";
import WidgetsBrand from "./widgets/WidgetsBrand";

export default {
  name: "Dashboard",
  components: {
    MainChartExample,
    WidgetsDropdown,
    WidgetsBrand
  },
  data() {
    return {
      selected: "Month",
      tableItems: [
        {
          avatar: { url: "img/avatars/1.jpg", status: "success" },
          user: {
            name: "Yiorgos Avraamu",
            new: true,
            registered: "Jan 1, 2015"
          },
          country: { name: "USA", flag: "cif-us" },
          usage: { value: 50, period: "Jun 11, 2015 - Jul 10, 2015" },
          payment: { name: "Mastercard", icon: "cib-cc-mastercard" },
          activity: "10 sec ago"
        },
        {
          avatar: { url: "img/avatars/2.jpg", status: "danger" },
          user: {
            name: "Avram Tarasios",
            new: false,
            registered: "Jan 1, 2015"
          },
          country: { name: "Brazil", flag: "cif-br" },
          usage: { value: 22, period: "Jun 11, 2015 - Jul 10, 2015" },
          payment: { name: "Visa", icon: "cib-cc-visa" },
          activity: "5 minutes ago"
        },
        {
          avatar: { url: "img/avatars/3.jpg", status: "warning" },
          user: { name: "Quintin Ed", new: true, registered: "Jan 1, 2015" },
          country: { name: "India", flag: "cif-in" },
          usage: { value: 74, period: "Jun 11, 2015 - Jul 10, 2015" },
          payment: { name: "Stripe", icon: "cib-stripe" },
          activity: "1 hour ago"
        },
        {
          avatar: { url: "img/avatars/4.jpg", status: "" },
          user: { name: "Enéas Kwadwo", new: true, registered: "Jan 1, 2015" },
          country: { name: "France", flag: "cif-fr" },
          usage: { value: 98, period: "Jun 11, 2015 - Jul 10, 2015" },
          payment: { name: "PayPal", icon: "cib-paypal" },
          activity: "Last month"
        },
        {
          avatar: { url: "img/avatars/5.jpg", status: "success" },
          user: {
            name: "Agapetus Tadeáš",
            new: true,
            registered: "Jan 1, 2015"
          },
          country: { name: "Spain", flag: "cif-es" },
          usage: { value: 22, period: "Jun 11, 2015 - Jul 10, 2015" },
          payment: { name: "Google Wallet", icon: "cib-google-pay" },
          activity: "Last week"
        },
        {
          avatar: { url: "img/avatars/6.jpg", status: "danger" },
          user: {
            name: "Friderik Dávid",
            new: true,
            registered: "Jan 1, 2015"
          },
          country: { name: "Poland", flag: "cif-pl" },
          usage: { value: 43, period: "Jun 11, 2015 - Jul 10, 2015" },
          payment: { name: "Amex", icon: "cib-cc-amex" },
          activity: "Last week"
        }
      ],
      tableFields: [
        { key: "avatar", label: "", _classes: "text-center" },
        { key: "user" },
        { key: "country", _classes: "text-center" },
        { key: "usage" },
        { key: "payment", label: "Payment method", _classes: "text-center" },
        { key: "activity" }
      ]
    };
  },
  methods: {
    color(value) {
      let $color;
      if (value <= 25) {
        $color = "info";
      } else if (value > 25 && value <= 50) {
        $color = "success";
      } else if (value > 50 && value <= 75) {
        $color = "warning";
      } else if (value > 75 && value <= 100) {
        $color = "danger";
      }
      return $color;
    }
  }
};
</script>
