<template>
    <section id="mainSection" class="mt-[-70px]">
        <div id="heroPage" class="container hero-container flex w-full h-screen px-0 relative">
            <div id="federationBg" class="flex w-full h-full absolute left-0"></div> 
            <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
            <div class="w-full lg:w-2/3 h-full flex relative items-center justify-center lg:justify-start">
                <div class="flex flex-col mt-[-200px] lg:mt-[-100px] p-[5%] lg:p-0 lg:pl-[7%]">
                    <p class="uppercase font-light text-gray-200 text-sm text-center lg:text-left" style="text-shadow: 2px 2px 5px #000;">Новороссийская городская общественная организация</p>
                    <h1 class="text-white text-5xl uppercase font-medium mt-3 text-center lg:text-left" style="text-shadow: 2px 2px 5px #000;">ФЕДЕРАЦИЯ БОРЬБЫ САМБО И ДЗЮДО</h1>
                </div>
            </div>
        </div>
        <!-- NEWS -->
        <div class="container py-20 lg:mt-[75px]">
            <h3 class="uppercase font-medium text-3xl text-[var(--accent-color)] text-center lg:text-left">Последние новости</h3>
            <news-component :quantity="8"></news-component>
            <div class="row flex justify-center w-full mt-16">
                <a href="/news" class="main-btn uppercase shadow-xl">
                    Все новости
                </a>
            </div>
        </div>
        <!-- PARTNERS -->
        <div class="container pb-20">
            <h3 class="uppercase font-medium text-3xl text-[var(--accent-color)] text-center lg:text-left">Наши партнеры</h3>
            <div class="w-full mt-16">
                <div class="flex flex-wrap justify-center items-center">
                    <div class="lg:w-[50%] md:w-[50%]">
                        <img src="/img/partners/sfp2.png" class="partners-logo w-[80%] mx-auto md:mx-0 lg:mx-auto" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
    #federationBg {
        background: url("/img/boy.jpg") no-repeat center top / cover;
        /* filter: grayscale(50); */
        /* opacity: 0.4; */
    }
    .hero-container {
        overflow: hidden;
        max-height: 1080px;
    }
    .filter-imgs {
        filter: sepia(30%);
    }
    @media screen and (max-width: 768px) {
        .logo {
            width: 75px !important;
        }
    }
</style>

<script>
    export default {
        data() {
            return {
            }
        },
        mounted() {
            this.bottomBarHeight()
        },
        methods: {
            bottomBarHeight() {
                document.addEventListener('DOMContentLoaded', () => {
                    let windowWidth = window.innerWidth
                    let windowHeight = window.innerHeight
                    document.getElementById('heroPage').style = 'height:'+windowHeight+'px;'
                })
            }
        }
    }
</script>
