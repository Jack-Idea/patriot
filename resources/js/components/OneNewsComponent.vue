<template>
    <div class="relative">
        <div class="flex w-[85%]">
            <h4 class="text-[#424242] text-2xl font-medium">{{ news.title }}</h4>
        </div>
        <div class="flex flex-wrap flex-col md:flex-row mt-10 gap-8">
            <div class="md:w-[40%]">
                <img v-if="news" :src="'/img/uploads/news/'+news.img" class="w-full" alt="">
            </div>
            <div class="md:w-[45%]">
                <p class="text-[#555] whitespace-pre-wrap">{{ news.description }}</p>
            </div>
            <div class="lg:w-[85%] flex flex-wrap gap-4">
                <div v-if="news" v-for="img in news.imgs" class="multiple-imgs">
                    <img :src="'/img/uploads/news/'+img.img" class="w-full" alt="">
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    img {
        border-radius: 8px;
        box-shadow: 1px 4px 15px rgba(0,0,0,0.3);
        filter: sepia(30%);
    }
</style>

<script>
    export default {
        data() {
            return {
                news: ''
            }
        },
        mounted() {
            this.getNews()
        },
        methods: {
            getNews() {
                let self = this
                let href = window.location.pathname
                let federation = href.split('/')[1]
                let id = window.location.pathname
                id = id.split('/')
                if (federation !== 'federation') {
                    id = id[2]
                } else {
                    id = id[3]
                }
                axios
                    .post('/get-one-news', {
                        'id': id
                    })
                    .then(function (response) {
                        self.news = response.data.news
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
            news() {
                setTimeout(() => {
                    let imgs = document.querySelectorAll('.multiple-imgs')
                    let clientW = window.innerWidth
                    if (clientW >= 768) {
                        imgs.forEach((item) => {
                            let ratio = item.clientWidth / item.clientHeight
                            if (ratio === 1) {
                                item.classList.add('w-[25%]')
                            } else {
                                item.classList.add('w-[37.5%]')
                            }
                        })
                    }

                }, 1000)
            }
        }
    }
</script>
