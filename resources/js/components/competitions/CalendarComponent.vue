<template>
    <div class="mt-16 flex flex-col items-center">
        <div class="bg-gray-300 w-full sm:w-10/12 p-5 rounded-lg">
            <div class="uk-form-controls">
                <select class="uk-select" id="form-stacked-select" v-model="selectedMonth" @change="showFilters">
                    <option v-for="month in months" :value="month.id">{{ month.month }}</option>
                </select>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="flex">
                <p>01.09 - 05.09</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .news-card {
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
    export default {
        data() {
            return {
                news: [],
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
                selectedMonth: 4
            }
        },
        mounted() {
            this.getNews()
        },
        methods: {
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
