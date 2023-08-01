<template>
    <div class="">  
        <div class="flex flex-wrap">
            <button v-for="btn in menu" @click.prevent="selectCat(btn.id)" :id="'menu-'+btn.id" class="menu-btn main-btn mb-4 mr-4">{{ btn.title }}</button>
        </div>
        <div v-show="selectedMenu === 1">
            <h5 class="text-xl mt-5">Большое количество фотографий публикуется в нашей группе ВКонтакте</h5>
            <a href="https://vk.com/patriot_nvr" target="_blank" class="main-btn mt-4 bg-[#447bba]" style="min-width: 150px; max-width: 200px;">
                в VK
                <span uk-icon="icon: youtube; ratio: 1.5" class="ml-2"></span>
            </a>
        </div>
        <div v-show="selectedMenu === 2">
            <h5 class="text-xl mt-5">Приносим свои извинения, раздел находится в разработке</h5>
            <h5 class="mt-5">Возможно, вам будет интересен наш канал на YouTube</h5>
            <a href="https://www.youtube.com/channel/UCLKobiWnI9pFW1Ms7QDVj4g" target="_blank" class="main-btn mt-4 bg-red-600" style="min-width: 150px; max-width: 200px;">
                На канал
                <span uk-icon="icon: youtube; ratio: 1.5" class="ml-2"></span>
            </a>
        </div>
    </div>
</template>

<style scoped>
    .menu-btn {
        background: var(--accent-color);
        color: #fff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
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
                        "title": "Фото"
                    },
                    {
                        "id": 2,
                        "title": "Видео"
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
        },
        watch: {
        }
    }
</script>
