<template>
    <div>
        <div class="md:flex md:items-center">
            <div class="md:w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                <slot name="label"/>
            </div>
            <div class="md:w-2/3">
                <slot name="input"/>
            </div>
        </div>
        <div class="mt-3 float-right">
            <slot name="buttons" />
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>

