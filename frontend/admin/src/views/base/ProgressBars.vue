<template>
  <div>
    <CCard>
      <CCardHeader>
        <CIcon name="cil-justify-center" />
        <strong> Bootstrap Progress</strong>
        <div class="card-header-actions">
          <a
            class="card-header-action"
            href="https://coreui.io/vue/docs/components/progress"
            rel="noreferrer noopener"
            target="_blank"
          >
            <small class="text-muted">docs</small>
          </a>
        </div>
      </CCardHeader>
      <CCardBody>
        <CProgress
          :max="max"
          :value="counter"
          animated
          show-percentage
        ></CProgress>
        <CProgress :max="max" class="mt-1" show-value>
          <CProgressBar :value="counter * (6 / 10)" color="gradient-success" />
          <CProgressBar
            :value="counter * (2.5 / 10)"
            color="gradient-warning"
          />
          <CProgressBar :value="counter * (1.5 / 10)" color="gradient-danger" />
        </CProgress>
        <CButton class="mt-4" color="secondary" @click="clicked">
          Click me to animate progress bars
        </CButton>
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <CIcon name="cil-justify-center" />
        <strong> Progress </strong><small>labels</small>
      </CCardHeader>
      <CCardBody>
        <h6>No label</h6>
        <CProgress :max="max2" :value="value" class="mb-3" />
        <h6>Value label</h6>
        <CProgress :max="max2" :value="value" class="mb-3" show-value />
        <h6>Progress label</h6>
        <CProgress :max="max2" :value="value" class="mb-3" show-percentage />
        <h6>Value label with precision</h6>
        <CProgress
          :max="max2"
          :precision="2"
          :value="value"
          class="mb-3"
          show-value
        />
        <h6>Progress label with precision</h6>
        <CProgress
          :max="max2"
          :precision="2"
          :value="value"
          class="mb-3"
          show-percentage
        />
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <CIcon name="cil-justify-center" />
        <strong> Progress </strong>
        <small>width</small>
      </CCardHeader>
      <CCardBody>
        <h6>Default width</h6>
        <CProgress :value="value3" class="mb-3" />
        <h6>Custom widths</h6>
        <CProgress :value="value3" class="w-75 mb-2" />
        <CProgress :value="value3" class="w-50 mb-2" />
        <CProgress :value="value3" class="w-25" />
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <CIcon name="cil-justify-center" />
        <strong> Progress </strong>
        <small>height</small>
      </CCardHeader>
      <CCardBody>
        <h6>Default height</h6>
        <CProgress :value="value3" class="mb-3" show-percentage />
        <h6>Custom heights</h6>
        <CProgress :value="value3" class="mb-2" show-percentage size="xs" />
        <CProgress :value="value3" class="mb-2" show-percentage size="sm" />
        <CProgress
          :value="value3"
          class="mb-2"
          show-percentage
          style="height:2rem"
        />
        <CProgress
          :value="value3"
          class="mb-2"
          show-percentage
          style="height:20px"
        />
        <CProgress :value="value3" style="height:2px" />
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <CIcon name="cil-justify-center" />
        <strong> Progress </strong>
        <small>colors</small>
      </CCardHeader>
      <CCardBody>
        <div v-for="(bar, index) in bars" :key="index" class="row mb-1">
          <div class="col-sm-2">{{ bar.color }}:</div>
          <div class="col-sm-10 pt-1">
            <CProgress :key="bar.color" :color="bar.color" :value="bar.value" />
          </div>
        </div>
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <CIcon name="cil-justify-center" />
        <strong> Progress </strong>
        <small>striped</small>
      </CCardHeader>
      <CCardBody>
        <CProgress
          :striped="striped"
          :value="25"
          class="mb-2"
          color="success"
        />
        <CProgress :striped="striped" :value="50" class="mb-2" color="info" />
        <CProgress
          :striped="striped"
          :value="75"
          class="mb-2"
          color="warning"
        />
        <CProgress
          :striped="striped"
          :value="100"
          class="mb-2"
          color="danger"
        />
        <CButton color="secondary" @click="striped = !striped">
          {{ striped ? "Remove" : "Add" }} Striped
        </CButton>
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <CIcon name="cil-justify-center" />
        <strong> Progress </strong>
        <small>animated</small>
      </CCardHeader>
      <CCardBody>
        <CProgress
          :animated="animate"
          :value="25"
          class="mb-2"
          color="success"
          striped
        />
        <CProgress
          :animated="animate"
          :value="50"
          class="mb-2"
          color="info"
          striped
        />
        <CProgress
          :animated="animate"
          :value="75"
          class="mb-2"
          color="warning"
          striped
        />
        <CProgress
          :animated="animate"
          :value="100"
          class="mb-3"
          color="danger"
        />
        <CButton color="secondary" @click="animate = !animate">
          {{ animate ? "Stop" : "Start" }} Animation
        </CButton>
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <CIcon name="cil-justify-center" />
        <strong> Progress </strong>
        <small>multiple bars</small>
      </CCardHeader>
      <CCardBody>
        <CProgress :max="max3" class="mb-3">
          <CProgressBar :value="values[0]" color="gradient-primary" />
          <CProgressBar :value="values[1]" color="gradient-success" />
          <CProgressBar :value="values[2]" color="gradient-info" />
        </CProgress>
        <CProgress :max="max3" class="mb-3" show-percentage>
          <CProgressBar :value="values[0]" color="gradient-primary" />
          <CProgressBar :value="values[1]" color="gradient-success" />
          <CProgressBar :value="values[2]" color="gradient-info" />
        </CProgress>
        <CProgress :max="max3" class="mb-3" show-value striped>
          <CProgressBar :value="values[0]" color="gradient-primary" />
          <CProgressBar :value="values[1]" color="gradient-success" />
          <CProgressBar :value="values[2]" color="gradient-info" />
        </CProgress>
        <CProgress :max="max3" class="mb-3">
          <CProgressBar
            :value="values[0]"
            color="gradient-primary"
            show-percentage
          />
          <CProgressBar
            :value="values[1]"
            animated
            color="success"
            show-percentage
          />
          <CProgressBar
            :value="values[2]"
            color="gradient-info"
            show-percentage
            striped
          />
        </CProgress>
      </CCardBody>
    </CCard>
  </div>
</template>

<script>
export default {
  name: "ProgressBars",
  data() {
    return {
      counter: 73,
      max: 100,
      max2: 50,
      value: 33.333333333,
      value3: 75,
      bars: [
        { color: "gradient-success", value: 75 },
        { color: "gradient-info", value: 75 },
        { color: "gradient-warning", value: 75 },
        { color: "gradient-danger", value: 75 },
        { color: "gradient-primary", value: 75 },
        { color: "gradient-secondary", value: 75 },
        { color: "gradient-dark", value: 75 }
      ],
      timer: null,
      striped: true,
      animate: true,
      max3: 100,
      values: [15, 30, 20]
    };
  },
  methods: {
    clicked() {
      this.counter = Math.random() * this.max;
    }
  },
  mounted() {
    this.timer = setInterval(() => {
      this.bars.forEach(bar => {
        bar.value = 25 + Math.random() * 75;
      });
    }, 2000);
  },
  beforeDestroy() {
    clearInterval(this.timer);
    this.timer = null;
  }
};
</script>
