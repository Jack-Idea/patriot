<template>
    <div class="mt-[55px] flex flex-col">
        <div class="flex">
            <div class="w-0 sm:w-1/12"></div>
            <div class="bg-gray-300 w-full sm:w-10/12 p-5 rounded-lg flex items-center">
                <div class="uk-form-controls w-10/12 lg:w-auto">
                    <select class="uk-select" id="form-stacked-select" v-model="selectedMonth" @change="showFilters">
                        <option v-for="month in months" :value="month.id">{{ month.month }}</option>
                    </select>
                </div>
                <h6 class="text-lg text-gray-700 ml-4">{{ nowYear }}</h6>
            </div>
        </div>
        <div class="flex flex-col w-full mt-10">
            <div v-for="tournir in filterCompetitions" class="flex flex-col lg:flex-row items-center mb-8">
                <p class="tournir-date text-blue-500 w-full lg:w-1/12 px-5 lg:pl-0 lg:text-right lg:justify-end">{{ tournir.date_start | moment('DD.MM') }} <span v-if="tournir.date_end" class="mx-1">-</span> {{ tournir.date_end | moment('DD.MM') }}</p>
                <div class="calendar-card bg-white shadow-xl w-full sm:w-10/12 p-5 rounded-lg flex flex-col lg:flex-row items-center justify-between">
                    <h6 class="lg:w-[40%] text-center lg:text-left mb-4 lg:mb-0 text-lg">{{ tournir.title }}</h6>
                    <p class="flex text-gray-600 lg:w-[20%] text-center justify-center mb-4 lg:mb-0">{{ tournir.location }}</p>
                    <p class="flex text-gray-600 lg:w-[20%] text-center lg:text-left mb-4 lg:mb-0">{{ tournir.category }}</p>
                    <a :href="'/competitions/'+tournir.id" class="main-btn more-btn flex mb-2 lg:mb-0">Подробнее</a>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .news-card {
        font-family: 'Oswald', sans-serif;
    }
    .more-btn {
        min-width: 130px;
    }
    .tournir-date {
        display: flex;
        font-family: 'Oswald', sans-serif;
    }
    select {
        color: #2d2d2d;
        border-radius: 8px;
        width: 200px;
    }
    @media screen and (max-width: 768px) {
        select {
            width: 100%;
        }
    }
    @media screen and (max-width: 600px) {

    }
</style>

<script>
    Vue.use(require('vue-moment'));
    export default {
        data() {
            return {
                news: [],
                nowYear: '',
                months: [
                    {
                        "id": 1,
                        "month": "январь"
                    },
                    {
                        "id": 2,
                        "month": "февраль"
                    },
                    {
                        "id": 3,
                        "month": "март"
                    },
                    {
                        "id": 4,
                        "month": "апрель"
                    },
                    {
                        "id": 5,
                        "month": "май"
                    },
                    {
                        "id": 6,
                        "month": "июнь"
                    },
                    {
                        "id": 7,
                        "month": "июль"
                    },
                    {
                        "id": 8,
                        "month": "август"
                    },
                    {
                        "id": 9,
                        "month": "сентябрь"
                    },
                    {
                        "id": 10,
                        "month": "октябрь"
                    },
                    {
                        "id": 11,
                        "month": "ноябрь"
                    },
                    {
                        "id": 12,
                        "month": "декабрь"
                    }
                ],
                competitions: '',
                selectedMonth: 1,
                filterCompetitions: []
            }
        },
        mounted() {
            this.startPage()
            this.getNews()
        },
        methods: {
            startPage() {
                let date = new Date()
                this.nowYear = date.getFullYear()
                this.selectedMonth = date.getMonth()+1
            },
            getNews() {
                let self = this
                axios
                    .post('/get-year-competitions')
                    .then(function (response) {
                        self.competitions = response.data.competitions
                    })
            },
            showFilters() {
                this.filterCompetitions = []
                this.competitions.forEach((item) => {
                    if (new Date(item.date_start).getMonth()+1 === this.selectedMonth) {
                        this.filterCompetitions.push(item)
                    }
                })
            }
        },
        watch: {
            competitions() {
                this.showFilters()
            }
        }
    }
</script>
