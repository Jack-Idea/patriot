<template>
    <div class="">
        <div class="flex flex-wrap">
            <button v-for="btn in menu" @click.prevent="selectCat(btn.id)" :id="'menu-'+btn.id" class="menu-btn main-btn mb-4 mr-4">{{ btn.title }}</button>
        </div>
        <parents-sections-component v-show="selectedMenu === 1"></parents-sections-component>
        <coaches-component v-show="selectedMenu === 2"></coaches-component>
        <parents-enrollment-component v-show="selectedMenu === 3"></parents-enrollment-component>
    </div>
</template>

<style scoped>
    .menu-btn {
        background: var(--accent-color);
        color: #fff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        /* background: #fff;
        color: var(--accent-color); */
    }
    .menu-btn.active {
        box-shadow: inset 1px 2px 10px -2px rgba(0,0,0,0.3);
    }
</style>

<script>
    export default {
        data() {
            return {
                selectedMenu: 1,
                menu: [
                    {
                        "id": 1,
                        "title": "Спортивные секции"
                    },
                    {
                        "id": 2,
                        "title": "Тренерский состав"
                    },
                    {
                        "id": 3,
                        "title": "Документы для зачисления"
                    }
                ]
            }
        },
        mounted() {
            this.startPage()
        },
        methods: {
            selectCat(id) {
                let links = document.querySelectorAll('.menu-btn')
                links.forEach((item) => {
                    item.classList.remove('active')
                })
                document.getElementById('menu-'+id).classList.add('active')
                this.selectedMenu = id
            },
            startPage() {
                document.getElementById('menu-'+this.selectedMenu).classList.add('active')
            }
        }
    }
</script>
