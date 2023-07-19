<template>
    <div class="mt-[55px] flex flex-col">
        <div class="flex">
            <div class="w-0 sm:w-1/12"></div>
            <div class="bg-gray-300 w-full sm:w-10/12 p-5 rounded-lg flex items-center">
                <!-- <div class="uk-form-controls w-10/12 lg:w-auto">
                    <select class="uk-select" id="form-stacked-select" v-model="selectedMonth" @change="showFilters">
                        <option v-for="month in months" :value="month.id">{{ month.month }}</option>
                    </select>
                </div> -->
                <!-- <input type="text" class="w-full md:w-1/3" v-model="searchMedalist"> -->
                <div class="uk-inline w-full md:w-1/3">
                    <span class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: search"></span>
                    <input class="uk-input" type="text" v-model="searchMedalist" placeholder="Поиск участника">
                </div>
            </div>
        </div>
        <div class="flex w-full mt-10">
            <div class="w-0 sm:w-1/12"></div>
            <div class="w-full lg:w-10/12">
                <div class="table-head flex text-gray-500 w-full p-5 px-0 sm:px-5 sm:pr-[41px] pr-[20px] items-center">
                    <p class="w-[10%] hidden sm:flex">№</p>
                    <p class="w-[40%]">Ф.И.О.</p>
                    <p class="w-[25%] sm:w-[20%]">Дата рождения</p>
                    <p class="w-[15%] sm:w-[10%]">Возраст</p>
                    <p class="w-[10%]">Вес</p>
                    <p class="w-[10%]">Общий балл</p>
                </div>
                <div class="table-body h-[40vh] overflow-y-scroll">
                    <div v-for="(medalist, index) in filteredMedalists" class="flex text-[#2d2d2d] w-full p-5 px-0 sm:px-5 border-b border-gray-300 items-center cursor-pointer hover:bg-gray-200" :uk-toggle="'target: #medalist-'+index">
                        <p class="w-[10%] hidden sm:flex">{{ index+1 }}</p>
                        <p class="w-[40%]">{{ medalist.full_name }}</p>
                        <p class="w-[25%] sm:w-[20%]">{{ medalist.birthday | moment('DD.MM.YYYY') }}</p>
                        <p class="w-[15%] sm:w-[10%] flex justify-center sm:justify-start">{{ medalist.age }}</p>
                        <p class="w-[10%]">{{ medalist.weight }}</p>
                        <p class="w-[10%] flex justify-center sm:justify-start">{{ medalist.total_score }}</p>
                        <!-- This is the MEDALIST modal -->
                        <div :id="'medalist-'+index" uk-modal>
                            <div class="uk-modal-dialog uk-modal-body rounded-lg py-8">
                                <button class="uk-modal-close-default" uk-close></button>
                                <div class="py-5">
                                    <div class="table-head flex text-gray-500 sm:px-5 w-full items-center">
                                        <p class="w-[60%]">Наименование турнира</p>
                                        <p class="ml-auto w-[15%] text-center">Место</p>
                                        <p class="w-[15%] text-center">Баллы</p>
                                    </div>
                                    <div class="table-body" style="padding-right: 0;">
                                        <div v-for="(tournir, index) in medalist.competitions" class="flex text-[#2d2d2d] w-full sm:p-5 py-5 border-b border-gray-300 items-center hover:bg-gray-200">
                                            <p class="w-[60%]">{{ tournir.title }}</p>
                                            <p class="ml-auto w-[15%] text-center">{{ tournir.place }}</p>
                                            <p class="w-[15%] text-center">{{ tournir.score }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .news-card {
        font-family: 'Oswald', sans-serif;
    }
    textarea, input {
        border-radius: 8px;
        color: #2d2d2d;
        padding: 8px;
    }
    textarea:focus, input:focus {
        border: 1px solid var(--accent-color);
        outline: none;
    }
    .table-head {
        font-family: 'Oswald', sans-serif;
        font-weight: 300;
    }
    .table-body {
        font-family: 'Oswald', sans-serif;
        font-weight: 300;
        padding-right: 16px;
    }
    /* SCROLLBAR */
    /* width */
    ::-webkit-scrollbar {
        width: 5px;
    }
    /* Track */
    ::-webkit-scrollbar-track {
        background: #e9e9e9;
    }
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: var(--accent-color);
    }
    /* SCROLLBAR END */
</style>

<script>
import moment from 'moment';

    Vue.use(require('vue-moment'));
    export default {
        data() {
            return {
                number: 1,
                medalists: [
                    {
                        "id": 1,
                        "full_name": "Самойлов Алексей Александрович",
                        "birthday": '2000-25-08',
                        "weight": "45",
                        "competitions": [
                            {
                                "title": "Первенство города",
                                "score": 3
                            },
                            {
                                "title": "Первенство края",
                                "score": 2
                            },
                            {
                                "title": "Первенство ЮФО",
                                "score": 4
                            },
                            {
                                "title": "Первенство России",
                                "score": 1
                            }
                        ],
                        "total_score": 10
                    },
                    {
                        "id": 1,
                        "full_name": "Макаренко Герман Артурович",
                        "birthday": '1988-16-06',
                        "weight": "74",
                        "competitions": [
                            {
                                "title": "Первенство города",
                                "score": 1
                            },
                            {
                                "title": "Первенство края",
                                "score": 2
                            },
                            {
                                "title": "Первенство ЮФО",
                                "score": 1
                            },
                            {
                                "title": "Первенство России",
                                "score": 1
                            }
                        ],
                        "total_score": 4
                    }
                ],
                filteredMedalists: '',
                searchMedalist: ''
            }
        },
        mounted() {
            this.getNews()
        },
        methods: {
            getNews() {
                let self = this
                axios
                    .get('/get-medalists')
                    .then(function (response) {
                        self.medalists = response.data.medalists
                        self.filteredMedalists = response.data.medalists    
                        self.countAge()
                    })
            },
            countAge() {
                let birth
                let birthMonth
                let birthYear
                let today
                let todayMonth
                let todayYear
                let age
                this.medalists.forEach((item) => {
                    birth = new Date(item.birthday)
                    birthYear = birth.getFullYear()
                    birthMonth = birth.getMonth()+1

                    today = new Date();
                    todayYear = today.getFullYear()
                    todayMonth = today.getMonth()+1

                    age = todayYear - birthYear
                    if (todayMonth < birthMonth) {
                        age = age-1
                    }
                    item.age = age
                })                
            },
            filterMedalist() {
                this.filteredMedalists = []
                this.medalists.forEach((item) => {
                    if (item.full_name.toLocaleLowerCase().includes(this.searchMedalist.toLocaleLowerCase())) {
                        this.filteredMedalists.push(item)
                    }
                })
            }
        },
        watch: {
            searchMedalist() {
                this.filterMedalist()
            }
        }
    }
</script>
