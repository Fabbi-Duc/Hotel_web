<template>
  <div class="clean-list">
    <div class="row">
      <div 
        class="col-3 list-clean"
        v-for="(list, index) in listClean"
        :key="index"
      >
        <img :src="list.image_url" alt="" class="image">
        <div class="text-center name d-flex justify-content-center align-items-center mt-3">
          P{{ list.name }}
          <button class="btn-info ml-3" @click="clean(list.room_id)">Xác nhận dọn</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      listClean: [],
    }
  },
  created() {
    this.getListClean();
  },
  methods: {
    async getListClean() {
      await this.$store.dispatch('customer/listClean').then(res => {
        this.listClean = res.data;
      })
    },
    async clean(room_id) {
      await this.$store.dispatch('customer/updateClean', room_id).then(() => {
        window.location.reload();
      })
    }
  }
}
</script>
<style lang="scss" scoped>
.list-clean {
  width: 100%;
  height: 200px;
  margin-bottom: 30px;
  margin-top: 30px;
}
.image {
  width: 100%;
  height: 100%;
}
.name {
  font-size: 15px;
}
</style>
