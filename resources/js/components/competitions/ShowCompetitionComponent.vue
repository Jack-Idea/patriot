<template>
    <div class="flex flex-col">
        <a href="/competitions" class="text-gray-500 w-[100px] flex hover:text-gray-500 hover:no-underline">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
            </svg>
            Назад
        </a>
        <div class="w-full flex flex-col items-center mt-10">
            <div class="w-full lg:w-[80%]">
                <h2 class="text-center lg:text-left text-2xl lg:text-3xl">{{ competitions.title }}</h2>
                <div class="flex flex-col lg:flex-row mt-10 gap-10">
                    <div class="lg:w-1/2">
                        <div class="flex flex-col lg:flex-row justify-center lg:justify-start items-center pb-4 border-b border-gray-300">
                            <p class="text-gray-600 font-medium">Даты проведения:</p>
                            <h4 class="text-[var(--accent-color)] ml-2 opacity-90">{{ competitions.date_start | moment('DD.MM.YYYY')}} <span v-if="competitions.date_end">-</span> {{ competitions.date_end | moment('DD.MM.YYYY')}}</h4>
                        </div>
                        <div class="flex flex-col lg:flex-row justify-center lg:justify-start items-center mt-4 pb-4 border-b border-gray-300">
                            <p class="text-gray-600 font-medium">Место проведения:</p>
                            <p class="text-[var(--accent-color)] lg:ml-2 text-center lg:text-left opacity-90">{{ competitions.location }}</p>
                        </div>
                        <div class="flex flex-col lg:flex-row justify-center lg:justify-start items-center mt-4 pb-4 border-b border-gray-300">
                            <p class="text-gray-600 font-medium">Возрастная категория:</p>
                            <p class="text-[var(--accent-color)] lg:ml-2 text-center lg:text-left opacity-90">{{ competitions.category }}</p>
                        </div>
                    </div>
                    <div class="lg:w-1/2">
                        <a :href="competitions.regulations_link" target="_blank" class="flex justify-center items-end pb-4 border-b border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2d2d2d" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            <p class="text-[#2d2d2d] leading-4 ml-2">Регламент</p>
                        </a>
                        <a :href="competitions.legal_link" target="_blank" class="flex justify-center items-end mt-4 pb-4 border-b border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2d2d2d" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            <p class="text-[#2d2d2d] leading-4 ml-2">Положение</p>
                        </a>
                        <a v-if="competitions.report_link" :href="competitions.report_link" target="_blank" class="flex justify-center items-end mt-4 pb-4 border-b border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2d2d2d" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            <p class="text-[#2d2d2d] leading-4 ml-2">Отчет</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="flex flex-col w-full mt-10">
            <div v-for="tournir in filterCompetitions" class="flex flex-col lg:flex-row items-center mb-8">
                <p class="tournir-date text-blue-500 w-full lg:w-1/12 px-5 lg:pl-0 lg:text-right lg:justify-end">{{ tournir.date_start | moment('DD.MM') }} <span v-if="tournir.date_end" class="mx-1">-</span> {{ tournir.date_end | moment('DD.MM') }}</p>
                <div class="calendar-card bg-white shadow-xl w-full sm:w-10/12 p-5 rounded-lg flex flex-col lg:flex-row items-center justify-between">
                    <h6 class="lg:w-[40%] text-center lg:text-left mb-4 lg:mb-0 text-lg">{{ tournir.title }}</h6>
                    <p class="flex text-gray-600 lg:w-[20%] text-center justify-center mb-4 lg:mb-0">{{ tournir.location }}</p>
                    <p class="flex text-gray-600 lg:w-[20%] text-center lg:text-left mb-4 lg:mb-0">{{ tournir.category }}</p>
                    <a :href="'/competitions/'+tournir.id" class="main-btn more-btn flex mb-2 lg:mb-0">Подробнее</a>
                </div>
            </div>
        </div> -->
    </div>
</template>

<style scoped>
    .more-btn {
        min-width: 130px;
    }
    .back-btn {
        width: 130px;
        min-width: 100px;
    }
</style>

<script>
    Vue.use(require('vue-moment'));
    export default {
        data() {
            return {
                competitions: ''
            }
        },
        mounted() {
            this.getNews()
        },
        methods: {
            getNews() {
                let self = this
                let id = window.location.pathname
                id = id.split('/')
                axios
                    .post('/get-one-competition', {
                        'id': id
                    })
                    .then(function (response) {
                        console.log(response.data.competition)
                        self.competitions = response.data.competition[0]
                    })
            }
        }
    }
</script>
