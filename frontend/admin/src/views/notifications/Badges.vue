<template functional>
  <CRow>
    <CCol col="12" md="6">
      <CCard>
        <CCardHeader>
          <CIcon name="cil-justify-center" />
          <strong> Bootstrap Badge</strong>
          <div class="card-header-actions">
            <a
              class="card-header-action"
              href="https://coreui.io/vue/docs/components/badge"
              rel="noreferrer noopener"
              target="_blank"
            >
              <small class="text-muted">docs</small>
            </a>
          </div>
        </CCardHeader>
        <CCardBody>
          <h2>
            Example heading
            <CBadge color="primary">New</CBadge>
          </h2>
          <h3>
            Example heading
            <CBadge color="primary">New</CBadge>
          </h3>
          <h4>
            Example heading
            <CBadge color="primary">New</CBadge>
          </h4>
          <h5>
            Example heading
            <CBadge color="primary">New</CBadge>
          </h5>
          <h6>
            Example heading
            <CBadge color="primary">New</CBadge>
          </h6>
        </CCardBody>
        <CCardFooter>
          <CButton color="primary">
            Notifications
            <CBadge class="ml-2 position-static" color="light">4</CBadge>
          </CButton>
        </CCardFooter>
      </CCard>
    </CCol>
    <CCol col="12" md="6">
      <CCard>
        <CCardHeader>
          <CIcon name="cil-justify-center" />
          Badge
          <small>contextual variations</small>
        </CCardHeader>
        <CCardBody>
          <CBadge color="primary">Primary</CBadge>
          <CBadge color="secondary">Secondary</CBadge>
          <CBadge color="success">Success</CBadge>
          <CBadge color="danger">Danger</CBadge>
          <CBadge color="warning">Warning</CBadge>
          <CBadge color="info">Info</CBadge>
          <CBadge color="light">Light</CBadge>
          <CBadge color="dark">Dark</CBadge>
        </CCardBody>
      </CCard>
      <CCard>
        <CCardHeader>
          <CIcon name="cil-justify-center" />
          Badge
          <small>shape="pill"</small>
        </CCardHeader>
        <CCardBody>
          <CBadge color="primary" shape="pill">Primary</CBadge>
          <CBadge color="secondary" shape="pill">Secondary</CBadge>
          <CBadge color="success" shape="pill">Success</CBadge>
          <CBadge color="danger" shape="pill">Danger</CBadge>
          <CBadge color="warning" shape="pill">Warning</CBadge>
          <CBadge color="info" shape="pill">Info</CBadge>
          <CBadge color="light" shape="pill">Light</CBadge>
          <CBadge color="dark" shape="pill">Dark</CBadge>
        </CCardBody>
      </CCard>
      <CCard>
        <CCardHeader>
          <CIcon name="cil-justify-center" />
          Badge
          <small>actionable</small>
        </CCardHeader>
        <CCardBody>
          <CBadge color="primary" href="#">Primary</CBadge>
          <CBadge color="secondary" href="#">Secondary</CBadge>
          <CBadge color="success" href="#">Success</CBadge>
          <CBadge color="danger" href="#">Danger</CBadge>
          <CBadge color="warning" href="#">Warning</CBadge>
          <CBadge color="info" href="#">Info</CBadge>
          <CBadge color="light" href="#">Light</CBadge>
          <CBadge color="dark" href="#">Dark</CBadge>
        </CCardBody>
      </CCard>
    </CCol>
  </CRow>
</template>

<script>
export default {
  name: "Badges"
};
</script>
