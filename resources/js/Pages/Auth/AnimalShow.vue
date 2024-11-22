<template>
  <div>
      <button class="text-blue-500 hover:text-blue-700 px-2 py-1 rounded-lg border border-blue-500 hover:bg-blue-100"
          @click="goBack">Retour</button>
  </div>
  <div class="max-w-lg mx-auto p-6 bg-white rounded shadow-md">
    <h2 class="text-2xl font-semibold text-center mb-6">{{ titre }}</h2>
     <div class="text-lg text-center mb-4" v-html="message"></div>
    <!-- Formulaire -->
    <form @submit.prevent="submitForm" > 
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
        <input type="text" id="name" v-model="animal.name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required />
      </div>

      <div class="mb-4">
        <label for="age" class="block text-sm font-medium text-gray-700">Âge</label>
        <input type="number" min="0" id="age" v-model="animal.age" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required />
      </div>

      <!-- Liste déroulante pour le type -->
      <div class="mb-4">
        <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
        <select id="type" v-model="animal.type" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
          <option v-for="type in animalTypes" :value="type">
            {{ type }}
          </option>
        </select>
      </div>

      <!-- Liste déroulante pour la race -->
      <div class="mb-4">
        <label for="race" class="block text-sm font-medium text-gray-700">Race</label>
        <select id="race" v-model="animal.race" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
          <option v-for="race in animalRaces" :value="race">
            {{ race }}
          </option>
        </select>
      </div>

      <div class="mb-6">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea id="description" v-model="animal.description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
      </div>


      <!-- Liste déroulante pour la race -->
      <div class="mb-4">
        <label for="statut" class="block text-sm font-medium text-gray-700">Statut</label>
        <select id="statut" v-model="animal.isSaled" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
          <option value='0'> Disponible </option>
          <option value='1'> Vendu </option>
        </select>
      </div>

      <div class="mb-4">
        <label for="prixHt" class="block text-sm font-medium text-gray-700">Prix Ht</label>
        <input type="number" id="prixHt" min="0" v-model="animal.prixHt" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required />
      </div>

      <div class="mb-4">
        <label for="image1" class="block text-sm font-medium text-gray-700">
          Image 1 <span v-if="animal.image1" class="italic block text-xs font-medium text-gray-700">(Image existante)</span>
        </label>
        <input id="image1" name="image1" type="file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
      </div>

      <div class="mb-4">
        <label for="image2" class="block text-sm font-medium text-gray-700">
          Image 2 <span v-if="animal.image2" class="italic block text-xs font-medium text-gray-700">(Image existante)</span>
        </label>
        <input  id="image2" name="image2" type="file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
      </div>

      <div class="flex items-center justify-center">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
          Sauvegarder
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
	  name: 'AnimalShow',
    emits: ['return'],
    props: {
        id: Number
    },
  	data() {
      	return {
        		animalRaces:[
        			'labrador',
        			'frison',
        			'pottok',
        			'irish cob',
        			'merinos',
        			'solognotes'
        		],
        		animalTypes:[
        			'chien',
        			'cheval',
        			'brebis',
        			'cochon'
        		],
          	animal: {
            	name: '',
            	age: '',
            	type: '',
            	race: '',
            	description: '',
              isSaled: false,
              prixHt:'',
              image1:null,
              image2:null
        	  },
            titre: "Formulaire d'ajout animal",
            message: null,
        };
  	},
    created(){
        if(this.id != null){
            this.titre = "Edition de l'animal";
            this.getAnimalById();
        }
    },
  	methods: {
        goBack(){
            this.$emit('return');
        },

  	    async submitForm() {
            if(this.id === null){
              const formData = new FormData();
              formData.append('name', this.animal.name);
              formData.append('age', this.animal.age);
              formData.append('race', this.animal.race);
              formData.append('type', this.animal.type);
              formData.append('description', this.animal.description);
              formData.append('isSaled', this.animal.isSaled);
              formData.append('prixHt', this.animal.prixHt);

              let image1 = document.querySelector('input[name="image1"]').files[0] != null ? document.querySelector('input[name="image1"]').files[0] : '';
              let image2 = document.querySelector('input[name="image2"]').files[0] != null ? document.querySelector('input[name="image2"]').files[0] : '';

              formData.append('image1', image1);
              formData.append('image2', image2);

              axios.post('api/animals', formData)
                .then(response => {
                    this.message = "<span style='color:green; background:lightgreen'>Création de l'animal " + this.animal.name +" réussite.</span>";
                    this.resetForm();
                })
                .catch(error => {
                    console.error('Erreur lors de l\'ajout de l\'animal:', error);
                });

            } else {
              axios.put('api/animals/' + this.id , this.animal)
                .then(response => {
                    this.message = "<span style='color:green; background:lightgreen'>Mise à jour de l'animal " + this.animal.name +" réussite.</span>";
                })
                .catch(error => {
                  console.error('Erreur lors de la mise à jour de l\'animal:', error);
                });
            }
        },

        getAnimalById(){
          axios.get('api/animals/'+ this.id)
          .then((response) => {
            this.animal = response.data;
            if(this.animal.isSaled){
              this.animal.isSaled = '1';
            } else {
              this.animal.isSaled = '0';
            }
          })
          .catch((error) => {
            console.error('Il y a eu une erreur lors de la récupération des données:', error);
          });
        },

  	    resetForm() {
          this.animal = {
            name: '',
            age: '',
            type: '',
            race: '',
            description: '',
            isSaled: '',
            prixHt:'',
            image1:null,
            image2:null
          }
  	    }
	  }
};
</script>