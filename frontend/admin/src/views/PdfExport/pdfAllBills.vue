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
      <section slot="pdf-content">
        <div class="content text-center">
          <h2>Biên lai thanh toán thuê phòng</h2>
          <br /><br /><br />
          <p class="text-right">Ngày trả phòng: {{ dateNow }}</p>
         <p class="text-left"> Khách hàng: {{ options[0].name }}</p>
          <p class="text-left">Giờ bắt đầu: {{ options[0].start_time }}</p>
          <p class="text-left">Giờ kết thúc: {{ options[0].end_time }}</p>
          <p class="text-left">Số giờ: {{ options[0].hour }}</p>
          <p class="text-left">Tiền phòng: {{ Intl.NumberFormat().format(options[0].money_room) }} VND</p>
          <p class="text-left">Tiền cọc: {{ Intl.NumberFormat().format(options[0].deposit) }} VND</p>
          <h4 for="" class="text-left">Danh sách đồ hỏng:</h4>
          <table style="width: 100%">
            <tr>
              <th>Đồ dùng</th>
              <th>Số lượng</th>
              <th>Đơn giá</th>
            </tr>
            <tr v-for="(item, index) in options[0].broken" :key="index">
              <td>{{ item.name }}</td>
              <td>{{ item.quantity }}</td>
              <td>{{ Intl.NumberFormat().format(item.cost) }}</td>
            </tr>
          </table>
          <h3 class="text-right mt-4 mb-4" style="font-weight: bold">
            Tổng tiền: {{ Intl.NumberFormat().format(options[0].total_cost - options[0].deposit) }} VND
          </h3>
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
  name: "PointPdfExport",
  props: {
    options: Array,
  },
  data() {
    return {
      dateNow: null,
    };
  },
  computed: {
    ...mapGetters({
      usersBlocked: "auth/usersBlock",
      dataExport: "pointHistory/dataExport",
    }),
  },
  created() {
    var now = new Date().toLocaleString();
    this.dateNow = now;
  },
  methods: {
    onProgress(event) {
      if (event == 100) {
      }
    },
    async generateReport() {
      await this.$refs.html2Pdf.generatePdf();
    },
  },
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
