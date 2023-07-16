<template>
    <section class="overflow-hidden">
        <div class="container py-20">
            <div class="flex flex-wrap mb-10">
                <button @click.prevent="category = 'news'" :class="{ active: category === 'news' }" class="main-btn shadow-xl mb-4">Новости</button>
                <button @click.prevent="category = 'competitions'" :class="{ active: category === 'competitions' }" class="main-btn shadow-xl mb-4 md:ml-4">Соревнования</button>
            </div>
            <div>
                <add-news-component v-if="category === 'news'"></add-news-component>
                <add-competitions-component v-if="category === 'competitions'"></add-competitions-component>
            </div>
        </div>
    </section> 
</template>

<style scoped>
    .main-btn.active {
        box-shadow: inset 2px 2px 15px rgba(0,0,0,0.3);
    }
</style>

<script>
    export default {
        data() {
            return {
                category: "competitions"
            }
        },
        mounted() {
        },
        methods: {
        }
    }
</script>
