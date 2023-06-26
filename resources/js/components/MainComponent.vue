<template>
    <section class="relative flex items-center justify-center h-screen overflow-hidden">      
        <div class="container absolute flex justify-center items-center w-full h-full">
            <div id="org" v-for="org in organizations" class="container bg-img flex justify-center items-center w-full lg:w-10/12 h-[40%] lg:h-[80%] lg:bottom-[5%] lg:left-[5%] top-32 lg:top-auto absolute lg:rounded-lg" :style="'background: url(img/'+org.img+') no-repeat center bottom / cover'">
                <div class="absolute top-0 left-0 lg:bg-black flex w-full h-full lg:bg-opacity-40 lg:rounded-lg"></div>
            </div>
            <!-- COLOR LINE -->
            <div id="colorLine" class="flex absolute lg:w-[200px] xl:w-[300px] h-full lg:ml-[30%] left-[3%] lg:left-auto top-0 pointer-events-none z-0"></div>
            <!-- MAIN OFFER -->
            <div class="absolute flex justify-center w-full lg:items-center lg:left-[5%] lg:bottom-[5%] top-32 bottom-0 lg:bottom-auto lg:top-auto">
                <div class="flex flex-col absolute lg:left-0 top-0 lg:top-auto bottom-[5%] lg:bottom-auto w-10/12 lg:w-2/5 mt-8 items-end lg:items-start">
                    <h2 id="mainTitle" class="text-black uppercase px-[5%] py-[5%] lg:py-[3%] w-full rounded-lg lg:rounded-l-none main-title justify-center lg:justify-start text-center lg:text-start">{{ selectedOrg.title }}</h2>
                    <p class="flex mt-auto lg:mt-5 lg:pl-[5%] text-[#2d2d2d] lg:text-white font-light text-end lg:text-start w-[220px]">Каждый месяц у нас занимается более 1000 человек</p>
                    <p class="mt-2 lg:pl-[5%] text-[#2d2d2d] lg:text-white font-light text-end lg:text-start">Занятия с 5-ти лет</p>
                    <!-- BTN TO SITE -->
                    <a :href="selectedOrg.link" id="mainBtn" class="btn-to-site flex items-center mt-7 lg:ml-[5%]">
                        Перейти на сайт
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="btn-to-site__icon ml-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <!-- SIDE LINE -->
        <div class="hidden lg:flex absolute w-[1px] h-[80%] bg-[#d9d9d9] right-[5%] bottom-[5%]"></div>
        <!-- MAIN BTNS BLOCK -->
        <div class="flex flex-wrap lg:flex-col absolute left-[5%] lg:left-auto right-[5%] lg:right-[7%] lg:bottom-[10%] rounded-lg shadow-lg mt-36 lg:mt-0">
            <div v-for="(org, index) in organizations" @click.prevent="selectOrg(index)" class="org-btn flex justify-center items-center text-center text-black bg-white">{{ org.shortTitle }}</div>
        </div>
        <!-- HEADER -->
        <div class="flex w-full justify-between items-center absolute top-4 h-20 px-[5%]">
            <!-- LOGO -->
            <div class="main-header flex">
                <a href="/">
                    <img :src="'img/'+selectedOrg.logo+'.png'" class="logo" alt="">
                </a>
            </div>
            <div class="hidden lg:flex w-[70%] h-5 items-center">
                <div class="w-full h-[1px] bg-[#d9d9d9]"></div>
                <span class="text-[#c9c9c9] uppercase text-sm mx-[8px] leading-[13px] -mt-0.5">патриот</span>
                <div class="w-full h-[1px] bg-[#d9d9d9]"></div>
            </div>
            <!-- HEADER PHONE -->
            <div class="flex main-org-phone-wrap items-center z-[200]">
                <a :href="'tel:+'+selectedOrg.tel" class="text-black flex main-org-phone items-center font-light">
                    +{{ selectedOrg.tel }}
                    <span id="phoneBg" class="main-phone-icon ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </section>
</template>

<style scoped>
    body, section {
        background: var(--bg-color) !important;
        max-height: 1080px !important;
        font-family: 'Oswald', sans-serif;
    }
    .container {
        max-width: 1920px;
    }
    .bg-img {
        /* filter: grayscale(50%); */
    }
    .main-title {
        font-size: calc(var(--index)*1);
        display: flex;
        align-items: center;
        background: var(--bg-color);
    }
    .org-btn {
        border-bottom: 1px solid #d9d9d9;
        cursor: pointer;
        padding: 16px;
        font-size: calc(var(--index)*0.65);
        width: calc(var(--index)*7.2);
        height: calc(var(--index)*4.6);
    }
    .org-btn:first-child {
        background: #2d2d2d;
        color: #fff;
        border-top-right-radius: 8px;
        border-top-left-radius: 8px;
    }
    .org-btn:last-child {
        border-bottom-right-radius: 8px;
        border-bottom-left-radius: 8px;
    }
    .logo {
        width: calc(var(--index)*5);
        transform: scale(1);
    }
    .main-org-phone:hover {
        text-decoration: none;
        color: #2d2d2d;
    }
    .main-phone-icon {
        background: var(--accent-color);
        color: #fff;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        padding: 8px;
    }
    #colorLine {
        background: var(--accent-color);
        opacity: 0.4;
        transition: all .3s ease-in-out;
    }
    .btn-to-site {
        width: 220px;
        height: 45px;
        justify-content: center;
        align-items: center;
        text-transform: uppercase;
        border-radius: 4px;
        font-size: 17px;
        transition: all .3s ease-in-out;
        background: var(--accent-color);
    }
    .btn-to-site:hover {
        color: #2d2d2d;
        text-decoration: none;
    }
    .btn-to-site__icon {
        width: 28px;
    }
    @media screen and (min-width: 1920px) {   
        body {
            font-size: 20px !important;
        }
        h1, h2, h3, h4, h5, h6 {
            font-size: 50px !important;
        }
        .logo {
            width: 144px;
        }
        .main-title {
            font-size: 30px !important;
        }
        .main-org-phone {
            font-size: 23px;
        }
        .org-btn {
            max-width: 232px;
            max-height: 147px;
            font-size: 19px;
        }
    }
    @media screen and (max-width: 1024px) {
        #colorLine {
            width: calc(var(--index)*9.3);
        }
        .main-title {
            background: rgba(242, 248, 252, .85);
        }
        .org-btn {
            padding: 8px 16px;
            border-right: 1px solid #d9d9d9;
            font-size: calc(var(--index)*1.1);
            width: calc((100vw - 12%) / 3);
            height: auto;
        }
        .org-btn:first-child {
            border-top-right-radius: 0;
        }
        .org-btn:nth-last-child(3) {
            border-top-right-radius: 8px;
            border-right: none;
        }
        .org-btn:nth-last-child(2) {
            border-bottom-left-radius: 8px;
            width: calc((100vw - 12%) / 2);
            border-bottom: none;
        }
        .org-btn:last-child {
            border-bottom-left-radius: 0;
            width: calc((100vw - 12%) / 2);
            border-bottom: none;
            border-right: none;
        }
    }
    @media screen and (max-width: 768px) {
        .logo {
            width: calc(var(--index)*8);
        }
        .btn-to-site {
            font-size: calc(var(--index)*1);
        }
        .main-title {
            font-size: calc(var(--index)*1.3);
        }
        .main-org-phone-wrap {
            height: calc(var(--index)*5);
        }
        .main-org-phone {
            font-size: calc(var(--index)*1.5);
        }
        .main-phone-icon {
            width: calc(var(--index)*2.3);
        }
    }
</style>

<script>
    export default {
        data() {
            return {
                selectedSection: 0,
                scrollActive: true,
                selectedOrg: {
                    "id": 1,
                        "title": "Новороссийская городская общественная организация Спортивный клуб «Патриот» имени Андрея Владимировича Фомина",
                        "shortTitle": "Спортивный клуб «Патриот»",
                        "img": "patriot.jpg",
                        "logo": "logo",
                        "class": "patriot",
                        "tel": 79184880722,
                        "link": "/patriot"
                },
                selectedOrgTwo: '',
                organizations: [
                    {
                        "id": 1,
                        "title": "Новороссийская городская общественная организация Спортивный клуб «Патриот» имени Андрея Владимировича Фомина",
                        "shortTitle": "Спортивный клуб «Патриот»",
                        "img": "patriot2.jpg",
                        "logo": "logo",
                        "class": "patriot",
                        "tel": 79184880722,
                        "link": "/patriot"
                    },
                    {
                        "id": 2,
                        "title": "Новороссийская Городская общественная организация «Федерация борьбы самбо и дзюдо»",
                        "shortTitle": "Федерация борьбы самбо и дзюдо",
                        "img": "hall.jpg",
                        "logo": "logo",
                        "class": "struggle",
                        "tel": 79184880722,
                        "link": "/struggle"
                    },
                    {
                        "id": 3,
                        "title": "Фитнес клуб FF GYM",
                        "shortTitle": "Фитнес клуб FF GYM",
                        "img": "ffgym.jpg",
                        "logo": "logo-red",
                        "class": "ffgym",
                        "tel": 79186638000,
                        "link": "https://ffgym.ru/"
                    },
                    {
                        "id": 4,
                        "title": "Отель «Олимп»",
                        "shortTitle": "Отель «Олимп»",
                        "img": "olympus.jpg",
                        "logo": "logo",
                        "class": "olimp",
                        "tel": 78617303033,
                        "link": "https://olympus-hotel.ru/"
                    },
                    {
                        "id": 5,
                        "title": "Аренда спортивного зала, футбольных полей",
                        "shortTitle": "Аренда спортивного зала, футбольных полей",
                        "img": "fields2.jpg",
                        "logo": "logo",
                        "class": "fields",
                        "tel": 79184880722,
                        "link": "/fields"
                    },
                ],
                titleSelectorPos: 0,
                bgSelectorPos: 0,
                titleHeight: 50
            }
        },
        mounted() {
            this.mainHeight()
            this.titlePosition()
            setTimeout(() => {
                // start()
            }, 1000)
        },
        methods: {
            mainHeight() {
                let cHeight = window.innerHeight
                let body = document.getElementById('body')
                body.style.overflow = 'hidden'
                body.style.height = cHeight
                setTimeout(() => {
                    let title = document.getElementById('mainTitle')
                    title.style = 'height:'+title.clientHeight+'px;'
                }, 500)
            },
            titlePosition(index) {
                let orgs = document.querySelectorAll('#org')
                if (index !== this.selectedSection) {
                    if (!index) {
                        index = 0
                    }

                    orgs.forEach((item) => {
                        item.style.opacity = 0
                        item.style.transform = 'skew(-50deg, 0)'
                    })
                    orgs[index].style.opacity = 1
                    orgs[index].style.transform = 'skew(0, 0)'
                }
            },
            selectOrg(index) {
                let self = this      
                let btn = document.getElementById('mainBtn')
                let phone = document.getElementById('phoneBg')
                let line = document.getElementById('colorLine')
                let orgBtn = document.querySelectorAll('.org-btn')
                orgBtn.forEach((item) => {
                    item.style.background = '#fff'
                    item.style.color = '#2d2d2d'
                })
                orgBtn[index].style.background = '#2d2d2d'
                orgBtn[index].style.color = '#fff'

                let lastOrg = self.selectedOrg
                let lastOrgIndex = lastOrg.id-1
                if (index < lastOrgIndex) {
                    self.titlePosition(index)
                } else {
                    self.titlePosition(index)
                }
                self.selectedOrg = self.organizations[index]
                this.selectedSection = index
                
                if (self.selectedOrg.class === 'patriot') {
                    btn.style = 'background: var(--accent-color);';
                    phone.style = 'background: var(--accent-color);';
                    line.style = 'background: var(--accent-color);';
                }
                if (self.selectedOrg.class === 'struggle') {
                    btn.style = 'background: #2d2d2d; color: white;';
                    phone.style = 'background: #2d2d2d; color: #ffffff;';
                    line.style = 'background: #fff;';
                }
                if (self.selectedOrg.class === 'ffgym') {
                    btn.style = 'background: var(--accent-color-second);';
                    phone.style = 'background: var(--accent-color-second);';
                    line.style = 'background: var(--accent-color-second);';
                }
                if (self.selectedOrg.class === 'olimp') {
                    btn.style = 'background: var(--olympus-color);';
                    phone.style = 'background: var(--olympus-color);';
                    line.style = 'background: var(--olympus-color);';
                }
                if (self.selectedOrg.class === 'fields') {
                    btn.style = 'background: var(--accent-color);';
                    phone.style = 'background: var(--accent-color);';
                    line.style = 'background: var(--accent-color);';
                }
                
            }
        },
        computed: {
            checkScroll() {
                let self = this
                document.addEventListener('mousewheel', (event) => {
                    if (event.wheelDelta > 0) {
                        if (self.selectedSection > 0) {
                            if (self.scrollActive) {
                                // console.log('Scroll up');
                                self.scrollActive = false
                                self.selectOrg(self.selectedSection-1)
                                setTimeout(() => {
                                    self.scrollActive = true
                                }, 300)
                            }
                        }
                    } else {
                        if (self.selectedSection < self.organizations.length-1) {
                            if (self.scrollActive) {
                                // console.log('Scroll down');
                                self.scrollActive = false
                                self.selectOrg(self.selectedSection+1)
                                setTimeout(() => {
                                    self.scrollActive = true
                                }, 300)
                            }
                        }
                    }
                });
                let start = 0
                let end = 0
                document.addEventListener('touchstart', (event) => {
                    start = Math.round(event.changedTouches[0].clientY)
                });
                document.addEventListener('touchmove', (event) => {
                    end = Math.round(event.changedTouches[0].clientY) 
                    // console.log(start, '-', end, '-', end-100)
                    if (start >= end+70) {
                        if (self.selectedSection < self.organizations.length-1) {
                            if (self.scrollActive) {
                                self.scrollActive = false
                                self.selectOrg(self.selectedSection+1)
                                setTimeout(() => {
                                    self.scrollActive = true
                                }, 300)
                            }
                        }
                    } 
                    if (start < end-70) {
                        if (self.selectedSection > 0) {
                            if (self.scrollActive) {
                                self.scrollActive = false
                                self.selectOrg(self.selectedSection-1)
                                setTimeout(() => {
                                    self.scrollActive = true
                                }, 300)
                            }
                        }
                    }
                });
            }
        },
        watch: {
            checkScroll() {},
            selectedOrg() {
            }
        }
    }
</script>
