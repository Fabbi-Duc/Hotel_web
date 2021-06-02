<script>
import { Line } from "vue-chartjs";

export default {
  extends: Line,
  data() {
    return {
      gradient: null,
      gradient2: null,
      data: {
        labels: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ],
        datasets: [
          {
            label: "Phòng đơn thường",
            borderColor: "#FC2525",
            pointBackgroundColor: "white",
            borderWidth: 2,
            pointBorderColor: "#FC2525",
            backgroundColor: this.gradient,
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
          },
          {
            label: "Phòng đôi thường",
            borderColor: "#05CBE1",
            pointBackgroundColor: "white",
            pointBorderColor: "#05CBE1",
            borderWidth: 2,
            backgroundColor: this.gradient2,
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
          },
          {
            label: "Phòng vip thường",
            borderColor: "#f9b115",
            pointBackgroundColor: "white",
            pointBorderColor: "#f9b115",
            borderWidth: 2,
            backgroundColor: this.gradient3,
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
          },
          {
            label: "Phòng vip đôi",
            borderColor: "rgb(4, 147, 114)",
            pointBackgroundColor: "white",
            pointBorderColor: "rgb(4, 147, 114)",
            borderWidth: 2,
            backgroundColor: this.gradient4,
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
          },
        ],
      },
    };
  },
  computed: {
    async getCount() {
      await this.$store
        .dispatch("customer/getCountRoomByMonth")
        .then((response) => {
          for (let i = 1; i <= this.data.datasets[0].data.length; i++) {
            for (let j = 0; j < response.data.type_1.length; j++) {
              if (response.data.type_1[j].month === i) {
                this.data.datasets[0].data[i - 1] = response.data.type_1[j].qty;
              }
            }
          }
          for (let i = 1; i <= this.data.datasets[1].data.length; i++) {
            for (let j = 0; j < response.data.type_2.length; j++) {
              if (response.data.type_2[j].month === i) {
                this.data.datasets[1].data[i - 1] = response.data.type_2[j].qty;
              }
            }
          }
          for (let i = 1; i <= this.data.datasets[2].data.length; i++) {
            for (let j = 0; j < response.data.type_3.length; j++) {
              if (response.data.type_3[j].month === i) {
                this.data.datasets[2].data[i - 1] = response.data.type_3[j].qty;
              }
            }
          }
          for (let i = 1; i <= this.data.datasets[3].data.length; i++) {
            for (let j = 0; j < response.data.type_4.length; j++) {
              if (response.data.type_4[j].month === i) {
                this.data.datasets[3].data[i - 1] = response.data.type_4[j].qty;
              }
            }
          }
          this.gradient = this.$refs.canvas
            .getContext("2d")
            .createLinearGradient(0, 0, 0, 450);
          this.gradient2 = this.$refs.canvas
            .getContext("2d")
            .createLinearGradient(0, 0, 0, 450);
          this.gradient3 = this.$refs.canvas
            .getContext("2d")
            .createLinearGradient(0, 0, 0, 450);
          this.gradient4 = this.$refs.canvas
            .getContext("2d")
            .createLinearGradient(0, 0, 0, 450);

          // this.gradient.addColorStop(0, "rgba(240, 52, 52, 0.5)");
          // this.gradient.addColorStop(0.5, "rgba(240, 52, 52, 0.25)");
          // this.gradient.addColorStop(1, "rgba(240, 52, 52, 0)");

          // this.gradient2.addColorStop(0, "rgba(154, 18, 179, 0.9)");
          // this.gradient2.addColorStop(0.5, "rgba(154, 18, 179, 0.25)");
          // this.gradient2.addColorStop(1, "rgba(154, 18, 179, 0)");

          // this.gradient3.addColorStop(0, "rgba(0, 230, 64, 0.9)");
          // this.gradient3.addColorStop(0.5, "rgba(0, 230, 64, 0.25)");
          // this.gradient3.addColorStop(1, "rgba(0, 230, 64, 0)");

          // this.gradient4.addColorStop(0, "rgba(248, 148, 6, 0.9)");
          // this.gradient4.addColorStop(0.5, "rgba(248, 148, 6, 0.25)");
          // this.gradient4.addColorStop(1, "rgba(248, 148, 6, 0)");

          this.renderChart(this.data, {
            responsive: true,
            maintainAspectRatio: false,
          });
        });
    }
  },
  mounted() {
    this.getCount;
  },
  methods: {
    
  },
};
</script>