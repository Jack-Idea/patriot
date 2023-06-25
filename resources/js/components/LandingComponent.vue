<template>
    <section class="mt-[-84px]">
        <div id="heroPage" class="container hero-container flex w-full h-screen px-0 relative">
            <div id="mainBg" class="flex w-full h-full absolute left-0"></div> 
            <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
            <div class="w-full lg:w-2/3 h-full flex relative items-center justify-center lg:justify-start">
                <div class="flex flex-col mt-[-200px] lg:mt-[-100px] p-[5%] lg:p-0 lg:pl-[10%]">
                    <p class="uppercase font-light text-gray-200 text-sm text-center lg:text-left" style="text-shadow: 2px 2px 5px #000;">Новороссийская городская общественная организация</p>
                    <h1 class="text-white text-5xl uppercase font-medium mt-3 text-center lg:text-left" style="text-shadow: 2px 2px 5px #000;"> Спортивный клуб «Патриот»</h1>
                    <p class="uppercase text-gray-200 font-light text-sm mt-3 text-center lg:text-left lg:ml-auto" style="text-shadow: 2px 2px 5px #000;">имени Андрея Владимировича Фомина</p>
                </div>
                <div id="leftBottomBar" class="left-bar absolute bottom-0 left-0 hidden lg:flex flex-col w-full h-1/4 bg-white cursor-pointer justify-center p-[5%] lg:p-0 lg:pl-[10%]">
                    <p class="uppercase font-medium text-[#2d2d2d] mb-5">Спортивные секции</p>
                    <p class="text-[#2d2d2d] font-light">Все тренировки проходят в современных залах со специальным покрытием</p>
                    <p class="text-[#2d2d2d] font-light">Помещения оснащены многофункциональными системами вентиляции и кондиционирования</p>
                </div>
            </div>
            <div class="hidden lg:flex flex-col w-full lg:w-1/2 h-full absolute bottom-0 right-0">
                <div class="hero-benefits flex flex-col w-2/4 h-1/2 bg-black bg-opacity-70 relative ml-auto mt-auto overflow-hidden p-[5%] justify-center hidden lg:flex">
                    <span class="bg-white w-1 h-full absolute left-0"></span>
                    <p v-for="benefit in mainBenefits" class="mb-5 font-light hero-benefits__item flex items-center">
                        <span class="flex w-11/12">{{ benefit }}</span>
                    </p>
                </div>
                <div id="bottomBar" class="hidden lg:flex w-full h-1/4 relative justify-end mt-auto lg:mt-0">
                    <a id="phoneBtn" href="tel:+79184880722" class="right-bar-items bg-[var(--accent-color)] h-full w-1/2 lg:w-1/4 flex flex-col justify-center items-center hover:text-white">
                        <p class="uppercase text-sm text-center px-2">записаться на секцию</p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6 my-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                        <p>+7 (918) 488-07-22</p>
                    </a>
                    <div class="right-bar-items w-1/2 lg:w-1/4 flex relative">
                        <img src="img/judo.jpg" class="w-full" style="filter: sepia(30%);" alt="">
                        <div class="kinds-titles absolute bg-black w-full h-full bg-opacity-60 flex items-end" style="clip-path: polygon(0 35%, 0% 100%, 100% 100%);">
                            <p class="flex p-[15%]">Самбо</p>
                        </div>
                    </div>
                    <div class="right-bar-items w-1/2 lg:w-1/4 flex relative">
                        <img src="img/football.jpg" class="w-full" style="filter: sepia(30%);" alt="">
                        <div class="kinds-titles absolute bg-black w-full h-full bg-opacity-60 flex items-end" style="clip-path: polygon(0 35%, 0% 100%, 100% 100%);">
                            <p class="flex p-[15%]">Футбол</p>
                        </div>
                    </div>
                    <div class="right-bar-items w-1/2 lg:w-1/4 relative flex">
                        <img src="img/sambo.jpg" class="w-full" style="filter: sepia(30%);" alt="">
                        <div class="kinds-titles absolute bg-black w-full h-full bg-opacity-60 flex items-end" style="clip-path: polygon(0 35%, 0% 100%, 100% 100%);">
                            <p class="flex p-[15%]">Дзюдо</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MOBILE BOTTOM BAR -->
            <div class="absolute bottom-0 left-0 bg-white w-full flex left-bar justify-between lg:hidden">
                <div class="pl-[5%] py-6 flex flex-col justify-between">
                    <p class="uppercase font-medium text-[#2d2d2d] mb-10">Спортивные секции</p>
                    <ul class="flex text-gray-500">
                        <li>Самбо</li>
                        <li class="mx-3">Футбол</li>
                        <li>Дзюдо</li>
                    </ul>
                </div>
                <a class="flex flex-col w-1/2 bg-[var(--accent-color)] justify-center items-center">
                    <p class="uppercase text-sm text-center px-2">записаться на секцию</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6 my-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                    </svg>
                    <p>+7 (918) 488-07-22</p>
                </a>
            </div>
        </div>
        <!-- BENEFITS -->
        <div class="container py-20 mt-10 text-[#2d2d2d] flex flex-col">
            <h3 class="text-[var(--accent-color)] uppercase font-medium text-3xl text-center lg:text-left">Подробнее о преимуществах комплекса</h3>
            <div class="flex w-full flex-wrap mt-20 justify-between">
                <div class="flex flex-wrap relative xl:w-2/3 justify-between xl:justify-start">
                    <img id="orientirImg" src="img/benefits/box-hall.jpg" class="filter-imgs w-full lg:w-[30%] shadow-xl rounded-xl" alt="">
                    <div class="lg:w-[30%] lg:ml-4 my-4 lg:my-0 p-3 flex flex-col justify-center">
                        <p v-for="benefit in benefits.slice(0, 3)" class="text-[#2d2d2d] p-3 border-gray-200 text-center border-b-2 benefit-text">{{ benefit }}</p>
                    </div>
                    <img src="img/benefits/spa.jpg" class="filter-imgs w-full lg:w-[30%] shadow-xl rounded-xl lg:ml-4" alt="">
                    <img src="img/turnir.jpg" class="filter-imgs w-full lg:w-[68%] xl:w-[65%] shadow-xl rounded-xl mt-4" alt="">
                    <div class="lg:w-[30%] mt-4 lg:ml-4 p-3 flex flex-col justify-center">
                        <p v-for="benefit in benefits.slice(3, 6)" class="text-[#2d2d2d] p-3 border-gray-200 text-center border-b-2 benefit-text">{{ benefit }}</p>
                    </div>
                </div>
                <div class="xl:w-1/3 flex flex-wrap mt-4 xl:mt-0 justify-between xl:justify-start">
                    <img id="rightImg" src="img/benefits/restoran2.jpg" class="filter-imgs w-full lg:w-[35%] xl:w-full h-1/2 shadow-xl rounded-xl" alt="">
                    <div class="lg:w-[60%] xl:w-full p-3 mt-4 flex flex-col">
                        <p v-for="benefit in benefits.slice(6, 9)" class="text-[#2d2d2d] p-3 border-gray-200 text-center border-b-2 benefit-text">{{ benefit }}</p>
                    </div>
                </div>
                <div class="flex flex-wrap xl:w-2/3 mt-4 justify-between xl:justify-start">
                    <div class="lg:w-[35%] xl:w-[30%] p-3 flex flex-col justify-center">
                        <p v-for="benefit in benefits.slice(9, 12)" class="text-[#2d2d2d] p-3 border-gray-200 text-center border-b-2 benefit-text">{{ benefit }}</p>
                    </div>
                    <img src="img/benefits/sport-hall.jpg" class="filter-imgs w-full lg:w-[30%] shadow-xl rounded-xl lg:ml-4 mt-4 lg:mt-0" alt="">
                    <img src="img/benefits/group-hall.jpg" class="filter-imgs w-full lg:w-[30%] shadow-xl rounded-xl lg:ml-4 mt-4 lg:mt-0" alt="">
                </div>
                <div class="xl:w-1/3 flex flex-wrap mt-4 hidden xl:flex">
                    <img id="rightImg" src="img/benefits/field.jpg" class="filter-imgs w-full shadow-xl rounded-xl" alt="">
                </div>
            </div>
        </div>
        <!-- COACHES -->
        <div class="container py-20">
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
        <div class="container min-h-screen py-20 relative flex flex-col justify-between" style="background: url('img/cups.jpg') no-repeat center top / cover; filter: sepia(30%)">
            <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
            <h3 class="uppercase font-normal text-center lg:text-left text-3xl text-white relative leading-10">
                Каждый месяц!
            </h3>
            <div class="flex justify-center">      
                <h3 class="uppercase font-normal my-10 text-lg md:text-3xl text-white relative lg:leading-10 text-center lg:w-8/12">
                    Для наших воспитанников мы проводим внутренние городские соревнования, а лучших отправляем на областные!
                </h3>
            </div>
            <div class="grid lg:grid-cols-3 gap-5 relative">
                <div class="bg-white shadow-xl bg-opacity-90 text-[#2d2d2d] flex flex-col h-full p-10 items-center justify-center relative rounded-lg overflow-hidden">
                    <p class="text-center text-gray-600">Занятия проводят опытные тренера-педагоги, за плечами которых спортивные достижения и звания</p>
                    <div class="w-20 -rotate-45 absolute -right-6 -bottom-1">
                        <span class="bg-white flex w-full h-4"></span>
                        <span class="bg-blue-600 flex w-full h-4"></span>
                        <span class="bg-red-500 flex w-full h-4"></span>
                    </div>
                </div>
                <div class="bg-white shadow-xl bg-opacity-90 text-[#2d2d2d] flex flex-col h-full p-10 items-center justify-center relative rounded-lg overflow-hidden">
                    <p class="text-center text-gray-600">В летний период проводятся детские спортивные сборы, тренировки на улице, организуются походы, поездки на море и экскурсии</p>
                    <div class="w-20 -rotate-45 absolute -right-6 -bottom-1">
                        <span class="bg-white flex w-full h-4"></span>
                        <span class="bg-blue-600 flex w-full h-4"></span>
                        <span class="bg-red-500 flex w-full h-4"></span>
                    </div>
                </div>
                <div class="bg-white shadow-xl bg-opacity-90 text-[#2d2d2d] flex flex-col h-full p-10 items-center justify-center relative rounded-lg overflow-hidden">
                    <p class="text-center text-gray-600">Особое внимание уделяется нравственному и физическому воспитанию самых маленьких членов нашего Клуба</p>
                    <div class="w-20 -rotate-45 absolute -right-6 -bottom-1">
                        <span class="bg-white flex w-full h-4"></span>
                        <span class="bg-blue-600 flex w-full h-4"></span>
                        <span class="bg-red-500 flex w-full h-4"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- NEWS -->
        <div class="container min-h-screen py-20">
            <h3 class="uppercase font-medium text-3xl text-[var(--accent-color)] text-center lg:text-left">Последние новости</h3>
            <news-component></news-component>
            <div class="row flex justify-center w-full mt-16">
                <a href="/news" class="main-btn uppercase shadow-xl">
                    Все новости
                </a>
            </div>
        </div>
    </section>
</template>

<style scoped>
    .container {
        /* padding: 0; */
    }
    .hero-container {
        overflow: hidden;
        max-height: 1080px;
    }
    .left-bar {
        transform: scaleX(0);
        transform-origin: left;
        font-family: 'Oswald', sans-serif;
    }
    .right-bar-items {
        transform: scaleX(0);
        transform-origin: center;
        will-change: transform;
        font-family: 'Oswald', sans-serif;
    }
    .hero-benefits {
        transform: scaleY(0);
        transform-origin: bottom;
        font-family: 'Oswald', sans-serif;
    }
    .hero-benefits__item:last-child {
        margin-bottom: 0;
    }
    .kinds-titles {
        transform: scaleY(0);
        transform-origin: bottom;
    }
    .filter-imgs {
        filter: sepia(30%);
    }
    .benefit-text {
        font-weight: 300;
    }
    .benefit-text:last-child {
        border: none;
    }
</style>

<script>
    export default {
        data() {
            return {
                mainBenefits: [
                    "Большая собственная парковка", "Спортивный зал 36х22 метра", "Большая трибуна на 503 посадочных места", 
                    "Соревнования от местных до международных", "Детская комната с профессиональными педагогами и большим набором игрушек"
                ],
                benefits: [],
            }
        },
        mounted() {
            this.bottomBarHeight()
            this.getBenefits()
        },
        methods: {
            bottomBarHeight() {
                document.addEventListener('DOMContentLoaded', () => {
                    let windowWidth = window.innerWidth
                    let windowHeight = window.innerHeight
                    document.getElementById('heroPage').style = 'height:'+windowHeight+'px;'
                    let itemsWidth = document.getElementById('phoneBtn').clientWidth
                    let bar = document.getElementById('bottomBar')
                    let leftBar = document.getElementById('leftBottomBar')
                    if (windowWidth > 1024) {
                        bar.style = 'height:'+itemsWidth+'px;';
                    } else {
                        bar.style = 'height:'+itemsWidth+'px; margin-bottom:'+itemsWidth+'px;';
                    }
                    leftBar.style = 'height:'+itemsWidth+'px;';
                    setTimeout(() => {
                        startLanding()
                        // let benefitImg = document.querySelectorAll('.benefit-img')
                        let benefitImg = document.getElementById('orientirImg');
                        console.log(benefitImg.clientHeight)
                        let slaveImg = document.getElementById('rightImg');
                        slaveImg.style = 'height:'+benefitImg.clientHeight+'px;'
                        // benefitImg.forEach((item) => {
                        //     item.style = 'height:'+benefitImg[0].clientWidth+'px;'
                        // })
                        // console.log(benefitImg[0].clientWidth)
                    }, 1000)
                })
            },
            getBenefits() {
                let self = this
                axios
                    .get('js/benefits.json')
                    .then(function (response) {
                        self.benefits = response.data.benefits
                    })
            },
        }
    }
</script>
