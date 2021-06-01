<template>
  <CRow>
    <CCol col="12">
      <CCard>
        <CCardHeader>
          <strong>Brand Button</strong>
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
          <small>Usage </small>
          <code>{{ $options.usage }}</code>
          <hr />
          <h6>
            Size Small
            <small>Add <code>size="sm"</code></small>
          </h6>
          <p>
            <template v-for="(brandName, key) in $options.brands">
              <CButton
                :key="key"
                :color="brandName"
                :name="brandName"
                size="sm"
              >
                <CIcon :name="'cib-' + brandName" size="sm" />
                <span>{{ brandName }}</span>
              </CButton>
            </template>
          </p>
          <h6>Size Normal</h6>
          <p>
            <template v-for="(brandName, key) in $options.brands">
              <CButton :key="key" :color="brandName" :name="brandName">
                <CIcon :name="'cib-' + brandName" />
                <span>{{ brandName }}</span>
              </CButton>
            </template>
          </p>
          <h6>
            Size Large <small>Add <code>size="lg"</code></small>
          </h6>
          <p>
            <template v-for="(brandName, key) in $options.brands">
              <CButton
                :key="key"
                :color="brandName"
                :name="brandName"
                size="lg"
              >
                <CIcon :name="'cib-' + brandName" size="lg" />
                <span>{{ brandName }}</span>
              </CButton>
            </template>
          </p>
        </CCardBody>
      </CCard>
    </CCol>
    <CCol col="12">
      <CCard>
        <CCardHeader>
          <strong>Brand Button </strong> <small>Icons only</small>
        </CCardHeader>
        <CCardBody>
          <small>Usage </small>
          <code>{{ $options.iconsOnlyUsage }}</code>
          <hr />
          <h6>
            Size Small <small>Add <code>size="sm"</code></small>
          </h6>
          <p>
            <template v-for="(brandName, key) in $options.brands">
              <CButton
                :key="key"
                :color="brandName"
                :name="brandName"
                size="sm"
              >
                <CIcon :name="'cib-' + brandName" size="sm" />
              </CButton>
            </template>
          </p>
          <h6>Size Normal</h6>
          <p>
            <template v-for="(brandName, key) in $options.brands">
              <CButton :key="key" :color="brandName" :name="brandName">
                <CIcon :name="'cib-' + brandName" />
              </CButton>
            </template>
          </p>
          <h6>
            Size Large <small>Add <code>size="lg"</code></small>
          </h6>
          <p>
            <template v-for="(brandName, key) in $options.brands">
              <CButton
                :key="key"
                :color="brandName"
                :name="brandName"
                size="lg"
              >
                <CIcon :name="'cib-' + brandName" size="lg" />
              </CButton>
            </template>
          </p>
        </CCardBody>
      </CCard>
    </CCol>

    <CCol col="12">
      <CCard>
        <CCardHeader>
          <strong>Brand Button </strong> <small>Text only</small>
        </CCardHeader>
        <CCardBody>
          <small>Usage </small>
          <code>
            {{ $options.textOnlyUsage }}
          </code>
          <hr />
          <h6>
            Size Small <small>Add <code>size="sm"</code></small>
          </h6>
          <p>
            <template v-for="(brandName, key) in $options.brands">
              <CButton :key="key" :color="brandName" size="sm">
                <span>{{ brandName }}</span>
              </CButton>
            </template>
          </p>
          <h6>Size Normal</h6>
          <p>
            <template v-for="(brandName, key) in $options.brands">
              <CButton :key="key" :color="brandName">
                <span>{{ brandName }}</span>
              </CButton>
            </template>
          </p>
          <h6>
            Size Large <small>Add <code>size="lg"</code></small>
          </h6>
          <p>
            <template v-for="(brandName, key) in $options.brands">
              <CButton :key="key" :color="brandName" size="lg">
                <span>{{ brandName }}</span>
              </CButton>
            </template>
          </p>
        </CCardBody>
      </CCard>
    </CCol>
  </CRow>
</template>

<script>
export default {
  name: "BrandButtons",
  usage: '<CButton color="facebook"><span>Facebook</span></CButton>',
  iconsOnlyUsage:
    '<CButton color="facebook"><CIcon name="cib-facebook"/></CButton>',
  textOnlyUsage:
    '<CButton color="facebook"><CIcon name="cib-facebook"/></CButton>',
  brands: [
    "facebook",
    "twitter",
    "linkedin",
    "flickr",
    "tumblr",
    "xing",
    "github",
    "stackoverflow",
    "youtube",
    "dribbble",
    "instagram",
    "pinterest",
    "vk",
    "yahoo",
    "behance",
    "reddit",
    "vimeo"
  ]
  // labels: {
  //   facebook: 'Facebook',
  //   twitter: 'Twitter',
  //   linkedin: 'LinkedIn',
  //   flickr: 'Flickr',
  //   tumblr: 'Tumblr',
  //   xing: 'Xing',
  //   github: 'Github',
  //   stackoverflow: 'StackOverflow',
  //   youtube: 'YouTube',
  //   dribbble: 'Dribbble',
  //   instagram: 'Instagram',
  //   pinterest: 'Pinterest',
  //   vk: 'VK',
  //   yahoo: 'Yahoo',
  //   behance: 'Behance',
  //   reddit: 'Reddit',
  //   vimeo: 'Vimeo'
  // }
};
</script>

<style scoped>
.btn {
  margin-bottom: 4px;
  margin-right: 6px;
}
</style>
