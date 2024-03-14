<script setup>
import InputText from "../components/inputText.vue";
import InputError from "../components/inputError.vue";

defineProps({
    form: Object,
});
</script>

<template>
    <div class="mt-4">
        <InputText v-model="form.firstname" placeholder="Prénom"/>
        <InputError :message="form.errors.firstname" class="mt-2"/>
    </div>

    <div class="mt-4">
        <InputText v-model="form.lastname" placeholder="Nom"/>
        <InputError :message="form.errors.lastname" class="mt-2"/>
    </div>

    <div class="mt-4">
        <InputText v-model="form.image_url" placeholder="Image URL"/>
        <InputError :message="form.errors.image_url" class="mt-2"/>
    </div>

    <div class="mt-4">
        <InputText v-model="form.description" placeholder="Description"/>
        <InputError :message="form.errors.description" class="mt-2"/>
    </div>
</template>
