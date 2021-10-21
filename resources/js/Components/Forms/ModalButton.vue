<template>
    <button :type="type" class="inline-flex items-center px-4 py-0.5 rounded-full border border-transparent font-bold text-sm active:bg-red-900 focus:outline-none focus:shadow-outline-gray transition ease-in-out duration-150">
        <slot />
    </button>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: 'submit',
        },
    }
}
</script>
