<template>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-6 w-full mt-16">
        <div v-for="item in news.slice(0, quantity)" class="news-card bg-white flex flex-col w-full min-h-[350px] shadow-lg relative">
            <div class="news-card__img flex w-full h-[80%] min-h-[280px] overflow-hidden relative rounded-t-lg" :style="`background: url('/img/uploads/news/${item.img}') no-repeat center center / cover;`">
                <div class="absolute bottom-0 flex w-full rounded-t-lg overflow-hidden" style="border-top-left-radius: 8px; border-top-right-radius: 8px;">
                    <div class="bg-white bg-opacity-70 flex w-full absolute h-full left-0 rounded-t-lg" style="backdrop-filter: blur(4px);"></div>
                    <h4 class="px-5 py-3 relative">
                        {{ item.title }}
                    </h4>
                </div>
            </div>
            <div class="flex justify-between items-center text-[#2d2d2d] px-5 h-[20%] min-h-[70px] font-light">
                <a v-if="!isFederation" :href="'/news/'+item.id" class="flex hover:text-[#2d2d2d]">Подробнее...</a>
                <a v-if="isFederation" :href="'/federation/news/'+item.id" class="flex hover:text-[#2d2d2d]">Подробнее...</a>
                <span class="flex font-normal opacity-50">{{ item.created_at }}</span>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .news-card {
        font-family: 'Oswald', sans-serif;
        border-radius: 8px !important; 
        overflow: hidden !important;
    }
    .news-card__img {
        filter: sepia(30%);
    }
</style>

<script>
    export default {
        props: ['quantity'],
        data() {
            return {
                news: [],
                isFederation: false
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
                if (federation !== 'federation') {
                    self.isFederation = false
                    axios
                        .get('/get-news')
                        .then(function (response) {
                            self.news = response.data.news
                        })
                } else {
                    self.isFederation = true
                    axios
                        .get('/federation/get-news')
                        .then(function (response) {
                            self.news = response.data.news
                        })
                }
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
