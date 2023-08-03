<template>
    <section id="mainSection" class="mt-[-70px]">
        <div id="heroPage" class="container hero-container flex w-full h-screen px-0 relative">
            <div id="mainBg" class="flex w-full h-full absolute left-0"></div> 
            <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
            <div class="w-full lg:w-2/3 h-full flex relative items-center justify-center lg:justify-start">
                <div class="flex flex-col mt-[-200px] lg:mt-[-100px] p-[5%] lg:p-0 lg:pl-[7%]">
                    <p class="uppercase font-light text-gray-200 text-sm text-center lg:text-left" style="text-shadow: 2px 2px 5px #000;">Новороссийская городская общественная организация</p>
                    <h1 class="text-white text-5xl uppercase font-medium mt-3 text-center lg:text-left" style="text-shadow: 2px 2px 5px #000;">ФЕДЕРАЦИЯ БОРЬБЫ САМБО И ДЗЮДО</h1>
                </div>
            </div>
        </div>
        <!-- COACHES -->
        <div class="container py-20 relative overflow-hidden">
        <img src="/img/logo-bg.svg" class="absolute top-[5%] left-[-25%] lg:left-0 z-[-1] opacity-30 lg:rotate-0 w-[150%] lg:w-full" style="pointer-events: none;" alt="">  
            <div class="flex flex-col items-center">
                <h3 class="text-[var(--accent-color)] uppercase font-medium text-3xl">Наши тренеры</h3>
                <p class="text-[#2d2d2d] opacity-80 mt-5 md:w-2/3 lg:w-1/2 text-center">Все тренеры Клуба являются профессиональными спортсменами, регулярно повышающими квалификацию. Они стараются стать для своих воспитанников друзьями и старшими товарищами.</p>
            </div>
            <coaches-component :quantity="4"></coaches-component>
            <div class="row flex justify-center w-full mt-5">
                <a href="/coaches" class="main-btn uppercase shadow-xl">
                    Все тренеры
                </a>
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
            <partners-component></partners-component>
        </div>
    </section>
</template>

<style scoped>
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
