<template>
    <div class="">
        <!-- BEST LIST -->
        <div class="flex flex-wrap gap-5">
            <div v-for="(best, index) in bests" class="bg-white w-full md:w-10/12 lg:w-2/3 rounded-lg shadow-lg flex flex-col items-center md:items-stretch md:flex-row p-5 relative overflow-hidden">
                <span class="best-number absolute text-gray-500 -bottom-5 -right-5 md:-top-8 md:-right-7 font-black leading-none opacity-10">#{{ best.place }}</span>
                <img v-if="best.img" :src="'/img/uploads/honors/'+best.img" class="w-full md:w-[200px] rounded-lg mb-5 md:mb-0" alt="">
                <div v-if="!best.img" class="none-img w-full md:w-[200px] rounded-lg mb-5 md:mb-0 bg-gray-100 text-gray-300 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-1/2 h-1/2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div class="ml-4 flex flex-col">
                    <h5 class="text-[var(--accent-color)] text-lg">{{ best.fullname }}</h5>
                    <div class="flex text-gray-600 mt-2 mb-6 md:mb-0">
                        <p>Дата рождения:</p>
                        <p class="ml-2 font-light">{{ best.birthday | moment('DD.MM.YYYY') }}</p>
                    </div>
                    <div class="flex text-gray-600 mt-2 mb-6 md:mb-0">
                        <p>Место в списке:</p>
                        <p class="ml-2">{{ best.place }}</p>
                    </div>
                    <button class="main-btn mt-auto" :uk-toggle="'target: #best-'+index">
                        Подробнее...
                    </button>
                </div>
                <!-- This is the BEST modal -->
                <div :id="'best-'+index" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body rounded-lg py-8 relative overflow-hidden">
                        <span class="best-number absolute text-gray-500 -bottom-5 -right-5 md:-right-7 font-black leading-none opacity-10">#{{ best.place }}</span>
                        <button class="uk-modal-close-default" uk-close></button>
                        <div class="py-5">
                            <h4 class="uppercase font-medium mb-5">Достижения</h4>
                            <p v-for="achievements in best.achievements" class="text-gray-600 mb-3">{{ achievements.title }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    img, .none-img {
        aspect-ratio: 1;
    }
    .best-number {
        font-family: 'Oswald', sans-serif;
        font-size: calc(var(--index)*14);
        user-select: none;
        pointer-events: none;
    }
    @media screen and (max-width: 768px) {
        .best-number {
            font-size: calc(var(--index)*13);
        }
    }
    @media screen and (min-width: 1566px) {
        .best-number {
            font-size: 296px;
        }
    }
</style>

<script>
    Vue.use(require('vue-moment'));
    export default {
        data() {
            return {
                bests: ''
            }
        },
        mounted() {
            this.getBests()
        },
        methods: {
            getBests() {
                let self = this
                axios
                    .get('/get-bests')
                    .then(function(response) {
                        self.bests = response.data.bests
                    })
            }
        },
        watch: {
        }
    }
</script>
