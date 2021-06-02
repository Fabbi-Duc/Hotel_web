<template>
  <div style="text-align: initial">
    <vue-html2pdf
      :show-layout="false"
      :float-layout="true"
      :enable-download="true"
      :preview-modal="false"
      :paginate-elements-by-height="1400"
      filename="Prego"
      :pdf-quality="2"
      :manual-pagination="false"
      pdf-format="a4"
      pdf-orientation="landscape"
      pdf-content-width="1000px"
      ref="html2Pdf"
      @progress="onProgress($event)"
    >
      <section
        slot="pdf-content"
      >
        abcd
        <div class="html2pdf__page-break"></div>
      </section>
    </vue-html2pdf>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import VueHtml2pdf from "vue-html2pdf";
export default {
  components: { VueHtml2pdf },
  name: "PointPdfExport",
  data() {
    return {};
  },
  computed: {
    ...mapGetters({
      usersBlocked: "auth/usersBlock",
      dataExport: "pointHistory/dataExport"
    })
  },
  methods: {
    onProgress(event) {
      if (event == 100) {
      }
    },
    async generateReport() {
      await this.$refs.html2Pdf.generatePdf();
    },
  }
};
</script>

<style lang="scss" scoped>
table,
td,
th {
  border: 1px solid black;
}

table {
  width: 100%;
  border-collapse: collapse;
}
.content {
  width: 100%;
  height: 100%;
  padding: 40px 0 0 120px;
  &__label {
    font-size: 20px;
    width: 100%;
    height: 40px;
    background-color: rgb(167, 167, 167);
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .underline {
    border-bottom: 2px solid #000000;
  }
  &__point {
    margin-top: 80px;
    font-size: 30px;
    font-weight: bold;
    color: #000000;
  }
  pre {
    margin-top: 30px;
  }
}
@supports (-ms-ime-align: auto) {
  table,
  td,
  th {
    border: 1px solid black;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }
  .content {
    width: 100%;
    height: 100%;
    padding: 40px 0 0 120px;
    &__label {
      font-size: 20px;
      width: 100%;
      height: 40px;
      background-color: rgb(167, 167, 167);
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .underline {
      border-bottom: 2px solid #000000;
    }
    &__point {
      margin-top: 80px;
      font-size: 30px;
      font-weight: bold;
      color: #000000;
    }
    pre {
      margin-top: 30px;
    }
  }
}
</style>
