<template>
    <div class="text-lg" v-html="message"></div>
    <div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
        <table class="w-full text-left table-auto min-w-max">
            <thead>
                <tr class="border-b border-slate-300 bg-slate-50">
                  <th v-for="champ in headerAnimals" class="p-4 text-sm font-normal leading-none text-slate-500"> {{champ}}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="animal in animals" :key="animal.id" class="hover:bg-gray-50">
                    <td class="p-4 border-b border-slate-200 py-5">{{ animal.name }}</td>
                    <td class="p-4 border-b border-slate-200 py-5">{{ animal.age }}</td>
                    <td class="p-4 border-b border-slate-200 py-5">{{ animal.type }}</td>
                    <td class="p-4 border-b border-slate-200 py-5">{{ animal.race }}</td>
                    <td class="p-4 border-b border-slate-200 py-5  w-64 line-clamp-3">{{ animal.description }}</td>
                    <td class="p-4 border-b border-slate-200 py-5">
                        <span v-if="animal.isSaled" class="text-red-600">Vendu</span>
                        <span v-else class="text-green-600">Disponible</span>
                    </td>
                    <td class="p-4 border-b border-slate-200 py-5">{{ animal.prixHt }}</td>
                    <td v-if="animal.image1 !== null" class="p-4 border-b border-slate-200 py-5">
                        <img class="w-40 h-40":src="getAnimalImageSrc(animal.image1)" alt="image 1" />
                    </td>
                    <td v-else-if="animal.image2 !== null && animal.image1 === null " class="p-4 border-b border-slate-200 py-5">
                        <img class="w-40 h-40":src="getAnimalImageSrc(animal.image2)" alt="image 2" />
                    </td>
                    <td v-else class="p-4 border-b border-slate-200 py-5">
                        Pas de photo
                    </td>
                    <td class="p-4 border-b border-slate-200 py-5">
                        <button @click="editAnimal(animal.id)" class="text-blue-500 hover:text-blue-700 
                            px-2 py-1 rounded-lg border border-blue-500 hover:bg-blue-100">Editer
                        </button>
                        <button @click="deleteAnimal(animal.id, animal.name)" class="text-red-500 hover:text-red-700 
                            px-2 py-1 rounded-lg border border-red-500 hover:bg-red-100 ml-2">Supprimer
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
     </div>
</template>

<script>
export default {
    name: 'AnimalsTab',
    emits: ['editAnimal'],
    data() {
        return {
        animals: [],
        headerAnimals: [
            'Nom',
            'Age',
            'Type',
            'Race',
            'Description',
            'Statut',
            'Prix Ht',
            'Photo',
            'Actions'
        ],
        message: null
        };
    },
  mounted() {
    this.fetchAnimals();
  },
  methods: {
    getAnimalImageSrc(imageFileName) {
        return `${window.storageUrl}/${imageFileName}`;
    },
    async fetchAnimals() {
      try {
        const response = await axios.get('api/animals');
        this.animals = response.data;
      } catch (error) {
        console.error("Erreur lors de la récupération des animaux:", error);
      }
    },
    editAnimal(id) {
         this.$emit('editAnimal', id);
    },
    async deleteAnimal(id, name){
        if (confirm('Êtes-vous sûr de vouloir supprimer cet animal ?')) {
            try {
                   const response = await axios.delete(`api/animals/${id}`);
                  if (response.status === 200) {
                    this.animals = this.animals.filter(animal => animal.id !== id);
                    this.message = "<span style='color:green; background:lightgreen'>Supression de l'animal " + name +" réussite.</span>";
                  }
                } catch (error) {
                    console.error('Erreur lors de la suppression de l\'animal:', error);
                    this.message = "<span style='color:red; background:darkred'>Supression de l'animal " + name +" raté.</span>";
                }
        }
    }
  }
};
</script>
