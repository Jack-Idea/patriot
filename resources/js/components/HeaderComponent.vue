<template>
    <header id="header" v-show="header" class="text-white body-font h-[70px]" uk-sticky>
        <div class="container mx-auto flex flex-wrap px-[5%] py-3 items-center justify-between">
            <a href="/patriot">
                <img src="/img/logo.png" class="logo" alt="">
            </a>
            <nav class="md:ml-auto lg:flex flex-wrap items-center text-base justify-center hidden">
                <a href="/news" class="header-link mr-8 font-light hover:text-white">Новости</a>
                <a href="/parents" class="header-link mr-8 font-light hover:text-white">Родителям</a>
                <a href="/competitions" class="header-link mr-8 font-light hover:text-white">Соревнования</a>
                <a href="/gallery" class="header-link mr-8 font-light hover:text-white">Галерея</a>
                <a class="header-link mr-8 font-light hover:text-white">Доска почета</a>
                <a href="/contacts" class="header-link mr-8 font-light hover:text-white">Контакты</a>
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
                        <a href="/news" class="header-link mb-5 font-light hover:text-white">Новости</a>
                        <a href="/parents" class="header-link mb-5 font-light hover:text-white">Родителям</a>
                        <a href="/competitions" class="header-link mb-5 font-light hover:text-white">Соревнования</a>
                        <a href="/gallery" class="header-link mb-5 font-light hover:text-white">Галерея</a>
                        <a class="header-link mb-5 font-light hover:text-white">Доска почета</a>
                        <a href="/contacts" class="header-link mb-5 font-light hover:text-white">Контакты</a>
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
                header: false
            }
        },
        mounted() {
            this.checkPage()
        },
        methods: {
            checkPage() {
                let href = window.location.pathname
                if (href !== '/') {
                    this.header = true
                }
                if (href === '/policy' || href === '/agreement') {
                    document.getElementById('header').style = 'background: var(--accent-color);'
                }
                this.markLink(href)
            },
            markLink(href) {
                let link = document.querySelectorAll('a')
                link.forEach((item) => {
                    if (href === item.pathname) {
                        item.classList.add("active")
                    }
                })
                
            }
        }
    }
</script>
