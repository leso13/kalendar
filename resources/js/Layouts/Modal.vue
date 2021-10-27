<template>
    <div class="fixed text-gray-500 flex items-center justify-center overflow-auto left-0 right-0 top-0 bottom-0 bg-gray-600 bg-opacity-60 backdrop-filter backdrop-blur-xs" >
        <div class="bg-gray-100 rounded-xl shadow-lg p-6 mx-4 w-auto modal-min-width">
            <!-- Modal Heading -->
            <header class="text-2xl mb-5 font-bold text-gray-800">
                <slot name="header" />
            </header>
            <!-- Modal Body -->
            <div>
                <slot />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       
    }
</script>

<style lang="css" scoped>
    .modal-min-width {
        min-width: 40%;
    }
</style>