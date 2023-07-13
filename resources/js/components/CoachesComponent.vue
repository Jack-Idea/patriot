<template>
    <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-5 w-full mt-16">
        <div v-for="(coach, index) in coaches.slice(0, quantity)" class="coach-card bg-white flex w-full min-h-[210px] shadow-[1px_4px_10px_rgba(0,0,0,0.2)] rounded-xl relative mb-10">
            <div class="p-5 flex flex-col justify-between">
                <h6 class="flex text-[#2d2d2d] w-1/3">{{ coach.lastname }} {{ coach.firstname }} {{ coach.middlename }}</h6>
                <a :uk-toggle="'target: #coach-'+index" class="coach-more text-[var(--accent-color)] font-light hover:text-[var(--accent-color)] flex items-center h-5">
                    Подробнее
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-6 h-6 ml-2 mt-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>

                </a>
            </div>
            <img src="img/logo.png" class="flex h-[75%] absolute bottom-[13%] right-0 p-3" style="opacity: 0.3;" alt="">
            <img :src="'img/coaches/'+coach.img+'.png'" class="h-[110%] flex ml-auto absolute bottom-0 right-5" alt="">
            <!-- This is the COACH modal -->
            <div :id="'coach-'+index" uk-modal>
                <div class="uk-modal-dialog uk-modal-body rounded-lg py-8">
                    <button class="uk-modal-close-default" uk-close></button>
                    <div class="flex justify-center relative">
                        <div class="absolute flex left-0 w-full h-full items-center">
                            <div class="relative flex w-full">
                                <span class="absolute left-0 rounded-full flex w-[20%] h-2 bg-blue-100"></span>
                                <span class="absolute left-[10%] top-[20px] rounded-full flex w-[20%] h-2 bg-blue-100"></span>
                                <span class="absolute left-[5%] top-[40px] rounded-full flex w-[20%] h-2 bg-blue-100"></span>
                                <span class="absolute left-auto right-0 rounded-full flex w-[20%] h-2 bg-blue-100"></span>
                                <span class="absolute left-auto right-[10%] top-[20px] rounded-full flex w-[20%] h-2 bg-blue-100"></span>
                                <span class="absolute left-auto right-[5%] top-[40px] rounded-full flex w-[20%] h-2 bg-blue-100"></span>
                            </div>
                        </div>
                        <div class="relative h-[270px] w-[250px] rounded-full flex justify-center overflow-hidden">
                            <div class="h-[250px] w-[250px] rounded-full bg-blue-100 absolute bottom-0"></div>
                            <img :src="'img/coaches/'+coach.img+'.png'" class="h-full flex ml-auto absolute bottom-0" alt="">
                        </div>
                    </div>
                    <div class="flex flex-col items-center mt-8">  
                        <h3 class="text-center mb-2 text-lg">{{ coach.lastname }} {{ coach.firstname }} {{ coach.middlename }}</h3>
                        <p class="text-gray-500 text-center my-2">{{ coach.rank }}</p>
                        <p class="text-gray-500 text-center">{{ coach.jobtitle }}</p>
                        <a :href="'tel:'+coach.phone" class="text-center text-[var(--accent-color)] mt-4">{{ coach.phone }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .coach-more {
        font-family: 'Oswald', sans-serif;
    }
</style>

<script>
    export default {
        props: ['quantity'],
        data() {
            return {
                coaches: []
            }
        },
        mounted() {
            this.getCoaches()
        },
        methods: {
            getCoaches() {
                let self = this
                axios
                    .get('js/coaches.json')
                    .then(function (response) {
                        self.coaches = response.data.coaches
                    })
            }
        }
    }
</script>
