<template>
  <CRow>
    <CCol col="12" md="6">
      <CCard>
        <CCardHeader>
          <CIcon name="cil-justify-center" />
          <strong> Bootstrap Alert</strong>
          <div class="card-header-actions">
            <a
              class="card-header-action"
              href="https://coreui.io/vue/docs/components/alert"
              rel="noreferrer noopener"
              target="_blank"
            >
              <small class="text-muted">docs</small>
            </a>
          </div>
        </CCardHeader>
        <CCardBody>
          <div>
            <p></p>
            <CAlert color="primary" show>Primary Alert</CAlert>
            <CAlert color="secondary" show>Secondary Alert</CAlert>
            <CAlert color="success" show>Success Alert</CAlert>
            <CAlert color="danger" show>Danger Alert</CAlert>
            <CAlert color="warning" show>Warning Alert</CAlert>
            <CAlert color="info" show>Info Alert</CAlert>
            <CAlert color="light" show>Light Alert</CAlert>
            <CAlert color="dark" show>Dark Alert</CAlert>
          </div>
        </CCardBody>
      </CCard>
    </CCol>
    <CCol col="12" md="6">
      <CCard>
        <CCardHeader>
          <CIcon name="cil-justify-center" />
          Alert
          <small> use <code>.alert-link</code> to provide links</small>
        </CCardHeader>
        <CCardBody>
          <div>
            <CAlert color="primary" show>
              Primary Alert with
              <a class="alert-link" href="#">an example link</a>.
            </CAlert>
            <CAlert color="secondary" show>
              Secondary Alert with
              <a class="alert-link" href="#">an example link</a>.
            </CAlert>
            <CAlert color="success" show>
              Success Alert with
              <a class="alert-link" href="#">an example link</a>.
            </CAlert>
            <CAlert color="danger" show>
              Danger Alert with
              <a class="alert-link" href="#">an example link</a>.
            </CAlert>
            <CAlert color="warning" show>
              Warning Alert with
              <a class="alert-link" href="#">an example link</a>.
            </CAlert>
            <CAlert color="info" show>
              Info Alert with
              <a class="alert-link" href="#">an example link</a>.
            </CAlert>
            <CAlert color="light" show>
              Light Alert with
              <a class="alert-link" href="#">an example link</a>.
            </CAlert>
            <CAlert color="dark" show>
              Dark Alert with
              <CLink class="alert-link" href="#">an example link</CLink>
              .
            </CAlert>
          </div>
        </CCardBody>
      </CCard>
    </CCol>
    <CCol col="12" md="6">
      <CCard>
        <CCardHeader>
          <CIcon name="cil-justify-center" />
          Alerts
          <small>with additional content</small>
        </CCardHeader>
        <CCardBody>
          <CAlert color="success" show>
            <h4 class="alert-heading">Well done!</h4>
            <p>
              Aww yeah, you successfully read this important alert message. This
              example text is going to run a bit longer so that you can see how
              spacing within an alert works with this kind of content.
            </p>
            <hr />
            <p class="mb-0">
              Whenever you need to, be sure to use margin utilities to keep
              things nice and tidy.
            </p>
          </CAlert>
        </CCardBody>
      </CCard>
    </CCol>
    <CCol col="12" md="6">
      <CCard>
        <CCardHeader>
          <CIcon name="cil-justify-center" />
          Alerts
          <small>dismissible</small>
        </CCardHeader>
        <CCardBody>
          <CAlert :show.sync="alert1" closeButton color="secondary">
            Dismissible Alert!
          </CAlert>

          <CAlert
            :show.sync="alert2"
            class="alert-dismissible"
            color="secondary"
          >
            Dismissible Alert with custom button!
            <CButton
              class="position-absolute"
              color="secondary"
              style="right:10px;top: 50%;transform: translateY(-50%);"
              @click="alert2 = false"
            >
              Close
            </CButton>
          </CAlert>
          <CButton class="m-1" color="info" @click="showDismissibleAlerts">
            Show dismissible alerts
          </CButton>
        </CCardBody>
      </CCard>
      <CCard>
        <CCardHeader>
          <CIcon name="cil-justify-center" />
          Alerts
          <small>auto dismissible</small>
        </CCardHeader>
        <CCardBody>
          <div>
            <CAlert
              :show.sync="dismissCountDown"
              closeButton
              color="warning"
              fade
            >
              Alert will dismiss after
              <strong>{{ dismissCountDown }}</strong> seconds...
            </CAlert>

            <CAlert :show.sync="dismissCountDown" closeButton color="info">
              Alert will dismiss after {{ dismissCountDown }} seconds...
              <CProgress
                :max="dismissSecs"
                :value="dismissCountDown"
                color="info"
                height="4px"
              />
            </CAlert>
            <CButton class="m-1" color="info" @click="showAlert">
              Show alert with timer
            </CButton>
          </div>
        </CCardBody>
      </CCard>
    </CCol>
  </CRow>
</template>

<script>
export default {
  name: "Alerts",
  data() {
    return {
      dismissSecs: 10,
      dismissCountDown: 10,
      alert1: true,
      alert2: true
    };
  },
  methods: {
    countDownChanged(dismissCountDown) {
      this.dismissCountDown = dismissCountDown;
    },
    showAlert() {
      this.dismissCountDown = this.dismissSecs;
    },
    showDismissibleAlerts() {
      ["alert1", "alert2"].forEach(alert => (this[alert] = true));
    }
  }
};
</script>
