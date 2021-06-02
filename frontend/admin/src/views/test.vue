<template>
    <div>
        <button @click="test()">test</button>
    </div>
</template>

<script>
export default {
    data() {
        return {}
    },

    methods: {
        test() {
            this.$store.dispatch('customer/test').then(res => {
                window.location.replace(res.data);
            })
        }
    }
}
</script>