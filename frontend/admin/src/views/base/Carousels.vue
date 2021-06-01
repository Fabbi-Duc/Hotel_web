<template>
  <CRow>
    <CCol lg="7" md="12">
      <CCard>
        <CCardHeader>
          <CIcon name="cil-justify-center" />
          <strong> Bootstrap Carousel</strong>
          <div class="card-header-actions">
            <a
              class="card-header-action"
              href="https://coreui.io/vue/docs/components/carousel"
              rel="noreferrer noopener"
              target="_blank"
            >
              <small class="text-muted">docs</small>
            </a>
          </div>
        </CCardHeader>
        <CCardBody>
          <CCarousel animate arrows height="400px" indicators>
            <CCarouselItem
              captionHeader="First Slide"
              captionText="Nulla vitae elit libero, a pharetra augue mollis interdum."
              image="https://picsum.photos/1024/480/?image=52"
            />
            <CCarouselItem
              :image="{ placeholderColor: 'grey' }"
              captionHeader="Blank page"
              captionText="Nulla vitae elit libero, a pharetra augue mollis interdum."
            />
            <CCarouselItem image="https://picsum.photos/1024/480/?image=54" />
          </CCarousel>
        </CCardBody>
      </CCard>
    </CCol>
  </CRow>
</template>

<script>
export default {
  name: "Carousels"
};
</script>
