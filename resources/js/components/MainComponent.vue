<template>
    <section class="relative flex items-center justify-center h-screen">
        <div id="org" v-for="org in organizations" class="container absolute flex justify-center items-center w-full h-screen">
            <div class="container flex justify-center items-center w-full h-full absolute top-0" :style="'background: url(img/'+org.img+') no-repeat center center / cover'">

            </div>
            <div class="absolute top-0 left-0 bg-black flex w-full h-full bg-opacity-40"></div>
            <!-- HEADER PHONE -->
            <div class="flex absolute top-4 right-[5%] main-org-phone-wrap items-center z-[200]">
                <a :href="'tel:+'+org.tel" class="text-white flex main-org-phone items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="main-phone-icon mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                    </svg>
                    +{{ org.tel }}</a>
            </div>
        </div>
        <div class="container relative flex justify-center items-center">
            <div v-for="(org, index) in organizations" class="absolute flex justify-center w-10/12 lg:w-1/2">
                <h6 id="orgTitle" @click.prevent="selectOrg(index)" class="selector-text absolute flex text-center font-medium text-white" :class="'title-'+org.class">{{ org.shortTitle }}</h6>
            </div>
        </div>
        <!-- LOGO -->
        <div class="main-header flex absolute top-4 left-[5%]">
            <a href="/">
                <img src="img/logo.png" class="logo" alt="">
            </a>
        </div>
        <!-- BTN TO SITE -->
        <div class="absolute bottom-[10%] lg:left-[5%] lg:mt-11 lg:bottom-auto">
            <a :href="selectedOrg.link" id="mainBtn" class="btn-to-site flex items-center">
                Перейти на сайт
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="btn-to-site__icon ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                </svg>

            </a>
        </div>
        <!-- <div class="relative w-1/2">
            <div class="org-item w-full h-full" :class="selectedOrg.class">
                <h6>{{ selectedOrg.title }}</h6>
            </div>
            <div class="org-item w-full h-full" :class="selectedOrgTwo.class">
                <h6>{{ selectedOrgTwo.title }}</h6>
            </div>
        </div>
        <div class="w-1/2 h-screen flex flex-wrap relative">
            <div v-for="(org, index) in organizations" @click.prevent="selectOrg(index)" class="w-1/2 org-item" :class="org.class">
                <h6>{{ org.title }}</h6>
            </div>
            <div class="bg-green-700 org-item struggle">
                <div class="container flex">
                    <div class="">
                        <h6>Новороссийская Городская общественная организация «Федерация борьбы самбо и дзюдо»</h6>
                    </div>
                </div>
            </div>
            <div class="bg-yellow-700 org-item ffgym">
                <div class="container flex">
                    <div class="">
                        <h6>Фитнес клуб FFGYM</h6>
                    </div>
                </div>
            </div>
            <div class="bg-blue-700 org-item olimp">
                <div class="container flex">
                    <div class="">
                        <h6>Отель «Олимп»</h6>
                    </div>
                </div>
            </div>
            <div class="bg-indigo-700 org-item fields">
                <div class="container flex">
                    <div class="">
                        <h6>Аренда спортивного зала, футбольных полей</h6>
                    </div>
                </div>
            </div>
        </div> -->
    </section>
</template>

<style scoped>
    .container {
        max-width: 1920px;
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
                        "img": "patriot.jpg",
                        "class": "patriot",
                        "tel": 79184880722,
                        "link": "/patriot"
                    },
                    {
                        "id": 2,
                        "title": "Новороссийская Городская общественная организация «Федерация борьбы самбо и дзюдо»",
                        "shortTitle": "Федерация борьбы самбо и дзюдо",
                        "img": "struggle.jpg",
                        "class": "struggle",
                        "tel": 79184880722,
                        "link": "/struggle"
                    },
                    {
                        "id": 3,
                        "title": "Фитнес клуб FF GYM",
                        "shortTitle": "Фитнес клуб FF GYM",
                        "img": "ffgym.jpg",
                        "class": "ffgym",
                        "tel": 79186638000,
                        "link": "https://ffgym.ru/"
                    },
                    {
                        "id": 4,
                        "title": "Отель «Олимп»",
                        "shortTitle": "Отель «Олимп»",
                        "img": "olympus.jpg",
                        "class": "olimp",
                        "tel": 78617303033,
                        "link": "https://olympus-hotel.ru/"
                    },
                    {
                        "id": 5,
                        "title": "Аренда спортивного зала, футбольных полей",
                        "shortTitle": "Аренда спортивного зала, футбольных полей",
                        "img": "fields.jpg",
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
                start()
            }, 1000)
        },
        methods: {
            mainHeight() {
                let cHeight = window.innerHeight
                let body = document.getElementById('body')
                body.style.overflow = 'hidden'
                body.style.height = cHeight
                let hTitle = document.querySelectorAll('#orgTitle')
                this.titleHeight = hTitle[0].clientHeight
            },
            titlePosition(newPos, index, newOrgPos) {
                let pos = 0
                let orgPos = 0
                let titles = document.querySelectorAll('#orgTitle')
                let orgs = document.querySelectorAll('#org')
                if (index !== this.selectedSection) {
                    if (!index) {
                        index = 0
                    }
                    if (!newPos) {
                        pos = this.titleSelectorPos
                        orgPos = this.bgSelectorPos
                    } else {
                        pos = this.titleSelectorPos+newPos
                        orgPos = this.bgSelectorPos+newOrgPos
                    }
                    this.titleSelectorPos = pos
                    this.bgSelectorPos = orgPos

                    titles.forEach((item) => {
                        item.style = 'transform: translate(0,'+pos+'px);';
                        pos = pos+this.titleHeight*2
                        item.style.scale = 0.6
                        item.style.opacity = 0.6
                    })
                    titles[index].style.scale = 1
                    titles[index].style.opacity = 1
                    orgs.forEach((item) => {
                        item.style = 'transform: translate(0,'+orgPos+'%);';
                        orgPos = orgPos-100
                    })
                }
            },
            selectOrg(index) {
                let self = this
                let btn = document.getElementById('mainBtn')
                let lastOrg = self.selectedOrg
                let pos = index - (lastOrg.id-1)
                let orgPos = pos
                orgPos = orgPos*100
                pos = pos*this.titleHeight*2
                let lastOrgIndex = lastOrg.id-1
                if (index < lastOrgIndex) {
                    self.titlePosition(-pos, index, orgPos)
                } else {
                    self.titlePosition(-pos, index, orgPos)
                }
                self.selectedOrg = self.organizations[index]
                this.selectedSection = index
                
                if (self.selectedOrg.class === 'patriot') {
                    btn.style = 'background: var(--accent-color);'
                }
                else if (self.selectedOrg.class == 'struggle') {
                    btn.style = 'background: var(--main-color); color: #222;'
                }
                else if (self.selectedOrg.class == 'ffgym') {
                    btn.style = 'background: var(--accent-color-second);'
                }
                else if (self.selectedOrg.class == 'olimp') {
                    btn.style = 'background: var(--olympus-color);'
                }
                else if (self.selectedOrg.class == 'fields') {
                    btn.style = 'background: var(--accent-color);'
                }
                console.log(btn)
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
