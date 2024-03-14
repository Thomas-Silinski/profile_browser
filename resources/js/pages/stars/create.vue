<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link, useForm} from "@inertiajs/vue3";
import StarForm from "@/Components/StarForm.vue";

defineProps({
    can: Object,
});

const form = useForm({
    firstname: '',
    lastname: '',
    image_url: '',
    description: '',
});
</script>

<template>
    <AppLayout title="Stars Index">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <Link v-if="can.viewAny" class="btn btn-green" href="/stars">
                Retour aux SuperStars
            </Link>
        </div>

        <hr>

        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('stars.store'), { onSuccess: () => form.reset() })">
                <StarForm :form="form"/>

                <button class="btn btn-green mt-2">Créer la Star</button>
            </form>
        </div>
    </AppLayout>
</template>
