<template>
  <div style="text-align: initial">
    <vue-html2pdf
      :show-layout="false"
      :float-layout="true"
      :enable-download="true"
      :preview-modal="false"
      :paginate-elements-by-height="1400"
      filename="Diva"
      :pdf-quality="2"
      :manual-pagination="false"
      pdf-format="a4"
      pdf-orientation="landscape"
      pdf-content-width="1000px"
      ref="html2Pdf"
      @progress="onProgress($event)"
    >
      <section slot="pdf-content">
        <div class="content text-center">
          <h2>Biên lai nhập hàng</h2>
          <br /><br /><br />
          <p class="text-left">Người nhập: {{ user.user_name }}</p>
          <p class="text-left">Ngày nhập: {{ user.day }}</p>
          <p class="text-left">Chiết khấu: {{ user.discount }}</p>
          <table style="width: 100%">
            <tr>
              <th>Đồ dùng</th>
              <th>Số lượng</th>
              <th>Đơn giá</th>
            </tr>
            <tr v-for="(item, index) in options" :key="index">
              <td>{{ item.name }}</td>
              <td>{{ item.quantity }}</td>
              <td>{{ Intl.NumberFormat().format(item.cost) }}</td>
            </tr>
          </table>
          <h3 class="text-right mt-4 mb-4" style="font-weight: bold">Tổng tiền: {{ Intl.NumberFormat().format(totalPrice)*(1 - user.discount/100) }} VND</h3>
          <h3 class="mt-5 mr-5 text-right">Xác nhận</h3>
          <h4 class="text-right">Chữ ký người nhập</h4>
        </div>
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
  props: {
    options: Array,
    user: Object,
  },
  name: "PointPdfExport",
  data() {
    return {
      totalPrice: 0,
      dateNow: null
    };
  },
  computed: {
    ...mapGetters({}),
  },
  created() {
    var now = new Date().toLocaleString();
    this.dateNow = now;
    console.log(this.user);
  },
  methods: {
    onProgress(event) {
      if (event == 100) {
      }
    },
    async generateReport() {
      await this.options.forEach(element => {
        this.totalPrice += element.quantity * element.cost;
      });
      await this.$refs.html2Pdf.generatePdf();
      this.totalPrice = 0;
    },
    rowClass(item, type) {
      if (!item || type !== "row") return;
      if (item.status === "awesome") return "table-success";
    },
  },
};
</script>

<style lang="scss" scoped>
.content {
  width: 100%;
  height: 100%;
  padding: 40px 0 0 120px;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th {
  font-weight: 600;
  font-size: 18px;
  padding: 7px 0;
}
td {
  padding: 10px 0;
}
</style>
