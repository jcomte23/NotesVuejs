<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3'

const props = defineProps({ note: Object });

const form = useForm({
    excerpt: props.note.excerpt,
    content: props.note.content
});
</script>

<template>
    <AppLayout title="Notes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Notes
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Link :href="route('notes.index')" class="text-indigo-600 hover:text-indigo-900">Volver</Link>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form class="px-3 py-2">
                        <label>excerpt</label>
                        <textarea v-model="form.excerpt" class="form-input w-full rounded-md shadow-sm">
                        </textarea>

                        <label>content</label>
                        <textarea v-model="form.content" rows="8" class="form-input w-full rounded-md shadow-sm">
                        </textarea>

                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Editar</button>
                    </form>
                </div>
            </div>
        </div>

    </AppLayout>
</template>