<script>
import { Bar } from "vue-chartjs";

export default {
  extends: Bar,
  data() {
    return {
      chartData: {
        labels: [
          "2021-01",
          "2021-02",
          "2021-03",
          "2021-04",
          "2021-05",
          "2021-06",
          "2021-07",
          "2021-08",
          "2021-09",
          "2021-10",
          "2021-11",
          "2021-12",
        ],
        datasets: [
          {
            label: "Doanh thu",
            borderWidth: 1,
            backgroundColor: [
              "rgba(255, 99, 132, 0.2)",
              "rgba(54, 162, 235, 0.2)",
              "rgba(255, 206, 86, 0.2)",
              "rgba(75, 192, 192, 0.2)",
              "rgba(153, 102, 255, 0.2)",
              "rgba(255, 159, 64, 0.2)",
              "rgba(255, 99, 132, 0.2)",
              "rgba(54, 162, 235, 0.2)",
              "rgba(255, 206, 86, 0.2)",
              "rgba(75, 192, 192, 0.2)",
              "rgba(153, 102, 255, 0.2)",
              "rgba(255, 159, 64, 0.2)",
            ],
            borderColor: [
              "rgba(255,99,132,1)",
              "rgba(54, 162, 235, 1)",
              "rgba(255, 206, 86, 1)",
              "rgba(75, 192, 192, 1)",
              "rgba(153, 102, 255, 1)",
              "rgba(255, 159, 64, 1)",
              "rgba(255,99,132,1)",
              "rgba(54, 162, 235, 1)",
              "rgba(255, 206, 86, 1)",
              "rgba(75, 192, 192, 1)",
              "rgba(153, 102, 255, 1)",
              "rgba(255, 159, 64, 1)",
            ],
            pointBorderColor: "#2554FF",
            data: [],
          },
        ],
      },
      options: {
        scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true,
              },
              gridLines: {
                display: true,
              },
            },
          ],
          xAxes: [
            {
              gridLines: {
                display: false,
              },
            },
          ],
        },
        legend: {
          display: true,
        },
        responsive: true,
        maintainAspectRatio: false,
      },
    };
  },
  async created() {
    await this.getRevenueByMonthOne();
  },
  methods: {
    async getRevenueByMonthOne() {
      let dataTime = [
        "2021-01-12",
        "2021-02-12",
        "2021-03-12",
        "2021-04-12",
        "2021-05-12",
        "2021-06-12",
        "2021-07-12",
        "2021-08-12",
        "2021-09-12",
        "2021-10-12",
        "2021-11-12",
        "2021-12-12",
      ];
      for (let i = 0; i < dataTime.length; i++) {
        const params = {
          dt: dataTime[i],
        };
        await this.$store
          .dispatch("bills/getRevenueByMonth", params)
          .then((response) => {
            this.chartData.datasets[0].data.push(parseInt(response.revenue));
          });
      }
      this.renderChart(this.chartData, this.options);
    },
  },
};
</script>