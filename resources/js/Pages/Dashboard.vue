<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="w-full flex justify-between items-center mb-3 mt-1 pl-3">
                            <div v-if="page !=='show'" class="w-full grid grid-cols-2">
                                <div>
                                    <h3 class="text-lg font-semibold text-slate-800">Animals</h3>
                                </div>
                                <div class="flex flex-row-reverse">
                                    <button @click="addAnimal()" class="right-button text-green-500 hover:text-green-700 
                                         px-2 py-1 rounded-lg border border-green-500 hover:bg-green-100 ml-2">Ajouter
                                    </button>
                                </div>
                            </div>
                        </div> 
                        <div v-if="page === 'show'"><AnimalShow :id="id" @return="goBack"/></div>
                        <div v-else><AnimalsTab @editAnimal="showAnimal"/></div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AnimalsTab from './Auth/AnimalsTab.vue';
import AnimalShow from './Auth/AnimalShow.vue';

export default {
    name: 'Dashboard',
    components: {
        AnimalsTab,
        AnimalShow
    },
    data() {
        return {
            page: null,
            id: null
        };
    },
    methods: {
        addAnimal(){
            this.page = "show"
            this.id = null
        },
        goBack(){
            this.page = "null"
        },
        showAnimal(id){
            this.page = "show"
            this.id = id
        }
    }
};
</script>