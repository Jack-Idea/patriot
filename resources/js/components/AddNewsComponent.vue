<template>
    <div>
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
                <div v-if="newsPath" class="w-full flex flex-wrap mt-10">
                    <div v-for="img in newsPath" class="multiple-imgs">
                        <img :src="'img/uploads/news/'+img.img" class="w-full" alt="">
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
                newsTitle: '',
                newsDescription: '',
                msgStatus: '',
                img: '',
                newsPath: '',
                multipleImgs: false
            }
        },
        mounted() {
        },
        methods: {
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
                        currentObj.multipleImgs = false
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
            }
        },
        watch: {
            newsPath() {
                setTimeout(() => {
                    let imgs = document.querySelectorAll('.multiple-imgs')
                    console.log(imgs)

                }, 1000)
            }
        }
    }
</script>
