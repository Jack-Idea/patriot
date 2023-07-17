<template>
    <div class="relative">
        <div v-if="msgStatus" class="fixed top-20 left-0 flex justify-center w-full uk-animation-fade z-50">
            <span class="flex bg-green-600 p-5 rounded-lg bg-opacity-80 shadow-xl">{{ msgStatus }}</span>
        </div>
        <div class="form-group flex flex-col">
            <label for="title" class="">Заголовок</label>
            <textarea id="title" maxlength="191" rows="4" type="text" class="form-control main-input d-flex" v-model="newsTitle"></textarea>
        </div>
        <div class="flex flex-wrap justify-between">
            <div class="form-group flex flex-col mt-10 w-full lg:w-[47%]">
                <label for="location" class="">Место проведения</label>
                <textarea id="location" maxlength="191" rows="4" type="text" class="form-control main-input d-flex" v-model="location"></textarea>
            </div>
            <div class="form-group flex flex-col mt-10 w-full lg:w-[50%]">
                <label for="category" class="">Категория соревнований</label>
                <textarea id="category" maxlength="191" rows="4" type="text" class="form-control main-input d-flex" v-model="category"></textarea>
            </div>
        </div>
        <div class="flex flex-wrap justify-between w-full lg:w-[47%]">
            <div class="form-group flex flex-col mt-10 w-full lg:w-[48%]">
                <label for="start" class="">Дата начала</label>
                <input type="date" id="start" v-model="dateStart">
            </div>
            <div class="form-group flex flex-col mt-10 w-full lg:w-[48%]">
                <label for="end" class="">Дата окончания</label>
                <input type="date" id="end" v-model="dateEnd">
            </div>
        </div>
        <div class="flex flex-wrap justify-between">
            <div class="form-group flex flex-col mt-10 w-full lg:w-[47%]">
                <label for="legal" class="">Ссылка на положение</label>
                <input type="text" id="legal" v-model="legal">
            </div>
            <div class="form-group flex flex-col mt-10 w-full lg:w-[50%]">
                <label for="regulations" class="">Ссылка на регламент</label>
                <input type="text" id="regulations" v-model="regulations">
            </div>
        </div>
        
        <div class="mt-10 flex justify-center">
            <button v-if="!preloader" @click.prevent="storeNews" class="main-btn bg-green-600 shadow-xl">Сохранить</button>
            <div v-if="preloader" class="main-btn bg-green-600"><div uk-spinner></div></div>
        </div>
        
        <div class="mt-[51px] flex flex-col">
            <div class="flex">
                <div class="w-0 sm:w-1/12"></div>
                <div class="bg-gray-300 w-full sm:w-10/12 p-5 rounded-lg flex items-center">
                    <div class="uk-form-controls w-10/12 lg:w-auto">
                        <select class="uk-select" id="form-stacked-select" v-model="selectedMonth" @change="showFilters">
                            <option v-for="month in years" :value="month.id">{{ month.year }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-full mt-10">
                <div v-for="(tournir, index) in competitions" class="flex flex-col lg:flex-row items-center mb-8 relative">
                    <span v-if="!preloader" @click.prevent="destroyNews(tournir.id)" class="absolute w-10 h-10 bg-red-600 top-auto right-0 rounded-full z-[100] cursor-pointer flex justify-center items-center">
                        <span uk-icon="icon: trash;"></span>
                    </span>
                    <p class="tournir-date text-blue-500 w-full lg:w-1/12 px-5 lg:pl-0 lg:text-right lg:justify-end">{{ tournir.date_start | moment('DD.MM') }} <span v-if="tournir.date_end" class="mx-1">-</span> {{ tournir.date_end | moment('DD.MM') }}</p>
                    <div class="calendar-card bg-white shadow-xl w-full sm:w-10/12 p-5 rounded-lg flex flex-col lg:flex-row items-center justify-between">
                        <h6 class="lg:w-[40%] text-center lg:text-left mb-4 lg:mb-0 text-lg">{{ tournir.title }}</h6>
                        <p class="flex text-gray-600 lg:w-[20%] text-center justify-center mb-4 lg:mb-0">{{ tournir.location }}</p>
                        <p class="flex text-gray-600 lg:w-[20%] text-center lg:text-left mb-4 lg:mb-0">{{ tournir.category }}</p>
                        <button :uk-toggle="'target: #competition-'+index" class="main-btn more-btn flex mb-2 lg:mb-0">Подробнее</button>
                    </div>
                    <!-- This is the COPETITION modal -->
                    <div :id="'competition-'+index" uk-modal>
                        <div class="uk-modal-dialog uk-modal-body rounded-lg py-8">
                            <button class="uk-modal-close-default" uk-close></button>
                            <div class="py-5">
                                <textarea maxlength="191" rows="4" type="text" class="form-control main-input d-flex w-full text-lg mb-4" v-model="tournir.title"></textarea>
                                <input type="text" class="w-full mb-4" v-model="tournir.location">
                                <input type="text" class="w-full mb-4" v-model="tournir.category">
                                <input type="date" class="w-full mb-4" v-model="tournir.date_start">
                                <input type="date" class="w-full mb-4" v-model="tournir.date_end">
                                <!-- Положение -->
                                <a :href="tournir.legal_link" class="flex items-center" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="var(--accent-color)" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    <span class="text-[#2d2d2d] ml-2">Положение</span>
                                </a>
                                <input type="text" class="w-full mb-4" v-model="tournir.legal_link">
                                <!-- Регламент -->
                                <a :href="tournir.regulations_link" class="flex items-center" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="var(--accent-color)" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    <span class="text-[#2d2d2d] ml-2">Регламент</span>
                                </a>
                                <input type="text" class="w-full mb-4" v-model="tournir.regulations_link">
                                <!-- Отчет -->
                                <a :href="tournir.report_link" class="flex items-center" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="var(--accent-color)" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    <span class="text-[#2d2d2d] ml-2">Отчет</span>
                                </a>
                                <input type="text" class="w-full mb-4" v-model="tournir.report_link">
                            </div>
                            <div class="flex justify-center">
                                <button v-if="!preloader" @click.prevent="editNews(tournir, index)" class="main-btn bg-green-600 shadow-xl">Сохранить</button>
                                <div v-if="preloader" class="main-btn bg-green-600"><div uk-spinner></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</template>

<style scoped>
    label {
        color: #2d2d2d;
        margin-bottom: 8px;
    }
    textarea, input {
        box-shadow: 1px 1px 7px rgba(0,0,0,.3);
        border-radius: 8px;
        color: #2d2d2d;
        padding: 8px;
    }
    textarea:focus, input:focus {
        border: 1px solid var(--accent-color);
        outline: none;
    }
    select {
        color: #2d2d2d;
        border-radius: 8px;
        width: 200px;
    }
    .more-btn {
        min-width: 130px;
    }
    .tournir-date {
        display: flex;
    }

    .news-card__img, img {
        filter: sepia(30%);
    }
</style>

<script>
    Vue.use(require('vue-moment'));
    export default {
        data() {
            return {
                preloader: false,
                newsTitle: '',
                location: '',
                category: '',
                dateStart: '',
                dateEnd: '',
                legal: '',
                regulations: '',
                msgStatus: '',
                competitions: '',
                selectedMonth: 1,
                years: [
                    {
                        "id": 1,
                        "year": 2023
                    },
                    {
                        "id": 2,
                        "year": 2024
                    },
                    {
                        "id": 3,
                        "year": 2025
                    },
                    {
                        "id": 4,
                        "year": 2026
                    },
                    {
                        "id": 5,
                        "year": 2027
                    },
                    {
                        "id": 6,
                        "year": 2028
                    },
                    {
                        "id": 7,
                        "year": 2029
                    },
                    {
                        "id": 8,
                        "year": 2030
                    },
                    {
                        "id": 9,
                        "year": 2031
                    },
                    {
                        "id": 10,
                        "year": 2032
                    }
                ],
            }
        },
        mounted() {
            this.getNews()
        },
        methods: {
            getNews() {
                let self = this
                axios
                    .post('/get-year-competitions', {
                        'year': self.years[self.selectedMonth-1].year
                    })
                    .then(function (response) {
                        self.competitions = response.data.competitions
                    })
            },
            storeNews() {
                let self = this
                self.preloader = true
                axios
                    .post('/store-competition', {
                        'title': self.newsTitle,
                        'location': self.location,
                        'category': self.category,
                        'start': self.dateStart,
                        'end': self.dateEnd,
                        'legal': self.legal,
                        'regulations': self.regulations,
                    })
                    .then(function (response) {
                        setTimeout(() => {
                            self.msgStatus = response.data.msg_status
                            self.newsTitle = ''
                            self.location = ''
                            self.category = ''
                            self.dateStart = ''
                            self.dateEnd = ''
                            self.legal = ''
                            self.regulations = ''
                            self.preloader = false
                            self.getNews()
                        }, 1000)
                        setTimeout(() => {
                            self.msgStatus = ''
                        }, 3000)
                    })
            },
            showFilters() {
                this.getNews()
            },
            editNews(tournir, index) {
                let self = this
                self.preloader = true
                axios
                    .post('/edit-competition', {
                        'competition': tournir
                    })
                    .then(function (response) {
                        console.log(response.data.request_competition)
                        setTimeout(() => {
                            self.preloader = false
                            UIkit.modal('#competition-'+index).hide();
                            self.msgStatus = response.data.msg_status
                            self.getNews()
                        }, 1000)
                        setTimeout(() => {
                            self.msgStatus = ''
                        }, 3000)
                    })
                    .catch(function (error) {
                        setTimeout(() => {
                            console.log(error)
                            self.preloader = false
                            UIkit.modal('#competition-'+index).hide();
                            self.msgStatus ='Что-то пошло не так, перезагрузите страницу и попробуйте снова'
                        }, 1000)
                    })
            },
            destroyNews(id) {
                let self = this
                self.preloader = true
                    axios
                        .post('/destroy-competition', {
                            'id': id
                        })
                        .then(function (response) {
                            self.getNews()
                            self.msgStatus = response.data.msg_status
                            setTimeout(() => {
                                self.msgStatus = ''
                                self.preloader = false
                            }, 3000)
                        })
                        .catch(function (error) {
                            self.msgStatus = 'Что-то пошло не так, перезагрузите страницу и попробуйте снова'
                        })
            }
        },
        watch: {
        }
    }
</script>
