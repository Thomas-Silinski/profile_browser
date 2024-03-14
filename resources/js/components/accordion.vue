<script setup>
defineProps({
    title: String,
    isOpen: Boolean,
});
</script>

<template>
    <div class="rounded-t-1">
        <h5 class="mb-0">
            <button @click="isOpen = !isOpen"
                    class="relative flex items-center w-full p-4 font-semibold text-left transition-all border-b border-solid cursor-pointer border-slate-100 ease-soft-in text-slate-700 rounded-t-1">
                {{ title }}
                <i v-if="!isOpen" class="absolute right-0 pt-1 mr-4 not-italic font-bold">+</i>
                <i v-else class="absolute right-0 pt-1 mr-4 not-italic font-bold">-</i>
            </button>
        </h5>
        <div class="p-4 leading-normal text-sm opacity-80" v-bind:class="{hidden: !isOpen}">
            <slot/>
        </div>
    </div>
</template>
