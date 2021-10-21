<template>
    <ul class="list-disc list-inside mt-2 text-sm text-red-500" v-if="errors">
        <!-- <li v-for="(error, index) in errors" :key="index">{{ error }}</li> -->
        <li> {{ errors }} </li>
    </ul>
</template>

<script>
    export default {
        props: ['errors']
    }
</script>

<style lang="scss" scoped>

</style>