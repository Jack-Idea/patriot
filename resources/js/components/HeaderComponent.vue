<template>
    <header id="header" v-show="header" class="text-white body-font h-[70px]" uk-sticky>
        <div class="container mx-auto flex flex-wrap px-[5%] py-3 items-center justify-between">
            <a v-if="menuView" href="/patriot">
                <img src="/img/logo.png" class="logo" alt="">
            </a>
            <a v-if="!menuView" href="/federation">
                <img src="/img/logo-federation.png" class="logo" style="width: 70px;" alt="">
            </a>
            <nav class="md:ml-auto lg:flex flex-wrap items-center text-base justify-center hidden">
                <a v-if="menuView" href="/news" class="header-link mr-8 font-light hover:text-white">Новости</a>
                <a v-if="!menuView" href="/federation/news" class="header-link mr-8 font-light hover:text-white">Новости</a>
                <a v-if="!menuView" href="/federation/docs" class="header-link mr-8 font-light hover:text-white">Документы</a>
                <a v-if="menuView" href="/coaches" class="header-link mr-8 font-light hover:text-white">Тренеры</a>
                <a v-if="menuView" href="/parents" class="header-link mr-8 font-light hover:text-white">Родителям</a>
                <a v-if="menuView" href="/competitions" class="header-link mr-8 font-light hover:text-white">Соревнования</a>
                <a v-if="!menuView" href="/federation/competitions" class="header-link mr-8 font-light hover:text-white">Соревнования</a>
                <a v-if="menuView" href="/gallery" class="header-link mr-8 font-light hover:text-white">Галерея</a>
                <a v-if="menuView" href="/honor" class="header-link mr-8 font-light hover:text-white">Доска почета</a>
                <a v-if="menuView" href="/contacts" class="header-link mr-8 font-light hover:text-white">Контакты</a>
                <a v-if="!menuView" href="/federation/photo" class="header-link mr-8 font-light hover:text-white">Фото</a>
                <a v-if="!menuView" href="/federation/contacts" class="header-link mr-8 font-light hover:text-white">Контакты</a>
                <a href="/" class="header-link hover:text-white font-light">Организации</a>
            </nav>
            <button class="burger lg:hidden" uk-toggle="target: #offcanvas-flip">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
                <div class="uk-offcanvas-bar">

                    <button class="uk-offcanvas-close mr-4 mt-4" uk-close></button>

                    <nav class="flex flex-col justify-center lg:hidden">
                        <a v-if="menuView" href="/news" class="header-link mb-5 font-light hover:text-white">Новости</a>
                        <a v-if="!menuView" href="/federation/news" class="header-link mb-5 font-light hover:text-white">Новости</a>
                        <a v-if="!menuView" href="/federation/docs" class="header-link mb-5 font-light hover:text-white">Документы</a>
                        <a v-if="menuView" href="/coaches" class="header-link mb-5 font-light hover:text-white">Тренеры</a>
                        <a v-if="menuView" href="/parents" class="header-link mb-5 font-light hover:text-white">Родителям</a>
                        <a v-if="menuView" href="/competitions" class="header-link mb-5 font-light hover:text-white">Соревнования</a>
                        <a v-if="!menuView" href="/federation/competitions" class="header-link mb-5 font-light hover:text-white">Соревнования</a>
                        <a v-if="menuView" href="/gallery" class="header-link mb-5 font-light hover:text-white">Галерея</a>
                        <a v-if="menuView" href="/honor" class="header-link mb-5 font-light hover:text-white">Доска почета</a>
                        <a v-if="menuView" href="/contacts" class="header-link mb-5 font-light hover:text-white">Контакты</a>
                        <a v-if="!menuView" href="/federation/photo" class="header-link mb-5 font-light hover:text-white">Фото</a>
                        <a v-if="!menuView" href="/federation/contacts" class="header-link mb-5 font-light hover:text-white">Контакты</a>
                        <a href="/" class="header-link hover:text-white font-light">Организации</a>
                    </nav>

                </div>
            </div>
        </div>
    </header>
</template>

<script>
    export default {
        data() {
            return {
                header: false,
                menuView: true
            }
        },
        mounted() {
            this.checkPage()
        },
        methods: {
            checkPage() {
                let href = window.location.pathname
                let federation = href.split('/')[1]
                if (href !== '/') {
                    this.header = true
                }
                if (href === '/policy' || href === '/agreement') {
                    document.getElementById('header').style = 'background: var(--accent-color);'
                }
                if (federation === 'federation') {
                    this.menuView = false
                } else {
                    this.menuView = true
                }
                this.markLink(href)
            },
            markLink(href) {
                let link = document.querySelectorAll('a')
                link.forEach((item) => {
                    if (href === item.pathname) {
                        console.log(item.pathname)
                        item.classList.add("active")
                    }
                })
            }
        }
    }
</script>
