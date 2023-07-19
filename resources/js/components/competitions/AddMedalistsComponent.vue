<template>
    <div class="relative">
        <div v-if="msgStatus" class="fixed top-20 left-0 flex justify-center w-full uk-animation-fade z-50">
            <span class="flex bg-green-600 p-5 rounded-lg bg-opacity-80 shadow-xl">{{ msgStatus }}</span>
        </div>
        <div class="form-group flex flex-col">
            <label for="title" class="">Ф.И.О.</label>
            <textarea id="title" maxlength="191" rows="4" type="text" class="form-control main-input d-flex" v-model="fullName"></textarea>
        </div>
        <div class="flex flex-wrap justify-between">
            <div class="form-group flex flex-col mt-10 w-full lg:w-[47%]">
                <label for="end" class="">Дата рождения</label>
                <input type="date" id="end" v-model="birthday">
            </div>
            <div class="form-group flex flex-col mt-10 w-full lg:w-[50%]">
                <label for="weight" class="">Вес</label>
                <input type="number" id="weight" v-model="weight">
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
                    <div class="table-body">
                        <div v-for="(medalist, index) in filteredMedalists" class="flex text-[#2d2d2d] w-full p-5 px-0 sm:px-5 border-b border-gray-300 items-center cursor-pointer hover:bg-gray-200 relative" :uk-toggle="'target: #medalist-'+index">
                            <p class="w-[10%] hidden sm:flex">{{ index+1 }}</p>
                            <p class="w-[40%]">{{ medalist.full_name }}</p>
                            <p v-if="medalist" class="w-[25%] sm:w-[20%]">{{ medalist.birthday | moment('DD.MM.YYYY') }}</p>
                            <p class="w-[15%] sm:w-[10%] flex justify-center sm:justify-start">{{ medalist.age }}</p>
                            <p class="w-[10%]">{{ medalist.weight }}</p>
                            <p class="w-[10%] flex justify-center sm:justify-start">{{ medalist.total_score }}</p>
                            <!-- This is the MEDALIST modal -->
                            <div :id="'medalist-'+index" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body rounded-lg py-8">
                                    <button class="uk-modal-close-default" uk-close></button>
                                    <div class="py-5">
                                        <textarea maxlength="191" rows="4" type="text" class="form-control main-input d-flex w-full text-lg mb-4" v-model="medalist.full_name"></textarea>
                                        <label for="">Дата рождения</label>
                                        <input type="date" class="w-full mb-4" v-model="medalist.birthday">
                                        <label for="">Вес</label>
                                        <input type="number" class="w-full mb-4" v-model="medalist.weight">
                                        <div v-for="(tournir, id) in medalist.competitions" class="mb-2">
                                            <label for="">Название турнира</label>
                                            <input type="text" class="w-full mb-2" v-model="tournir.title">
                                            <div class="flex justify-between relative">
                                                <span @click.prevent="deleteTournir(index, id)" class="absolute bg-red-400 text-white px-2 right-0 w-8 h-8 flex justify-center items-center z-[900] cursor-pointer">
                                                    X
                                                </span>
                                                <div class="flex flex-col w-[49%]">
                                                    <label class="w-1/2" for="">Место</label>
                                                    <input type="number" v-model="tournir.place">
                                                </div>
                                                <div class="flex flex-col w-[49%]">
                                                    <label class="w-1/2" for="">Баллов</label>
                                                    <input type="number" v-model="tournir.score">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-center mb-4">
                                        <button v-if="!preloader" @click.prevent="addTournir(medalist)" class="main-btn bg-blue-300 shadow-xl">Еще турнир</button>
                                    </div>
                                    <div class="flex justify-center relative">
                                        <span v-if="!preloader" @click.prevent="destroyNews(medalist.id, index)" class="absolute w-10 h-10 bg-red-600 top-auto left-0 rounded-full z-[100] cursor-pointer flex justify-center items-center text-white">
                                            <span uk-icon="icon: trash;"></span>
                                        </span>
                                        <button v-if="!preloader" @click.prevent="editNews(medalist, index)" class="main-btn bg-green-600 shadow-xl">Сохранить</button>
                                        <div v-if="preloader" class="main-btn bg-green-600"><div uk-spinner></div></div>
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
    Vue.use(require('vue-moment'));
    export default {
        data() {
            return {
                preloader: false,
                fullName: '',
                birthday: '',
                weight: '',
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
                searchMedalist: '',
                msgStatus: ''
            }
        },
        mounted() {
            this.getNews()
        },
        methods: {
            getNews() {
                let self = this
                axios
                    .get('/get-admin-medalists')
                    .then(function (response) {
                        self.medalists = response.data.medalists
                        self.filteredMedalists = response.data.medalists    
                        self.countAge()
                    })
            },
            storeNews() {
                let self = this
                self.preloader = true
                axios
                    .post('/add-medalist', {
                        'full_name': self.fullName,
                        'birthday': self.birthday,
                        'weight': self.weight
                    })
                    .then(function (response) {
                        setTimeout(() => {
                            self.msgStatus = response.data.msg_status
                            self.fullName = ''
                            self.birthday = ''
                            self.weight = ''
                            self.preloader = false
                            self.getNews()
                        }, 1000)
                        setTimeout(() => {
                            self.msgStatus = ''
                        }, 3000)
                    })
            },
            filterMedalist() {
                this.filteredMedalists = []
                this.medalists.forEach((item) => {
                    if (item.full_name.toLocaleLowerCase().includes(this.searchMedalist.toLocaleLowerCase())) {
                        this.filteredMedalists.push(item)
                    }
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
                    if (!item.competitions) {
                        item.competitions = []
                    }
                })                
            },
            addTournir(item) {
                item.competitions.push({"title": "", "place": "", "score": ""})
            },
            editNews(medalist, index) {
                let self = this
                self.preloader = true
                axios
                    .post('/edit-medalist', {
                        'medalist': medalist
                    })
                    .then(function (response) {
                        setTimeout(() => {
                            self.preloader = false
                            UIkit.modal('#medalist-'+index).hide();
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
                            UIkit.modal('#medalist-'+index).hide();
                            self.msgStatus ='Что-то пошло не так, перезагрузите страницу и попробуйте снова'
                        }, 1000)
                    })
            },
            deleteTournir(index, id) {
                this.filteredMedalists[index].competitions.splice(id, 1)
            },
            destroyNews(id, index) {
                let self = this
                self.preloader = true
                    axios
                        .post('/destroy-medalist', {
                            'id': id
                        })
                        .then(function (response) {
                            self.getNews()
                            self.msgStatus = response.data.msg_status
                            UIkit.modal('#medalist-'+index).hide();
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
            searchMedalist() {
                this.filterMedalist()
            }
        }
    }
</script>
