<script setup>
import {router, Link} from "@inertiajs/vue3";

defineProps({
    star: Object,
});

const deleteStar = (starID) => {
    router.delete(route('stars.destroy', starID), {
        onBefore: () => confirm('Are you sure you want to delete this Super Star?'),
        onFinish: () => location.reload()
    });
}
</script>

<template>
    <div class="p-4">

        <div class="profil">
            <img :src="star.image_url" :alt="star.full_name" class="rounded drop-shadow-2xl" width="100">
        </div>
        <p style="text-align: justify;">
            {{ star.description }}
        </p>
        <div class="mt-8">
            <Link v-if="star.can.edit" class="btn btn-blue mr-2 ml-0" :href="route('stars.edit', star.id)">Éditer️</Link>
            <button v-if="star.can.delete" @click="deleteStar(star.id)" class="btn btn-red mx-2">Supprimer</button>
        </div>
    </div>
</template>
