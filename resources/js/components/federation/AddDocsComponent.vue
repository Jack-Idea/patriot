<template>
    <div class="relative">
        <div v-if="msgStatus" class="fixed top-20 left-0 flex justify-center w-full uk-animation-fade z-50">
            <span class="flex bg-green-600 p-5 rounded-lg bg-opacity-80 shadow-xl">{{ msgStatus }}</span>
        </div>
        <div class="form-group flex flex-col">
            <label for="title" class="">Заголовок</label>
            <textarea id="title" maxlength="191" rows="4" type="text" class="form-control main-input d-flex" v-model="title"></textarea>
        </div>
        <div class="flex flex-wrap justify-between w-full">
            <div class="form-group flex flex-col mt-10 w-full">
                <label for="start" class="">Ссылка на документ</label>
                <input type="text" id="start" v-model="link">
            </div>
        </div>
        
        <div class="mt-10 flex justify-center">
            <button v-if="!preloader" @click.prevent="storeNews" class="main-btn bg-green-600 shadow-xl">Сохранить</button>
            <div v-if="preloader" class="main-btn bg-green-600"><div uk-spinner></div></div>
        </div>

        <div class="flex flex-col">
            <div class="w-full flex flex-col mt-10">
                <div v-for="doc in docs" class="w-full flex items-center relative">
                    <span v-if="!preloader" @click.prevent="destroyNews(doc.id)" class="absolute w-10 h-10 bg-red-600 top-4 right-0 rounded-full z-[100] cursor-pointer flex justify-center items-center">
                        <span uk-icon="icon: trash;"></span>
                    </span>
                    <a :href="doc.link" target="_blank" class="text-gray-700 flex items-center p-3 bg-white rounded-lg shadow-lg mb-3 hover:no-underline w-[80%]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                        <p class="ml-2 w-[90%]">{{ doc.title }}</p>
                    </a>
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
                title: '',
                link: '',
                docs: '',
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
                    .get('/get-docs')
                    .then(function (response) {
                        self.docs = response.data.docs
                    })
            },
            storeNews() {
                let self = this
                self.preloader = true
                axios
                    .post('/store-docs', {
                        "title": self.title,
                        "link": self.link
                    })
                    .then(function (response) {
                        setTimeout(() => {
                            self.msgStatus = response.data.msg_status
                            self.preloader = false
                            self.title = ''
                            self.link = ''
                            self.getNews()
                        }, 1000)
                        setTimeout(() => {
                            self.msgStatus = ''
                        }, 3000)
                    })
            },
            destroyNews(id) {
                let self = this
                self.preloader = true
                    axios
                        .post('/destroy-docs', {
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
