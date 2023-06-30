<template>
    <div class="relative">
        <div v-if="msgStatus" class="fixed top-20 left-0 flex justify-center w-full uk-animation-fade z-50">
            <span class="flex bg-green-600 p-5 rounded-lg bg-opacity-80 shadow-xl">{{ msgStatus }}</span>
        </div>
        <div class="form-group flex flex-col">
            <label for="title" class="">Заголовок</label>
            <textarea id="title" maxlength="191" rows="4" type="text" class="form-control main-input d-flex" v-model="newsTitle"></textarea>
        </div>
        <div class="form-group flex flex-col mt-10">
            <label for="newsDescription" class="">Описание</label>
            <textarea id="newsDescription" rows="10" type="text" class="form-control main-input d-flex" v-model="newsDescription"></textarea>
        </div>
        <div class="grid lg:grid-cols-2 gap-5 w-full mt-10">
            <!-- MAIN PHOTO -->
            <div class="form-group flex flex-col w-full">
                <label for="newsImg" class="form-label d-flex"><span style="color: #222;">Главное фото новости (одно)</span></label>
                <div class="file-input" uk-form-custom="target: true">
                    <input type="file" id="newsImg" @change="fileUpload">
                    <input class="uk-input uk-form-width-medium main-input file-input" type="text" placeholder="Выберите файл" disabled>
                </div>
                <div v-if="img" class="w-full mt-10">
                    <img :src="'img/uploads/news/'+img" class="w-full lg:w-2/3" alt="">
                </div>
            </div>
            <!-- MULTI PHOTO -->
            <div class="form-group flex flex-col w-full">
                <label for="newsImg" class="form-label d-flex"><span style="color: #222;">Дополнительные фото (до 10ти)</span></label>
                <div class="file-input" uk-form-custom="target: true">
                    <input type="file" id="newsImg" @change="fileUploadNews" multiple>
                    <input class="uk-input uk-form-width-medium main-input file-input" type="text" placeholder="Выберите файл" disabled>
                </div>
                <div v-if="newsPath" class="w-full flex flex-wrap mt-10 gap-3">
                    <div v-for="img in newsPath" class="multiple-imgs">
                        <img :src="'img/uploads/news/'+img.img" class="w-full" alt="">
                    </div>
                </div>
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
    textarea:focus {
        border: 1px solid var(--accent-color);
        outline: none;
    }
</style>

<script>
    export default {
        data() {
            return {
                preloader: false,
                newsTitle: '',
                newsDescription: '',
                msgStatus: '',
                img: '',
                newsPath: '',
                multipleImgs: false,
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
                        'description': self.newsDescription,
                        'img': self.img,
                        'imgs': self.newsPath,
                        'multiple': self.multipleImgs
                    })
                    .then(function (response) {
                        console.log(response.data)
                        setTimeout(() => {
                            self.msgStatus = response.data.msg_status
                            self.newsTitle = ''
                            self.newsDescription = ''
                            self.img = ''
                            self.newsPath = ''
                            self.multipleImgs = false
                            self.preloader = false
                            self.getNews()
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
            fileUploadNews(e) {
                this.countFiles = e.target.files.length
                this.multipleImgs = true
                this.file = e.target.files
                this.uploadFile = true
                this.fileSubmitNews(e)
            },
            fileSubmit(e) {
                e.preventDefault();
                let currentObj = this;

                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
                formData.append('file', this.file);

                axios.post('/store-news-img', formData, config)
                    .then(function (response) {
                        currentObj.img = response.data.img;

                        console.log(response.data, '1')
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
            },
            fileSubmitNews(e) {
                e.preventDefault();
                let currentObj = this;

                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
                if (this.multipleImgs) {
                    for(let i = 0; i < this.countFiles; i++) {
                        formData.append('file[]', this.file[i]);
                    }
                } else {
                    formData.append('file', this.file);
                }

                axios.post('/store-news-imgs', formData, config)
                    .then(function (response) {
                        if (Array.isArray(response.data.imgs)) {
                            currentObj.newsPath = response.data.imgs;
                        } else {
                            currentObj.img = response.data.imgs;
                        }
                        currentObj.multipleImgs = true
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
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
            newsPath() {
                setTimeout(() => {
                    let imgs = document.querySelectorAll('.multiple-imgs')
                    imgs.forEach((item) => {
                        let ratio = item.clientWidth / item.clientHeight
                        if (ratio === 1) {
                            item.classList.add('w-[49%]')
                        } else {
                            item.classList.add('w-full')
                        }
                    })

                }, 1000)
            }
        }
    }
</script>
