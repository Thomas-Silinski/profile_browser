<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link, useForm} from "@inertiajs/vue3";
import StarForm from "@/Components/StarForm.vue";

const props = defineProps({
    star: Object,
    can: Object,
});

const form = useForm({
    firstname: props.star.firstname,
    lastname: props.star.lastname,
    image_url: props.star.image_url,
    description: props.star.description,
});
</script>

<template>
    <AppLayout title="Stars Index">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <Link v-if="can.viewAny" :href="route('stars.index')" class="btn btn-green">
                Retour aux SuperStars
            </Link>
        </div>

        <hr>

        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.put(route('stars.update', star.id), { onSuccess: () => form.reset() })">
                <StarForm :form="form"/>

                <button class="btn btn-green mt-2">Modifier la Star</button>
            </form>
        </div>
    </AppLayout>
</template>
