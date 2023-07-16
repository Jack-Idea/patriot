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
        
        <div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-6 w-full mt-16">
                <div v-for="(item, index) in news" class="news-card bg-white flex flex-col w-full min-h-[350px] shadow-[1px_4px_10px_rgba(0,0,0,0.2)] rounded-xl relative overflow-hidden">
                    <span v-if="!preloader" @click.prevent="destroyNews(index, item.id)" class="absolute w-10 h-10 bg-red-600 top-4 left-4 rounded-full z-[100] cursor-pointer flex justify-center items-center">
                        <span uk-icon="icon: trash;"></span>
                    </span>
                    <div class="news-card__img flex w-full h-[80%] overflow-hidden relative" :style="`background: url('img/uploads/news/${item.img}') no-repeat center center / cover;`">
                        <div class="absolute bottom-0 flex w-full rounded-t-xl overflow-hidden">
                            <div class="bg-white bg-opacity-70 flex w-full absolute h-full left-0" style="backdrop-filter: blur(4px);"></div>
                            <h4 class="px-5 py-3 relative">
                                {{ item.title }}
                            </h4>
                        </div>
                    </div>
                    <div class="flex justify-between items-center text-[#2d2d2d] px-5 h-[20%] font-light">
                        <a :href="'/news/'+item.id" class="flex hover:text-[#2d2d2d]">Подробнее...</a>
                        <span class="flex font-normal opacity-50">{{ item.created_at }}</span>
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

    .news-card__img, img {
        filter: sepia(30%);
    }
</style>

<script>
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
                news: []
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
                        self.formatDate()
                    })
            },
            storeNews() {
                let self = this
                self.preloader = true
                axios
                    .post('/store-news', {
                        'title': self.newsTitle,
                        'location': self.location,
                        'category': self.category,
                        'start': self.dateStart,
                        'end': self.dateEnd,
                        'legal': self.legal,
                        'regulations': self.regulations,
                    })
                    .then(function (response) {
                        console.log(response.data)
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
            destroyNews(index, id) {
                let self = this
                self.preloader = true
                    axios
                        .post('/destroy-news', {
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
        }
    }
</script>
