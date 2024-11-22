<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Site de vente d'animaux" />
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img
            id="background"
            class="absolute -left-20 top-0 max-w-[877px]"
            src="https://laravel.com/assets/img/welcome/background.svg"
        />
        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header
                    class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3"
                >
                    <div class="flex lg:col-start-2 lg:justify-center">
                        <svg
                            class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]"
                            viewBox="0 0 62 65"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z"
                                fill="currentColor"
                            />
                        </svg>
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="mt-6">
                    <div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
                        <div class="flex m-4">
                            <label for="type" class="mr-4 mt-2">Type</label>
                                <select id="type" v-model="filterType" class="ml-4" >
                                    <option value=""></option>
                                    <option v-for="type in animalTypes" :value="type">
                                        {{ type }}
                                    </option>
                                </select>
                            <label for="race" class="mr-4 ml-4 mt-2">Race</label>
                                <select id="race" v-model="filterRace" class="ml-4" >
                                    <option value=""></option>
                                    <option v-for="race in animalRaces" :value="race">
                                        {{ race }}
                                    </option>
                            </select>
                        </div>

                        <table class="w-full text-left table-auto min-w-max">
                            <thead>
                                <tr class="border-b border-slate-300 bg-slate-50">
                                    <th @click="sortAnimals(champ)" v-for="champ in headerAnimals" class="p-4 text-sm font-normal leading-none items-center cursor-pointer  text-slate-500">
                                       {{champ}} <span class="font-bold ml-4">V</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody v-for="animal in animals" :key="animal.id">
                                <tr v-if="animal.show === true" class="hover:bg-gray-50">
                                    <td class="p-4 border-b border-slate-200 py-5">{{ animal.name }}</td>
                                    <td class="p-4 border-b border-slate-200 py-5">{{ animal.age }}</td>
                                    <td class="p-4 border-b border-slate-200 py-5">{{ animal.type }}</td>
                                    <td class="p-4 border-b border-slate-200 py-5">{{ animal.race }}</td>
                                    <td class="p-4 border-b border-slate-200 py-5 w-64 line-clamp-3">{{ animal.description }}</td>
                                    <td class="p-4 border-b border-slate-200 py-5">{{ animal.prixTTC.toFixed(2) }} €</td>
                                    <td v-if="animal.image1 !== null" class="p-4 border-b border-slate-200 py-5">
                                        <img class="w-40 h-40":src="getAnimalImageSrc(animal.image1)" alt="image 1" />
                                    </td>
                                    <td v-else-if="animal.image2 !== null && animal.image1 === null " class="p-4 border-b border-slate-200 py-5">
                                        <img class="w-40 h-40":src="getAnimalImageSrc(animal.image2)" alt="image 2" />
                                    </td>
                                    <td v-else class="p-4 border-b border-slate-200 py-5">
                                        Pas de photo
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                     </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70"> Test - Corentin Leveque 2024 </footer>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    name: 'welcome',
    data() {
        return {
            animals: [],
            headerAnimals: [
                'Nom',
                'Age',
                'Type',
                'Race',
                'Description',
                'Prix ttc',
                'Photo',
            ],
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
            message: null,
            tauxTVA: 0.20,
            filterRace: '',
            filterType: ''
        };
    },
    watch: {
        filterRace(newValue, oldValue) {
            this.filterField('race', newValue);
        },
        filterType(newValue, oldValue) {
            this.filterField('type', newValue);
        },
    },
    mounted() {
        this.fetchAnimals();
    },
    methods: {
        sortAnimals(key) {
            if(key === 'Prix ttc'){
                key = 'prixTTC';
            }
            key = key.toLowerCase();
            this.animals.sort((a, b) => {
                if (a[key] < b[key]) return -1;
                if (a[key] > b[key]) return 1;
                return 0;
            });
        },
        filterField(field, newValue) {
            if (this.filterRace === '' && this.filterType === '') {
                this.noFilter();
            } 
            else if (newValue !== '' && this[`filter${field === 'race' ? 'type' : 'race'}`] !== '') {
                this.filterRaceAndType(field, newValue);
            }
            else if (newValue != '' && this.filterType != '' &&  this.filterRace === ''
                    || newValue != '' && this.filterRace != '' &&  this.filterType === ''
                ) {    
                this.oneFilter(field, newValue);
            }
            else {
                this.oneFilter(field === 'race' ? 'type' : 'race', field === 'race' ? this.filterType : this.filterRace);
            }
        },
        noFilter(){
            this.animals.forEach(animal => {
                animal.show = true;
            });
        },
        oneFilter(filtre, value){
            this.animals.forEach(animal => {
                if(animal[filtre] != value){
                    animal.show = false;
                }
                else{
                    animal.show = true;
                }
            });
        },
        filterRaceAndType(filter, value){
            this.animals.forEach(animal => {
                animal.show = false;
                if(filter ==="race"){
                    if(animal.race === value && animal.type === this.filterType){
                        animal.show = true;
                    }
                }
                else{
                    if(animal.type === value && animal.race === this.filterRace){
                        animal.show = true;
                    }
                }

            });
        },
        getAnimalImageSrc(imageFileName) {
            return `${window.storageUrl}/${imageFileName}`;
        },
        async fetchAnimals() {
          try {
            const response = await axios.get('http://mink/public/api/animals');
            this.animals = response.data;
            this.animals.forEach(animal => {
                animal.show = true;
                animal.prixTTC = animal.prixHt * (1 + this.tauxTVA);
            });

          } catch (error) {
            console.error("Erreur lors de la récupération des animaux:", error);
          }
        },
    }
};
</script>
