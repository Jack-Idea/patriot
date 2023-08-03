<template>
    <div class="flex flex-col lg:flex-row justify-between lg:mt-10 relative">
        <div class="divider bg-[var(--accent-color)] w-[75%] h-1/4 absolute top-[39%] rounded-lg hidden lg:flex"></div>
        <div class="w-full lg:w-[45%] flex flex-col">
            <h2 class="text-3xl uppercase font-medium text-[var(--accent-color)] mb-5">Контакты</h2>
            <div class="flex">
                <p v-if="contacts" class="text-[#2d2d2d] text-lg font-medium">{{ contacts[0].jobTitle }}:</p>
                <p v-if="contacts" class="text-gray-600 text-lg ml-2">{{ contacts[0].fullName }}</p>
            </div>
            <div class="flex flex-col lg:flex-row justify-between lg:mt-auto">
                <div class="flex items-center lg:flex-col mt-5 lg:mt-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="var(--accent-color)" class="w-10 h-10 lg:w-10 lg:h-10 lg:mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                    <div class="flex lg:mt-auto ml-3 lg:ml-0">
                        <a :href="'mailto:'+contacts[2].email" v-if="contacts" class="text-gray-600 contacts-link lg:text-center">{{ contacts[2].email }}</a>
                    </div>
                </div>
                <div class="flex items-center lg:flex-col mt-5 lg:mt-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="var(--accent-color)" class="w-10 h-10 lg:w-10 lg:h-10 lg:mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                    <div class="ml-2 lg:ml-0">
                        <p v-if="contacts" class="text-gray-600 lg:text-center">{{ contacts[1].adress1 }}</p>
                        <p v-if="contacts" class="text-gray-600 lg:text-center">{{ contacts[1].adress2 }}</p>
                        <p v-if="contacts" class="text-gray-600 lg:text-center">{{ contacts[1].adress3 }}</p>
                    </div>
                </div>
                <div class="flex items-center lg:flex-col mt-5 lg:mt-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="var(--accent-color)" class="w-10 h-10 lg:w-10 lg:h-10 lg:mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                    </svg>
                    <div class="flex lg:mt-auto ml-2 lg:ml-0">
                        <a :href="'tel:'+contacts[3].phone" v-if="contacts" class="text-gray-600 contacts-link lg:text-center">{{ contacts[3].phone }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/2 relative mt-20 lg:mt-0">
            <div class="img-figure absolute top-[-50px] -right-10 lg:right-[70px] bg-[var(--accent-color)] w-1/3 h-3/4 rounded-lg"></div>
            <a href="https://yandex.ru/maps/org/patriot/1696466536/?ll=37.779992%2C44.673359&z=15.19" target="_blank" class="flex w-full lg:w-[80%]">
                <img src="/img/map.jpg" class="w-full relative shadow-lg rounded-lg" alt="">
            </a>
        </div>
    </div>
</template>

<style scoped>
    p, .contacts-link {
        font-family: 'Oswald', sans-serif;
    }
    .contacts-link:hover {
        text-decoration: none;
        color: #2d2d2d;
    }
    .divider {
        transform: scaleX(0);
        transform-origin: left;
    }
    .img-figure {
        transform: scaleY(0);
        transform-origin: top;
    }
</style>

<script>
    Vue.use(require('vue-moment'));
    export default {
        data() {
            return {
                contacts: '',
                isFederation: false
            }
        },
        mounted() {
            this.getInfo()
            this.startPage()
        },
        methods: {
            startPage() {
                setTimeout(() => {
                    startContacts()
                }, 1000)
            },
            getInfo() {      
                let self = this
                let href = window.location.pathname
                let federation = href.split('/')[1]
                if (federation !== 'federation') {
                    self.isFederation = false
                    axios
                        .get('/js/contacts.json')
                        .then(function (response) {
                            self.contacts = response.data.contacts
                        })
                } else {
                    self.isFederation = true
                    axios
                    .get('/js/federationContacts.json')
                        .then(function (response) {
                            self.contacts = response.data.contacts
                        })
                }
            }
        }
    }
</script>
