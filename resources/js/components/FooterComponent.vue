<template>
    <footer v-show="footer" class="text-white body-font bg-[#2d2d2d]">
        <div class="container mx-auto flex flex-wrap px-[5%] py-5 flex-col md:flex-row items-center">
            <div class="flex w-full items-center">
                <div class="w-1/3 h-0.5 bg-white flex justify-center"></div>
                <a v-if="footerView" href="/patriot" class="w-1/3 flex justify-center">
                    <img src="/img/logo.png" class="logo lg:w-40 scale-100" alt="">
                </a>
                <a v-if="!footerView" href="/patriot" class="w-1/3 flex justify-center">
                    <img src="/img/logo-federation.png" class="logo lg:w-40 scale-100" alt="">
                </a>
                <div class="w-1/3 h-0.5 bg-white flex justify-center"></div>
            </div>
            <div class="flex w-full lg:mt-20 mt-10">
                <div class="w-1/3"></div>
                <div class="w-1/3 h-48 flex justify-center">
                    <span class="flex w-0.5 h-full bg-white"></span>
                </div>
                <div class="w-1/3"></div>
            </div>
            <div class="flex flex-col lg:flex-row w-full justify-between items-center lg:items-end mt-10">
                <a href="/policy" class="hover:text-white">Политика конфиденциальности</a>
                <span class="flex items-center mb-3 mt-3 lg:mb-0 font-light"><span>{{ todayYear }}</span><span class="mx-2 text-lg">&copy;</span><span>Все права защищены.</span></span>
                <a href="/agreement" class="hover:text-white">Пользовательское соглашение</a>
            </div>
        </div>
    </footer>
</template>

<style scoped>
    footer {
        font-family: 'Oswald', sans-serif;
    }
</style>

<script>
    export default {
        data() {
            return {
                footer: false,
                footerView: true,
                todayYear: ''
            }
        },
        mounted() {
            this.checkFooterPage()
            this.getYear()
        },
        methods: {
            checkFooterPage() {
                let href = window.location.pathname
                let federation = href.split('/')[1]
                if (href !== '/') {
                    this.footer = true
                }
                if (federation === 'federation') {
                    this.footerView = false
                } else {
                    this.footerView = true
                }
            },
            getYear() {
                let dateNow = Date.now();
                let year =  Date(dateNow);
                year = year.split(' ');
                this.todayYear = year[3];
            }
        }
    }
</script>
