<template>
  <div>
    <CRow>
      <CCol md="4" sm="6">
        <CCard>
          <CCardHeader>
            Card title
            <div class="card-header-actions">
              <a
                class="card-header-action"
                href="https://coreui.io/vue/docs/components/card-components"
                rel="noreferrer noopener"
                target="_blank"
              >
                <small class="text-muted">docs</small>
              </a>
            </div>
          </CCardHeader>
          <CCardBody>
            {{ loremIpsum }}
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard>
          <CCardBody>{{ loremIpsum }}</CCardBody>
          <CCardFooter>Card Footer</CCardFooter>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard>
          <CCardHeader>
            <CIcon name="cil-check" />
            Card with icon
          </CCardHeader>
          <CCardBody>{{ loremIpsum }}</CCardBody>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard>
          <CCardHeader>
            Card with switch
            <CSwitch
              :checked="true"
              class="float-right"
              color="info"
              data-off="Off"
              data-on="On"
              shape="pill"
              size="sm"
            />
          </CCardHeader>
          <CCardBody>
            {{ loremIpsum }}
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard>
          <CCardHeader>
            Card with label
            <CBadge class="float-right" color="success">Success</CBadge>
          </CCardHeader>
          <CCardBody>
            {{ loremIpsum }}
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard>
          <CCardHeader>
            Card with label
            <CBadge class="float-right" color="danger" shape="pill">42</CBadge>
          </CCardHeader>
          <CCardBody>
            {{ loremIpsum }}
          </CCardBody>
        </CCard>
      </CCol>
    </CRow>
    <CRow>
      <CCol md="4" sm="6">
        <CCard border-color="primary">
          <CCardHeader>Card outline primary</CCardHeader>
          <CCardBody>{{ loremIpsum }}</CCardBody>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard border-color="secondary">
          <CCardHeader>Card outline secondary</CCardHeader>
          <CCardBody>{{ loremIpsum }}</CCardBody>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard border-color="success">
          <CCardHeader>Card outline success</CCardHeader>
          <CCardBody>{{ loremIpsum }}</CCardBody>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard border-color="info">
          <CCardHeader>Card outline info</CCardHeader>
          <CCardBody>{{ loremIpsum }}</CCardBody>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard border-color="warning">
          <CCardHeader>Card outline warning</CCardHeader>
          <CCardBody>{{ loremIpsum }}</CCardBody>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard border-color="danger">
          <CCardHeader>Card outline danger</CCardHeader>
          <CCardBody>{{ loremIpsum }}</CCardBody>
        </CCard>
      </CCol>
    </CRow>

    <CRow>
      <CCol md="4" sm="6">
        <CCard accent-color="primary">
          <CCardHeader>Card with primary accent</CCardHeader>
          <CCardBody>{{ loremIpsum }}</CCardBody>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard accent-color="secondary">
          <CCardHeader>Card with secondary accent</CCardHeader>
          <CCardBody>{{ loremIpsum }}</CCardBody>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard accent-color="success">
          <CCardHeader>Card with success accent</CCardHeader>
          <CCardBody>{{ loremIpsum }}</CCardBody>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard accent-color="info">
          <CCardHeader>Card with info accent</CCardHeader>
          <CCardBody>{{ loremIpsum }}</CCardBody>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard accent-color="info">
          <CCardHeader>Card with info accent</CCardHeader>
          <CCardBody>{{ loremIpsum }}</CCardBody>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard accent-color="danger">
          <CCardHeader>Card with danger accent</CCardHeader>
          <CCardBody>{{ loremIpsum }}</CCardBody>
        </CCard>
      </CCol>
    </CRow>
    <CRow>
      <CCol md="4" sm="6">
        <CCard
          body-wrapper
          class="text-center"
          color="primary"
          text-color="white"
        >
          <blockquote class="card-blockquote">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
              posuere erat a ante.
            </p>
            <footer>
              Someone famous in
              <cite title="Source Title">Source Title</cite>
            </footer>
          </blockquote>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard
          body-wrapper
          class="text-center"
          color="success"
          text-color="white"
        >
          <blockquote class="card-blockquote">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
              posuere erat a ante.
            </p>
            <footer>
              Someone famous in
              <cite title="Source Title">Source Title</cite>
            </footer>
          </blockquote>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard body-wrapper class="text-center" color="info" text-color="white">
          <blockquote class="card-blockquote">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
              posuere erat a ante.
            </p>
            <footer>
              Someone famous in
              <cite title="Source Title">Source Title</cite>
            </footer>
          </blockquote>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard
          body-wrapper
          class="text-center"
          color="warning"
          text-color="white"
        >
          <blockquote class="card-blockquote">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
              posuere erat a ante.
            </p>
            <footer>
              Someone famous in
              <cite title="Source Title">Source Title</cite>
            </footer>
          </blockquote>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard
          body-wrapper
          class="text-center"
          color="danger"
          text-color="white"
        >
          <blockquote class="card-blockquote">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
              posuere erat a ante.
            </p>
            <footer>
              Someone famous in
              <cite title="Source Title">Source Title</cite>
            </footer>
          </blockquote>
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard body-wrapper class="text-center" color="secondary">
          <blockquote class="card-blockquote">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
              posuere erat a ante.
            </p>
            <footer>
              Someone famous in
              <cite title="Source Title">Source Title</cite>
            </footer>
          </blockquote>
        </CCard>
      </CCol>
    </CRow>
    <CRow>
      <CCol md="4" sm="6">
        <CCard body-wrapper color="primary" text-color="white">
          {{ loremIpsum }}
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard body-wrapper color="success" text-color="white">
          {{ loremIpsum }}
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard body-wrapper color="info" text-color="white">
          {{ loremIpsum }}
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard body-wrapper color="warning" text-color="white">
          {{ loremIpsum }}
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <CCard body-wrapper color="danger" text-color="white">
          {{ loremIpsum }}
        </CCard>
      </CCol>
      <CCol md="4" sm="6">
        <transition name="fade">
          <CCard v-if="show" color="secondary">
            <CCardHeader>
              Card with header actions
              <div class="card-header-actions">
                <CLink class="card-header-action btn-setting" href="#">
                  <CIcon name="cil-settings" />
                </CLink>
                <CLink
                  class="card-header-action btn-minimize"
                  @click="isCollapsed = !isCollapsed"
                >
                  <CIcon
                    :name="`cil-chevron-${isCollapsed ? 'bottom' : 'top'}`"
                  />
                </CLink>
                <CLink
                  class="card-header-action btn-close"
                  href="#"
                  v-on:click="show = false"
                >
                  <CIcon name="cil-x-circle" />
                </CLink>
              </div>
            </CCardHeader>
            <CCollapse :duration="400" :show="isCollapsed">
              <CCardBody>
                {{ loremIpsum }}
              </CCardBody>
            </CCollapse>
          </CCard>
        </transition>
      </CCol>
    </CRow>
  </div>
</template>

<script>
export default {
  name: "Cards",
  data: function() {
    return {
      show: true,
      isCollapsed: true,
      loremIpsum:
        "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat."
    };
  }
};
</script>
