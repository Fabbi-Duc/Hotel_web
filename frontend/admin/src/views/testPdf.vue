<template>
  <div>
    <div class="content text-center">
      <h2>Biên lai nhập hàng </h2>
      <br><br><br>
      <p class="text-right">Ngày nhập: 10/10/2021</p>
      <b-table :items="items" :fields="fields" :tbody-tr-class="rowClass" bordered></b-table>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        fields: ['first_name', 'last_name', 'age'],
        items: [
          { age: 40, first_name: 'Dickerson', last_name: 'Macdonald', status: 'awesome' },
          { age: 21, first_name: 'Larsen', last_name: 'Shaw' },
          { age: 89, first_name: 'Geneva', last_name: 'Wilson' }
        ]
      }
    },
    methods: {
      rowClass(item, type) {
        if (!item || type !== 'row') return
        if (item.status === 'awesome') return 'table-success'
      }
    }
  }
</script>