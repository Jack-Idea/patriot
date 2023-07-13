<template>
    <header id="header" v-show="header" class="text-white body-font h-[70px]" uk-sticky>
        <div class="container mx-auto flex flex-wrap px-[5%] py-3 flex-col md:flex-row items-center">
            <a href="/patriot">
                <img src="/img/logo.png" class="logo" alt="">
            </a>
            <nav class="md:ml-auto lg:flex flex-wrap items-center text-base justify-center hidden">
                <a href="/news" class="header-link mr-8 font-light hover:text-white">Новости</a>
                <a href="/parents" class="header-link mr-8 font-light hover:text-white">Родителям</a>
                <a class="header-link mr-8 font-light hover:text-white">Соревнования</a>
                <a class="header-link mr-8 font-light hover:text-white">Галерея</a>
                <a class="header-link mr-8 font-light hover:text-white">Доска почета</a>
                <a class="header-link mr-8 font-light hover:text-white">Контакты</a>
                <a href="/" class="header-link hover:text-white font-light">Организации</a>
            </nav>
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
