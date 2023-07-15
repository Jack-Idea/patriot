<template>
    <div class="">
        <div class="nav-wrap fixed left-0 top-24 flex">
            <div class="flex flex-col bg-[var(--accent-color)] pl-10 pr-16 py-7 items-start rounded-br-lg relative">
                <span id="marker" class="nav-btn-marker"></span>
                <button @click.prevent="selectCat(1)" id="navBtn1" :class="{ 'active': selectedCat === 1 }" class="nav-btn text-white mb-7">Календарь</button>
                <button @click.prevent="selectCat(2)" id="navBtn2" :class="{ 'active': selectedCat === 2 }" class="nav-btn text-white mb-7">Результаты</button>
                <button @click.prevent="selectCat(3)" id="navBtn3" :class="{ 'active': selectedCat === 3 }" class="nav-btn text-white">Медалисты</button>
            </div>            
            <div @click.prevent="menu = !menu" class="w-16 h-16 bg-[var(--accent-color)] rounded-r-lg flex justify-center items-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="menu-arrow w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </div>
        </div>
        <calendar-component v-if="selectedCat === 1"></calendar-component>
    </div>
</template>

<style scoped>
    .nav-btn {
        font-family: 'Oswald', sans-serif;
        position: relative;
    }
    .nav-btn.active {
        color: var(--accent-color);
        transition: all .5s ease-in-out;
    }
    .nav-btn-marker {
        content: '';
        position: absolute;
        /* width: 6px; */
        width: 90%;
        height: 40px;
        background: white;
        left: 0;
        top: 21px;
        transition: all .3s ease-in-out;
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;
    }

    .menu-arrow {
        transition: all ease-in-out;
        transform-origin: center;
    }
</style>

<script>
    export default {
        data() {
            return {
                menu: true,
                selectedCat: 1
            }
        },
        mounted() {
            this.checkWidth()
        },
        methods: {
            checkWidth() {
                let w = window.innerWidth
                if (w <= 768) {
                    setTimeout(() => {
                        this.menu = false
                    }, 1000)
                }
            },
            selectCat(id) {
                let marker = document.getElementById('marker')
                if (id === 1) {
                    marker.style = 'top: 21px;'
                }
                else if (id === 2) {
                    marker.style = 'top: 72px;'
                }
                else if (id === 3) {
                    marker.style = 'top: 124px;'
                }
                this.selectedCat = id
            }
        },
        watch: {
            menu() {
                competitionsMenu(this.menu) 
            }
        }
    }
</script>
