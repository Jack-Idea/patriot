<template>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-6 w-full mt-16">
        <div class="news-card bg-white flex flex-col w-full min-h-[350px] shadow-[1px_4px_10px_rgba(0,0,0,0.2)] rounded-xl relative overflow-hidden">
            <div class="news-card__img flex w-full h-[80%] overflow-hidden relative" style="background: url('img/10.jpg') no-repeat center center / cover;">
                <div class="absolute bottom-0 flex w-full rounded-t-xl overflow-hidden">
                    <div class="bg-white bg-opacity-70 flex w-full absolute h-full left-0" style="backdrop-filter: blur(4px);"></div>
                    <h4 class="px-5 py-3 relative">
                        Второй турнир BSB JJ по бразильскому джиу-джитсу
                    </h4>
                </div>
            </div>
            <div class="flex justify-between items-center text-[#2d2d2d] px-5 h-[20%] font-light">
                <a href="" class="flex hover:text-[#2d2d2d]">Подробнее...</a>
                <span class="flex font-normal opacity-50">24.06.2023</span>
            </div>
        </div>
        <div class="news-card bg-white flex flex-col w-full min-h-[350px] shadow-[1px_4px_10px_rgba(0,0,0,0.2)] rounded-xl relative overflow-hidden">
            <div class="news-card__img flex w-full h-[80%] overflow-hidden relative" style="background: url('img/judo.jpg') no-repeat center center / cover;">
                <div class="absolute bottom-0 flex w-full rounded-t-xl overflow-hidden">
                    <div class="bg-white bg-opacity-70 flex w-full absolute h-full left-0" style="backdrop-filter: blur(4px);"></div>
                    <h4 class="px-5 py-3 relative">
                        Чемпионат и первенство Новороссийска по легкой атлетике среди "особенных" спортсменов
                    </h4>
                </div>
            </div>
            <div class="flex justify-between items-center text-[#2d2d2d] px-5 h-[20%] font-light"><a href="" class="flex hover:text-[#2d2d2d]">Подробнее...</a><span class="flex font-normal opacity-50">24.06.2023</span></div>
        </div>
        <div class="news-card bg-white flex flex-col w-full min-h-[350px] shadow-[1px_4px_10px_rgba(0,0,0,0.2)] rounded-xl relative overflow-hidden">
            <div class="news-card__img flex w-full h-[80%] overflow-hidden relative" style="background: url('img/boy.jpg') no-repeat center center / cover;">
                <div class="absolute bottom-0 flex w-full rounded-t-xl overflow-hidden">
                    <div class="bg-white bg-opacity-70 flex w-full absolute h-full left-0" style="backdrop-filter: blur(4px);"></div>
                    <h4 class="px-5 py-3 relative">
                        Чемпионат и первенство Новороссийска по легкой атлетике среди "особенных" спортсменов
                    </h4>
                </div>
            </div>
            <div class="flex justify-between items-center text-[#2d2d2d] px-5 h-[20%] font-light"><a href="" class="flex hover:text-[#2d2d2d]">Подробнее...</a><span class="flex font-normal opacity-50">24.06.2023</span></div>
        </div>
        <div class="news-card bg-white flex flex-col w-full min-h-[350px] shadow-[1px_4px_10px_rgba(0,0,0,0.2)] rounded-xl relative overflow-hidden">
            <div class="news-card__img flex w-full h-[80%] overflow-hidden relative" style="background: url('img/patriot.jpg') no-repeat center center / cover;">
                <div class="absolute bottom-0 flex w-full rounded-t-xl overflow-hidden">
                    <div class="bg-white bg-opacity-70 flex w-full absolute h-full left-0" style="backdrop-filter: blur(4px);"></div>
                    <h4 class="px-5 py-3 relative">
                        Чемпионат и первенство Новороссийска по легкой атлетике среди "особенных" спортсменов
                    </h4>
                </div>
            </div>
            <div class="flex justify-between items-center text-[#2d2d2d] px-5 h-[20%] font-light"><a href="" class="flex hover:text-[#2d2d2d]">Подробнее...</a><span class="flex font-normal opacity-50">24.06.2023</span></div>
        </div>
    </div>
</template>

<style scoped>
    .news-card {
        font-family: 'Oswald', sans-serif;
    }
    .news-card__img {
        filter: sepia(30%);
    }
</style>

<script>
    export default {
        props: ['quantity'],
        data() {
            return {
                news: []
            }
        },
        mounted() {
            this.getNews()
        },
        methods: {
            getNews() {
                let self = this
            }
        }
    }
</script>
