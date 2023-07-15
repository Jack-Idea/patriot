<template>
    <div class="mt-[51px] flex flex-col">
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
            <div v-for="tournir in competitions" class="flex flex-col lg:flex-row items-center mb-8">
                <p class="tournir-date text-blue-500 w-full lg:w-1/12 px-5 lg:pl-0 lg:text-right lg:justify-end">{{ tournir.date_start }} <span v-if="tournir.date_end" class="mx-1">-</span> {{ tournir.date_end }}</p>
                <div class="calendar-card bg-white shadow-xl w-full sm:w-10/12 p-5 rounded-lg flex flex-col lg:flex-row items-center justify-between">
                    <h6 class="lg:w-[40%] text-center lg:text-left mb-4 lg:mb-0 text-lg">{{ tournir.title }}</h6>
                    <p class="flex text-gray-600 lg:w-[20%] text-center justify-center mb-4 lg:mb-0">{{ tournir.location }}</p>
                    <p class="flex text-gray-600 lg:w-[20%] text-center lg:text-left mb-4 lg:mb-0">{{ tournir.category }}</p>
                    <button class="main-btn more-btn flex mb-2 lg:mb-0">Подробнее</button>
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
                competitions: [
                    {
                        "id": 1,
                        "title": "Всероссийские соревнования по дзюдо «Детская Лига «Триумф Energy» (суперфинал)",
                        "location": "Россия, Сочи",
                        "category": "юноши и девушки до 15 лет (2009-2010 г.р.)",
                        "date_start": "01.09",
                        "date_end": "05.09"
                    },
                    {
                        "id": 2,
                        "title": "II Всероссийские летние спортивные игры среди спортсменов-любителей",
                        "location": "Россия, Калуга",
                        "category": "спортсмены-любители",
                        "date_start": "05.09",
                        "date_end": "07.09"
                    },
                    {
                        "id": 3,
                        "title": "II Всероссийские летние спортивные игры среди спортсменов-любителей",
                        "location": "Россия, Краснодарский край, ст. Северская",
                        "category": "спортсмены-любители",
                        "date_start": "05.09",
                        "date_end": "",
                    }
                ],
                selectedMonth: 4
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
            },
            getNews() {
                let self = this
                axios
                    .get('/get-news')
                    .then(function (response) {
                        self.news = response.data.news
                    })
            },
            showFilters() {

            },
            formatDate() {
                let self = this
                let n = self.news
                n.forEach((item) => {
                    let date = item.created_at.split("T")
                    date = date[0].split("-")
                    date = date[2]+'.'+date[1]+'.'+date[0]
                    item.created_at = date
                })

            }
        },
        watch: {
            news() {
                this.formatDate()
            }
        }
    }
</script>
