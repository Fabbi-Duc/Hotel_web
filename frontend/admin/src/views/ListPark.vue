<template>
  <div>
    <div class="d-flex position-relative" style="width: 700px">
      <div style="width: 200px">
        <label for="">Type</label>
        <b-form-select
          class="type__select form-control col"
          v-model="type"
          :options="typeOptions"
        />
      </div>
      <div style="width: 200px; margin-left: 20px">
        <label for="">Floor</label>
        <b-form-select
          class="type__select form-control col"
          v-model="floor"
          :options="floorOptions"
        />
      </div>
      <button
        @click="search()"
        style="
          margin-left: 20px;
          width: 100px;
          height: 30px;
          right: 120px;
          bottom: 2px;
        "
        class="btn-info position-absolute"
      >
        Search
      </button>
      <button
        style="
          margin-left: 20px;
          width: 100px;
          height: 30px;
          right: 0;
          bottom: 2px;
        "
        class="btn-success position-absolute"
        @click="createPark()"
      >
        Create
      </button>
    </div>
    <div class="list-park row mt-3">
      <div class="col-3" v-for="(park, index) in listPark" :key="index">
        <div class="park" :class="{
          'empty': park.status == 1,
          'hired': park.status == 2,
          'not-empty': park.status == 3,
        }"/>
        <div class="d-flex justify-content-center align-item-center mt-3">
          <span class="mr-3 mb-0">{{ park.name }}</span>
        </div>
      </div>
    </div>
    <b-modal ref="modal" title="Using Component Methods" centered hide-footer>
      <CreatePark @closeModal="closeModal()"/>
    </b-modal>
  </div>
</template>

<script>
import CreatePark from "./CreatePark"
export default {
  components: {
    CreatePark
  },
  data() {
    return {
      listPark: null,
      type: 1,
      floor: 1,
      typeOptions: [
        { value: 1, text: "Mobile" },
        { value: 2, text: "Car" },
      ],
      floorOptions: [
        { value: 1, text: "G1" },
        { value: 2, text: "G2" },
      ],
    };
  },

  created() {
    this.getListPark();
  },
  methods: {
    async getListPark() {
      const data = {
        type: this.type,
        floor: this.floor,
      };
      await this.$store.dispatch("customer/listPark", data).then((res) => {
        this.listPark = res.data;
      });
    },
    async search() {
      this.getListPark();
    },
    createPark() {
      this.$refs['modal'].show();
    },
    closeModal() {
      this.$refs['modal'].hide();
    }
  },
};
</script>

<style lang="scss" scoped>
.park {
  height: 200px;
}
.empty {
  border: 2px solid black;
}
.hired {
  border: 2px solid yellow
}
.not-empty {
  border: 2px solid red
}
</style>
