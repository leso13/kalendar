<template>
    <label class="h-6 w-full rounded-full cursor-pointer hover:bg-opacity-100 shadow-lg"
         :class="isChecked ? 'bg-opacity-80 bg-' + value + '-500' : 'bg-opacity-30 bg-' + value + '-500'"
    >
        <input class="sr-only" type="radio" :checked="isChecked" :name="name" :value="value" @change="$emit('update:modelValue', $event.target.value)" />
    </label>
</template>

<script>
    export default {
        emits: ['update:modelValue'],
        props: ['modelValue', 'value', 'name'],

        computed: {
            isChecked: {
                cache: false,
                get: function () {
                    return this.modelValue == this.value 
                }
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>