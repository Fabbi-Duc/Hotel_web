<script>
import { Line } from "vue-chartjs";

export default {
  extends: Line,
  data() {
    return {
      gradient: null,
      gradient2: null,
    };
  },
  mounted() {
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

    this.renderChart(
      {
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
            label: "Nomal Single",
            borderColor: "#FC2525",
            pointBackgroundColor: "white",
            borderWidth: 2,
            pointBorderColor: "#FC2525",
            backgroundColor: this.gradient,
            data: [40, 39, 10, 40, 39, 80, 40, 50, 60, 50, 30, 42, 80],
          },
          {
            label: "Nomal Double",
            borderColor: "#05CBE1",
            pointBackgroundColor: "white",
            pointBorderColor: "#05CBE1",
            borderWidth: 2,
            backgroundColor: this.gradient2,
            data: [60, 55, 32, 10, 2, 12, 53, 50, 60, 90, 100, 42, 80],
          },
          {
            label: "Vip Single",
            borderColor: "#f9b115",
            pointBackgroundColor: "white",
            pointBorderColor: "#f9b115",
            borderWidth: 2,
            backgroundColor: this.gradient3,
            data: [34, 35, 62, 20, 21, 72, 53, 40, 90, 120, 100, 92, 30],
          },
          {
            label: "Vip Double",
            borderColor: "rgb(4, 147, 114)",
            pointBackgroundColor: "white",
            pointBorderColor: "rgb(4, 147, 114)",
            borderWidth: 2,
            backgroundColor: this.gradient4,
            data: [24, 85, 32, 40, 76, 42, 59, 30, 70, 20, 80, 42, 18],
          }
        ],
      },
      { responsive: true, maintainAspectRatio: false }
    );
  },
};
</script>