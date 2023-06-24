<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link ,router} from '@inertiajs/vue3';
import { ref, watch  } from 'vue';

defineProps({
    notes: Array,
});

const q = ref('');  

watch(q, (value) => {
  router.get( route( 'notes.index', { q: value } ), {}, { preserveState: true } );
});

</script>

<template>
    <AppLayout title="Notes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
                Notes
                <Link :href="route('notes.create')" class="px-2 py-1 rounded-md  text-sm text-white bg-indigo-600">Create
                </Link>
            </h2>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="py-4 px-2 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <input type="text" class="form-input rounded-md shadow-sm w-full" placeholder="Buscar..." v-model="q">
                </div>
            </div>
        </div>

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date</th>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Excerpt</th>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Content</th>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Options</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="note in notes">
                                <td class="px-6 py-4 whitespace-nowrap">{{ note.updated_at }}</td>
                                <td class="px-6 py-4">{{ note.excerpt }}</td>
                                <td class="px-6 py-4">{{ note.content }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <Link :href="route('notes.edit', note.id)"
                                        class="text-indigo-600 hover:text-indigo-900">Editar</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </AppLayout>
</template>