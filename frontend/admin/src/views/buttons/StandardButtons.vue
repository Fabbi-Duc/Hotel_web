<template>
  <div>
    <CCard>
      <CCardHeader>
        <strong>Standard buttons</strong>
        <div class="card-header-actions">
          <a
            class="card-header-action"
            href="https://coreui.io/vue/docs/components/button-components"
            rel="noreferrer noopener"
            target="_blank"
          >
            <small class="text-muted">docs</small>
          </a>
        </div>
      </CCardHeader>
      <CCardBody>
        <CRow class="align-items-center">
          <CCol class="mb-3 mb-xl-0" col="12" xl>
            Normal
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="primary">Primary</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="secondary">Secondary</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="success">Success</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="warning">Warning</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="danger">Danger</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="info">Info</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="light">Light</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="dark">Dark</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="link">Link</CButton>
          </CCol>
        </CRow>
        <CRow class="align-items-center mt-3">
          <CCol class="mb-3 mb-xl-0" col="12" xl>
            Active State
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="primary" pressed
              >Primary
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="secondary" pressed
              >Secondary
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="success" pressed
              >Success
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="warning" pressed
              >Warning
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="danger" pressed
              >Danger
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="info" pressed
              >Info
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="light" pressed
              >Light
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="dark" pressed
              >Dark
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="link" pressed
              >Link
            </CButton>
          </CCol>
        </CRow>
        <CRow class="align-items-center mt-3">
          <CCol class="mb-3 mb-xl-0" col="12" xl>
            Disabled
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="primary" disabled>Primary</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="secondary" disabled>Secondary</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="success" disabled>Success</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="warning" disabled>Warning</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="danger" disabled>Danger</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="info" disabled>Info</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="light" disabled>Light</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="dark" disabled>Dark</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="link" disabled>Link</CButton>
          </CCol>
        </CRow>
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <strong>Outline Buttons</strong>
      </CCardHeader>
      <CCardBody>
        <p>Use <code>variant="outline"</code> prop</p>
        <CRow class="align-items-center">
          <CCol class="mb-3 mb-xl-0" col="12" xl>
            Normal
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="primary" variant="outline">Primary</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="secondary" variant="outline"
              >Secondary
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="success" variant="outline">Success</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="warning" variant="outline">Warning</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="danger" variant="outline">Danger</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="info" variant="outline">Info</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="light" variant="outline">Light</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="dark" variant="outline">Dark</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl></CCol>
        </CRow>
        <CRow class="align-items-center mt-3">
          <CCol class="mb-3 mb-xl-0" col="12" xl>
            Active State
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="primary"
              pressed
              variant="outline"
              >Primary
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="secondary"
              pressed
              variant="outline"
              >Secondary
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="success"
              pressed
              variant="outline"
              >Success
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="warning"
              pressed
              variant="outline"
              >Warning
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="danger"
              pressed
              variant="outline"
              >Danger
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="info"
              pressed
              variant="outline"
              >Info
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="light"
              pressed
              variant="outline"
              >Light
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="dark"
              pressed
              variant="outline"
              >Dark
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl></CCol>
        </CRow>
        <CRow class="align-items-center mt-3">
          <CCol class="mb-3 mb-xl-0" col="12" xl>
            Disabled
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="primary" disabled variant="outline"
              >Primary
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="secondary" disabled variant="outline"
              >Secondary
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="success" disabled variant="outline"
              >Success
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="warning" disabled variant="outline"
              >Warning
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="danger" disabled variant="outline"
              >Danger
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="info" disabled variant="outline"
              >Info
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="light" disabled variant="outline"
              >Light
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="dark" disabled variant="outline"
              >Dark
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl></CCol>
        </CRow>
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <strong>Ghost Buttons</strong>
      </CCardHeader>
      <CCardBody>
        <p>
          Use
          <code>variant="ghost"</code> prop for ghost buttons.
        </p>
        <CRow class="align-items-center">
          <CCol class="mb-3 mb-xl-0" col="12" xl>
            Normal
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="primary" variant="ghost">Primary</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="secondary" variant="ghost">Secondary</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="success" variant="ghost">Success</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="warning" variant="ghost">Warning</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="danger" variant="ghost">Danger</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="info" variant="ghost">Info</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="light" variant="ghost">Light</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="dark" variant="ghost">Dark</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl></CCol>
        </CRow>
        <CRow class="align-items-center mt-3">
          <CCol class="mb-3 mb-xl-0" col="12" xl>
            Active State
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="primary"
              pressed
              variant="ghost"
              >Primary
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="secondary"
              pressed
              variant="ghost"
              >Secondary
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="success"
              pressed
              variant="ghost"
              >Success
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="warning"
              pressed
              variant="ghost"
              >Warning
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="danger"
              pressed
              variant="ghost"
              >Danger
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="info"
              pressed
              variant="ghost"
              >Info
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="light"
              pressed
              variant="ghost"
              >Light
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="dark"
              pressed
              variant="ghost"
              >Dark
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl></CCol>
        </CRow>
        <CRow class="align-items-center mt-3">
          <CCol class="mb-3 mb-xl-0" col="12" xl>
            Disabled
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="primary" disabled variant="ghost"
              >Primary
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="secondary" disabled variant="ghost"
              >Secondary
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="success" disabled variant="ghost"
              >Success
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="warning" disabled variant="ghost"
              >Warning
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="danger" disabled variant="ghost"
              >Danger
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="info" disabled variant="ghost">Info</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="light" disabled variant="ghost"
              >Light
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="dark" disabled variant="ghost">Dark</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl></CCol>
        </CRow>
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <strong>Square Buttons</strong>
      </CCardHeader>
      <CCardBody>
        <p>
          Use
          <code>square</code> prop for square buttons.
        </p>
        <CRow class="align-items-center">
          <CCol class="mb-3 mb-xl-0" col="12" xl>
            Normal
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="primary" square>Primary</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="secondary" square>Secondary</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="success" square>Success</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="warning" square>Warning</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="danger" square>Danger</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="info" square>Info</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="light" square>Light</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="dark" square>Dark</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="link" square>Link</CButton>
          </CCol>
        </CRow>
        <CRow class="align-items-center mt-3">
          <CCol class="mb-3 mb-xl-0" col="12" xl>
            Active State
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="primary" pressed square
              >Primary
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="secondary" pressed square
              >Secondary
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="success" pressed square
              >Success
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="warning" pressed square
              >Warning
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="danger" pressed square
              >Danger
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="info" pressed square
              >Info
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="light" pressed square
              >Light
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="dark" pressed square
              >Dark
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="link" pressed square
              >Link
            </CButton>
          </CCol>
        </CRow>
        <CRow class="align-items-center mt-3">
          <CCol class="mb-3 mb-xl-0" col="12" xl>
            Disabled
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="primary" disabled square>Primary</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="secondary" disabled square>Secondary</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="success" disabled square>Success</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="warning" disabled square>Warning</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="danger" disabled square>Danger</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="info" disabled square>Info</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="light" disabled square>Light</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="dark" disabled square>Dark</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="link" disabled square>Link</CButton>
          </CCol>
        </CRow>
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <strong>Pill Buttons</strong>
      </CCardHeader>
      <CCardBody>
        <p>
          Use
          <code>pill</code> prop for pill buttons.
        </p>
        <CRow class="align-items-center">
          <CCol class="mb-3 mb-xl-0" col="12" xl>
            Normal
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="primary" shape="pill">Primary</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="secondary" shape="pill">Secondary</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="success" shape="pill">Success</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="warning" shape="pill">Warning</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="danger" shape="pill">Danger</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="info" shape="pill">Info</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="light" shape="pill">Light</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="dark" shape="pill">Dark</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="link" shape="pill">Link</CButton>
          </CCol>
        </CRow>
        <CRow class="align-items-center mt-3">
          <CCol class="mb-3 mb-xl-0" col="12" xl>
            Active State
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="primary"
              pressed
              shape="pill"
              >Primary
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="secondary"
              pressed
              shape="pill"
              >Secondary
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="success"
              pressed
              shape="pill"
              >Success
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="warning"
              pressed
              shape="pill"
              >Warning
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="danger"
              pressed
              shape="pill"
              >Danger
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="info" pressed shape="pill"
              >Info
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton
              aria-pressed="true"
              block
              color="light"
              pressed
              shape="pill"
              >Light
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="dark" pressed shape="pill"
              >Dark
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton aria-pressed="true" block color="link" pressed shape="pill"
              >Link
            </CButton>
          </CCol>
        </CRow>
        <CRow class="align-items-center mt-3">
          <CCol class="mb-3 mb-xl-0" col="12" xl>
            Disabled
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="primary" disabled shape="pill"
              >Primary
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="secondary" disabled shape="pill"
              >Secondary
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="success" disabled shape="pill"
              >Success
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="warning" disabled shape="pill"
              >Warning
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="danger" disabled shape="pill">Danger</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="info" disabled shape="pill">Info</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="light" disabled shape="pill">Light</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="dark" disabled shape="pill">Dark</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0" col="6" md="2" sm="4" xl>
            <CButton block color="link" disabled shape="pill">Link</CButton>
          </CCol>
        </CRow>
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <strong>Sizes</strong>
      </CCardHeader>
      <CCardBody>
        <p>
          Fancy larger or smaller buttons? Add <code>size="lg"</code> or
          <code>size="sm"</code> for additional sizes.
        </p>
        <CRow class="align-items-center">
          <CCol class="mb-3 mb-xl-0" col="2" xl>
            Small
          </CCol>
          <CCol class="mb-3 mb-xl-0 text-center" col="2">
            <CButton color="primary" size="sm">Standard Button</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0 text-center" col="2">
            <CButton color="secondary" size="sm" variant="outline"
              >Outline Button
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0 text-center" col="2">
            <CButton color="success" size="sm" variant="ghost"
              >Ghost Button
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0 text-center" col="2">
            <CButton color="warning" size="sm" square>Square Button</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0 text-center" col="2">
            <CButton color="danger" shape="pill" size="sm">Pill Button</CButton>
          </CCol>
        </CRow>
        <CRow class="align-items-center mt-3">
          <CCol class="mb-3 mb-xl-0" col="2" xl>
            Normal
          </CCol>
          <CCol class="mb-3 mb-xl-0 text-center" col="2">
            <CButton color="primary">Standard Button</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0 text-center" col="2">
            <CButton color="secondary" variant="outline"
              >Outline Button
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0 text-center" col="2">
            <CButton color="success" variant="ghost">Ghost Button</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0 text-center" col="2">
            <CButton color="warning" square>Square Button</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0 text-center" col="2">
            <CButton color="danger" shape="pill">Pill Button</CButton>
          </CCol>
        </CRow>
        <CRow class="align-items-center mt-3">
          <CCol class="mb-3 mb-xl-0" col="2" xl>
            Large
          </CCol>
          <CCol class="mb-3 mb-xl-0 text-center" col="2">
            <CButton color="primary" size="lg">Standard Button</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0 text-center" col="2">
            <CButton color="secondary" size="lg" variant="outline"
              >Outline Button
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0 text-center" col="2">
            <CButton color="success" size="lg" variant="ghost"
              >Ghost Button
            </CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0 text-center" col="2">
            <CButton color="warning" size="lg" square>Square Button</CButton>
          </CCol>
          <CCol class="mb-3 mb-xl-0 text-center" col="2">
            <CButton color="danger" shape="pill" size="lg">Pill Button</CButton>
          </CCol>
        </CRow>
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <strong>With Icons</strong>
      </CCardHeader>
      <CCardBody>
        <CRow class="align-items-center">
          <CCol class="text-center mt-3" sm xs="12">
            <CButton color="primary">
              <CIcon name="cil-lightbulb" />&nbsp;Standard Button
            </CButton>
          </CCol>
          <CCol class="text-center mt-3" sm xs="12">
            <CButton color="secondary" variant="outline">
              <CIcon name="cil-lightbulb" />&nbsp;Outline Button
            </CButton>
          </CCol>
          <CCol class="text-center mt-3" sm xs="12">
            <CButton color="success">
              <CIcon name="cil-lightbulb" />&nbsp;Ghost Button
            </CButton>
          </CCol>
          <CCol class="text-center mt-3" sm xs="12">
            <CButton color="warning" square>
              <CIcon name="cil-lightbulb" />&nbsp;Square Button
            </CButton>
          </CCol>
          <CCol class="text-center mt-3" sm xs="12">
            <CButton color="danger" shape="pill">
              <CIcon name="cil-lightbulb" />&nbsp;Pill Button
            </CButton>
          </CCol>
        </CRow>
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <strong>Toggle pressed state</strong>
      </CCardHeader>
      <CCardBody>
        <CRow>
          <CCol class="text-center mt-3" sm xs="12">
            <CButton
              :pressed.sync="togglePress"
              color="primary"
              variant="outline"
              >Primary {{ togglePress ? "On " : "Off" }}
            </CButton>
          </CCol>
          <CCol class="text-center mt-3" sm xs="12">
            <CButton
              :pressed.sync="togglePress"
              color="secondary"
              variant="outline"
              >Secondary {{ togglePress ? "On " : "Off" }}
            </CButton>
          </CCol>
          <CCol class="text-center mt-3" sm xs="12">
            <CButton
              :pressed.sync="togglePress"
              color="success"
              variant="outline"
              >Success {{ togglePress ? "On " : "Off" }}
            </CButton>
          </CCol>
          <CCol class="text-center mt-3" sm xs="12">
            <CButton :pressed.sync="togglePress" color="info" variant="outline"
              >Info {{ togglePress ? "On " : "Off" }}
            </CButton>
          </CCol>
          <CCol class="text-center mt-3" sm xs="12">
            <CButton
              :pressed.sync="togglePress"
              color="warning"
              variant="outline"
              >Warning {{ togglePress ? "On " : "Off" }}
            </CButton>
          </CCol>
          <CCol class="text-center mt-3" sm xs="12">
            <CButton
              :pressed.sync="togglePress"
              color="danger"
              variant="outline"
              >Danger {{ togglePress ? "On " : "Off" }}
            </CButton>
          </CCol>
        </CRow>
      </CCardBody>
    </CCard>
    <CRow>
      <CCol md="6" xs="12">
        <CCard>
          <CCardHeader>
            <strong>Block Level CButtons </strong
            ><small>Add this <code>block</code></small>
          </CCardHeader>
          <CCardBody>
            <CButton block color="secondary" size="lg"
              >Block level button
            </CButton>
            <CButton block color="primary" size="lg"
              >Block level button
            </CButton>
            <CButton block color="success" size="lg"
              >Block level button
            </CButton>
            <CButton block color="info" size="lg">Block level button</CButton>
            <CButton block color="warning" size="lg"
              >Block level button
            </CButton>
            <CButton block color="danger" size="lg">Block level button</CButton>
            <CButton block color="link" size="lg">Block level button</CButton>
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="6" xs="12">
        <CCard>
          <CCardHeader>
            <strong>Block Level CButtons </strong
            ><small>Add this <code>block</code></small>
          </CCardHeader>
          <CCardBody>
            <CButton block color="secondary" size="lg" variant="outline"
              >Block level button
            </CButton>
            <CButton block color="primary" size="lg" variant="outline"
              >Block level button
            </CButton>
            <CButton block color="success" size="lg" variant="outline"
              >Block level button
            </CButton>
            <CButton block color="info" size="lg" variant="outline"
              >Block level button
            </CButton>
            <CButton block color="warning" size="lg" variant="outline"
              >Block level button
            </CButton>
            <CButton block color="danger" size="lg" variant="outline"
              >Block level button
            </CButton>
            <CButton block color="info" size="lg" variant="ghost"
              >Block level button
            </CButton>
          </CCardBody>
        </CCard>
      </CCol>
    </CRow>
  </div>
</template>

<script>
export default {
  name: "StandardButtons",
  data() {
    return { togglePress: false };
  }
};
</script>
