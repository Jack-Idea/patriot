<template>
    <section>
        <div class="container hero-container flex w-full h-screen px-0 relative">
            <div id="mainBg" class="flex w-full h-full absolute left-0" style="background: url('img/10.jpg') no-repeat right top / cover;"></div> 
            <!-- <div class="flex w-full h-full absolute" style="background: url('img/preview.jpg') no-repeat right top / cover;"></div>  -->
            
            <!-- <iframe class="flex absolute top-0 left-0" src="https://www.youtube.com/embed/tK8KL8-EfPQ?controls=0&autoplay=1&mute=1&loop=1&playlist=tK8KL8-EfPQ&end=20" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="pointer-events: none;"></iframe> -->
            <!-- <video src="img/team.mp4" class="absolute h-[120%] top-[-10%] max-h-[200%]" autoplay muted loop></video> -->
            <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
            <div class="w-2/3 h-full flex relative items-center">
                <div class="flex flex-col mt-[-100px] pl-[10%]">
                    <p class="uppercase font-light text-gray-200 text-sm" style="text-shadow: 2px 2px 5px #000;">Новороссийская городская общественная организация</p>
                    <h1 class="text-white text-5xl uppercase font-medium mt-3" style="text-shadow: 2px 2px 5px #000;"> Спортивный клуб «Патриот»</h1>
                    <p class="uppercase text-gray-200 font-light text-sm mt-3 flex ml-auto" style="text-shadow: 2px 2px 5px #000;">имени Андрея Владимировича Фомина</p>
                </div>
                <div id="leftBottomBar" class="left-bar absolute bottom-0 left-0 flex flex-col w-full h-1/4 bg-white cursor-pointer justify-center pl-[10%]">
                    <p class="uppercase font-medium text-[#2d2d2d] mb-5">Спортивные секции</p>
                    <p class="text-[#2d2d2d]">Все тренировки проходят в современных залах со специальным покрытием</p>
                    <p class="text-[#2d2d2d]">Помещения оснащены многофункциональными системами вентиляции и кондиционирования</p>
                </div>
            </div>
            <div class="flex flex-col w-1/2 h-full absolute right-0">
                <div class="hero-benefits flex flex-col w-2/4 h-1/2 bg-black bg-opacity-70 relative ml-auto mt-auto overflow-hidden p-[5%] justify-center">
                    <span class="bg-white w-1 h-full absolute left-0"></span>
                    <p v-for="benefit in mainBenefits" class="mb-5 font-light hero-benefits__item flex items-center">

                        <span class="flex w-11/12">{{ benefit }}</span>
                    </p>
                </div>
                <div id="bottomBar" class="flex w-full h-1/4 relative justify-end">
                    <a id="phoneBtn" href="tel:+79184880722" class="right-bar-items bg-[var(--accent-color)] h-full w-1/4 flex flex-col justify-center items-center hover:text-white">
                        <p class="uppercase text-sm">записаться на секцию</p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6 my-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                        <p>+7 (918) 488-07-22</p>
                    </a>
                    <div class="right-bar-items w-1/4 flex relative">
                        <img src="img/judo.jpg" style="filter: sepia(30%);" alt="">
                        <div class="kinds-titles absolute bg-black w-full h-full bg-opacity-60 flex items-end" style="clip-path: polygon(0 35%, 0% 100%, 100% 100%);">
                            <p class="flex p-[15%]">Самбо</p>
                        </div>
                    </div>
                    <div class="right-bar-items w-1/4 flex relative">
                        <img src="img/football.jpg" style="filter: sepia(30%);" alt="">
                        <div class="kinds-titles absolute bg-black w-full h-full bg-opacity-60 flex items-end" style="clip-path: polygon(0 35%, 0% 100%, 100% 100%);">
                            <p class="flex p-[15%]">Футбол</p>
                        </div>
                    </div>
                    <div class="right-bar-items w-1/4 flex relative">
                        <img src="img/sambo.jpg" style="filter: sepia(30%);" alt="">
                        <div class="kinds-titles absolute bg-black w-full h-full bg-opacity-60 flex items-end" style="clip-path: polygon(0 35%, 0% 100%, 100% 100%);">
                            <p class="flex p-[15%]">Дзюдо</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BENEFITS -->
        <div class="container py-[5%] text-[#2d2d2d] flex flex-col">
            <h3 class="text-blue-500 uppercase font-medium text-3xl">Подробнее о преимуществах комплекса</h3>
            <div class="flex w-full flex-wrap mt-10 justify-between">
                <div class="flex flex-wrap relative w-2/3">
                    <img id="orientirImg" src="img/benefits/box-hall.jpg" class="filter-imgs w-[30%] shadow-xl rounded-xl" alt="">
                    <div class="w-[30%] ml-4 p-3 flex flex-col justify-center">
                        <p v-for="benefit in benefits.slice(0, 3)" class="text-[#2d2d2d] p-3 border-gray-200 text-center border-b-2 benefit-text">{{ benefit }}</p>
                    </div>
                    <img src="img/benefits/spa.jpg" class="filter-imgs w-[30%] shadow-xl rounded-xl ml-4" alt="">
                    <img src="img/turnir.jpg" class="filter-imgs w-[62%] shadow-xl rounded-xl mt-4" alt="">
                    <div class="w-[30%] mt-4 ml-4 p-3 flex flex-col justify-center">
                        <p v-for="benefit in benefits.slice(3, 6)" class="text-[#2d2d2d] p-3 border-gray-200 text-center border-b-2 benefit-text">{{ benefit }}</p>
                    </div>
                </div>
                <div class="w-1/3 flex flex-wrap">
                    <img id="rightImg" src="img/benefits/restoran2.jpg" class="filter-imgs w-full h-1/2 shadow-xl rounded-xl" alt="">
                    <div class="w-full p-3 mt-4 flex flex-col">
                        <p v-for="benefit in benefits.slice(6, 9)" class="text-[#2d2d2d] p-3 border-gray-200 text-center border-b-2 benefit-text">{{ benefit }}</p>
                    </div>
                </div>
                <div class="flex w-2/3 mt-4">
                    <div class="w-[30%] p-3 flex flex-col justify-center">
                        <p v-for="benefit in benefits.slice(9, 12)" class="text-[#2d2d2d] p-3 border-gray-200 text-center border-b-2 benefit-text">{{ benefit }}</p>
                    </div>
                    <img src="img/benefits/sport-hall.jpg" class="filter-imgs w-[30%] shadow-xl rounded-xl ml-4" alt="">
                    <img src="img/benefits/group-hall.jpg" class="filter-imgs w-[30%] shadow-xl rounded-xl ml-4" alt="">
                </div>
                <div class="w-1/3 flex flex-wrap mt-4">
                    <img id="rightImg" src="img/benefits/field.jpg" class="filter-imgs w-full shadow-xl rounded-xl" alt="">
                </div>
            </div>
        </div>
        <!-- COACHES -->
        <div class="container py-[5%]">
            <h3 class="text-blue-500 uppercase font-medium text-3xl">Наши тренеры</h3>
            <div class="flex flex-wrap w-full mt-[5%] justify-between">
                <div v-for="coach in coaches.slice(0, 4)" class="coach-card flex w-[24%] min-h-[210px] shadow-[1px_4px_10px_rgba(0,0,0,0.2)] rounded-xl relative mb-10">
                    <p class="flex text-[#2d2d2d] text-lg p-5">{{ coach.lastname }} <br> {{ coach.firstname }}</p>
                    <img :src="'img/coaches/'+coach.img+'.png'" class="h-[110%] flex ml-auto absolute bottom-0 right-5" alt="">
                    <img src="img/logo.png" class="flex w-1/3 absolute bottom-0 p-5" style="opacity: 0.7;" alt="">
                </div>
            </div>
        </div>
        <!--  -->
        <div class="container min-h-screen py-[5%] bg-blue-500">
            <h3 class="text-blue-500 uppercase font-medium text-3xl"></h3>
        </div>
    </section>
</template>

<style scoped>
    .container {
        /* padding: 0; */
    }
    .hero-container {
        overflow: hidden;
        max-height: 980px;
    }
    .left-bar {
        transform: scaleX(0);
        transform-origin: left;
    }
    .right-bar-items {
        transform: scaleX(0);
        transform-origin: center;
        will-change: transform;
    }
    .hero-benefits {
        transform: scaleY(0);
        transform-origin: bottom;
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
                coaches: []
            }
        },
        mounted() {
            this.bottomBarHeight()
            this.getBenefits()
            this.getCoaches()
        },
        methods: {
            bottomBarHeight() {
                document.addEventListener('DOMContentLoaded', () => {
                    let itemsWidth = document.getElementById('phoneBtn').clientWidth
                    let bar = document.getElementById('bottomBar')
                    let leftBar = document.getElementById('leftBottomBar')
                    bar.style = 'height:'+itemsWidth+'px;';
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
            getCoaches() {
                let self = this
                axios
                    .get('js/coaches.json')
                    .then(function (response) {
                        self.coaches = response.data.coaches
                    })
            }
        }
    }
</script>
