<template>
    <div>
        <category-control 
            :showEditCategories="showEditCategories"
            @toggleEditCategories="showEditCategories =! showEditCategories"
        />
        <category-list
            :categories="categories"
        />
    </div>
</template>

<script>
    import CategoryControl from './CategoryControl.vue'
    import CategoryList from './CategoryList.vue'

    export default {
        components: { 
            CategoryControl,
            CategoryList,
        },
        props: {
            categories: Object,
        },
        data() {
            return {
                showEditCategories: false
            }
        },
            
    }
</script>

<style lang="scss" scoped>

</style>