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
                <label for="weight" class="">Место в списке</label>
                <input type="number" id="weight" v-model="place">
            </div>
        </div>
        <label for="" class="flex mt-10">Достижения</label>
        <div class="flex flex-wrap justify-between gap-5">
            <div v-for="(achievement, index) in achievements" class="relative flex w-full lg:w-[49%]">
                <span @click="removeAchievementInput(index)" class="absolute bg-red-400 text-white px-2 right-0 w-8 h-8 flex justify-center items-center z-[900] cursor-pointer">
                    X
                </span>
                <textarea maxlength="191" rows="4" type="text" class="form-control main-input flex w-full" v-model="achievement.title"></textarea>
            </div>
        </div>
        <button @click.prevent="addAchievementInput()" class="main-btn mt-5">Добавить достижение</button>
        <!-- MAIN PHOTO -->
        <div class="form-group flex flex-col w-full md:w-1/2 mt-10">
            <label for="newsImg" class="form-label d-flex"><span style="color: #222;">Фото почетного (одно - квадратное)</span></label>
            <div class="file-input" uk-form-custom="target: true">
                <input type="file" id="newsImg" @change="fileUpload">
                <input class="uk-input uk-form-width-medium main-input file-input" type="text" placeholder="Выберите файл" disabled>
            </div>
            <div v-if="img" class="w-full mt-10">
                <img :src="'img/uploads/honors/'+img" class="w-full lg:w-1/2 rounded-lg" alt="">
            </div>
        </div>
        <!-- SAVE BTN -->
        <div class="mt-10 flex justify-center">
            <button v-if="!preloader" @click.prevent="storeHonor" class="main-btn bg-green-600 shadow-xl">Сохранить</button>
            <div v-if="preloader" class="main-btn bg-green-600"><div uk-spinner></div></div>
        </div>
        <!-- BEST LIST -->
        <div class="flex flex-wrap gap-5">
            <div v-for="(best, index) in bests" class="bg-white w-full md:w-10/12 lg:w-2/3 rounded-lg shadow-lg flex flex-col items-center md:items-stretch md:flex-row p-5 relative overflow-hidden">
                <span v-if="!preloader" @click.prevent="destroyHonor(best.id)" class="absolute w-10 h-10 bg-red-600 top-4 left-4 rounded-full z-[100] cursor-pointer flex justify-center items-center">
                    <span uk-icon="icon: trash;"></span>
                </span>
                <span v-if="!editble" @click.prevent="editble = true" class="absolute w-10 h-10 bg-yellow-500 top-4 right-4 rounded-full z-[100] cursor-pointer flex justify-center items-center">
                    <span uk-icon="icon: pencil;"></span>
                </span>
                <span v-if="editble && !preloader" @click.prevent="editHonor(best)" class="absolute w-10 h-10 bg-green-500 top-4 right-4 rounded-full z-[100] cursor-pointer flex justify-center items-center">
                    <span uk-icon="icon: check;"></span>
                </span>
                <span class="best-number absolute text-gray-500 -bottom-5 -right-5 md:-top-8 md:-right-7 font-black leading-none opacity-10">#{{ best.place }}</span>
                <img v-if="best.img" :src="'/img/uploads/honors/'+best.img" class="w-full md:w-[200px] rounded-lg mb-5 md:mb-0" alt="">
                <div v-if="!best.img" class="none-img w-full md:w-[200px] rounded-lg mb-5 md:mb-0 bg-gray-100 text-gray-300 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-1/2 h-1/2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div class="md:ml-4 flex flex-col w-full md:w-[60%] items-center md:items-start">
                    <h5 v-if="!editble" class="text-[var(--accent-color)] text-lg text-center md:text-start">{{ best.full_name }}</h5>
                    <input v-if="editble" type="text" class="flex w-full" v-model="best.full_name">
                    <div class="flex text-gray-600 mt-2 md:mb-0 justify-center md:justify-start">
                        <p v-if="!editble">Дата рождения:</p>
                        <p v-if="!editble" class="ml-2 font-light">{{ best.birthday | moment('DD.MM.YYYY') }}</p>
                        <input v-if="editble" type="date" class="flex w-full" v-model="best.birthday">
                    </div>
                    <div class="flex text-gray-600 mt-2 mb-6 md:mb-0 justify-center md:justify-start">
                        <p v-if="!editble">Место в списке:</p>
                        <p v-if="!editble" class="ml-2">{{ best.place }}</p>
                        <input v-if="editble" type="number" class="flex w-full" v-model="best.place">
                    </div>
                    <button class="main-btn mt-auto" :uk-toggle="'target: #best-'+index">
                        Подробнее...
                    </button>
                </div>
                <!-- This is the BEST modal -->
                <div :id="'best-'+index" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body rounded-lg py-8 relative overflow-hidden">
                        <span v-if="editble && !preloader" @click.prevent="editHonor(best)" class="absolute w-10 h-10 bg-green-500 bottom-1 right-1 rounded-full z-[100] cursor-pointer flex justify-center items-center">
                            <span uk-icon="icon: check;"></span>
                        </span>
                        <span v-if="editble && !preloader" @click.prevent="addAchievement(index)" class="absolute w-10 h-10 bg-gray-800 bottom-1 left-1 rounded-full z-[100] cursor-pointer flex justify-center items-center">
                            <span uk-icon="icon: plus;"></span>
                        </span>
                        <span class="best-number absolute text-gray-500 -bottom-5 -right-5 md:-right-7 font-black leading-none opacity-10">#{{ best.place }}</span>
                        <button class="uk-modal-close-default" uk-close></button>
                        <div class="py-5">
                            <h4 class="uppercase font-medium mb-5">Достижения</h4>
                            <p v-if="!editble" v-for="achievements in best.achievements" class="text-gray-600 mb-3">{{ achievements.title }}</p>
                            <div v-if="editble" v-for="(achievements, indx) in best.achievements" class="flex relative mt-3">
                                <span @click="removeAchievement(index, indx)" class="absolute bg-red-400 text-white px-2 right-0 w-8 h-8 flex justify-center items-center z-[900] cursor-pointer">
                                    X
                                </span>
                                <textarea type="text" class="flex w-full" v-model="achievements.title"></textarea>
                            </div>
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
import axios from 'axios';

    Vue.use(require('vue-moment'));
    export default {
        data() {
            return {
                preloader: false,
                editble: false,
                fullName: '',
                birthday: '',
                place: 1,
                img: '',
                achievements: [],
                msgStatus: '',
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
            },
            //Добавить ачивку при редактировании
            addAchievement(best) {
                this.bests[best].achievements.push({"title": " "})
            },
            //Удалить ачивку при редактировании
            removeAchievement(best, index) {
                console.log(best, index)
                this.bests[best].achievements.splice(index, 1)
            },
            //Добавить ачивку при создании
            addAchievementInput() {
                this.achievements.push({"title": " "})
            },
            //Удалить ачивку при создании
            removeAchievementInput(index) {
                this.achievements.splice(index, 1)
            },
            countCurrentPlace() {
                let bests = this.bests
                let count = this.bests.length
                let arr = this.bests
                let currentPlace = count
                let found = true
                while (found) {
                    found = false
                    this.bests.forEach((item) => {
                        if (item.place === currentPlace) {
                            currentPlace++
                            found = true
                        }
                    })
                }
                if(currentPlace) {
                    this.place = currentPlace
                } else {
                    this.place = 1
                }

            },
            storeHonor() {
                let self = this
                self.preloader = true
                axios
                    .post('/store-honor', {
                        "full_name": self.fullName,
                        "birthday": self.birthday,
                        "place": self.place,
                        "img": self.img,
                        "achievements": self.achievements
                    })
                    .then(function (response) {
                        self.msgStatus = response.data.msg_status
                        self.getBests()
                        setTimeout(() => {
                            self.preloader = false
                            self.fullName = ''
                            self.birthday = ''
                            self.img = ''
                            self.achievements = []
                        }, 1000)
                        setTimeout(() => {
                            self.msgStatus = ''
                        }, 3000)
                    })
                    .catch((error) => {console.log(error)})
            },
            editHonor(best) {
                let self = this
                self.preloader = true
                axios
                    .post('/edit-honor', {
                        'best': best
                    })
                    .then(function(response) {
                        self.msgStatus = response.data.msg_status
                        setTimeout(() => {
                            self.preloader = false
                            self.editble = false
                            self.getBests()
                        }, 1000)
                        setTimeout(() => {
                            self.msgStatus = ''
                        }, 3000)
                    })
            },
            // СОХРАНЕНИЕ КАРТИНОК
            fileUpload(e) {
                this.countFiles = 1
                this.file = e.target.files[0]
                this.uploadFile = true
                this.fileSubmit(e)
            },
            fileSubmit(e) {
                e.preventDefault();
                let currentObj = this;

                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
                formData.append('file', this.file);

                axios
                    .post('/store-honor-img', formData, config)
                    .then(function (response) {
                        console.log(response.data)
                        currentObj.img = response.data.img;
                    })
                    .catch(function (error) {
                        console.log(error)
                    });
            },
            destroyHonor(id) {
                let self = this
                self.preloader = true
                console.log(id)
                axios
                    .post('/destroy-honor', {
                        "id": id
                    })
                    .then(function(response) {
                        self.msgStatus = response.data.msg_status
                        setTimeout(() => {
                            self.preloader = false
                            self.getBests()
                        }, 1000)
                        setTimeout(() => {
                            self.msgStatus = ''
                        }, 3000)
                    })
            }
        },
        watch: {
            bests() {
                this.countCurrentPlace()
            }
        }
    }
</script>
