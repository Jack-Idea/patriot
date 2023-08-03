<template>
    <section class="overflow-hidden">
        <div class="container py-20">
            <div class="flex flex-wrap mb-10">
                <button @click.prevent="category = 'news'" :class="{ active: category === 'news' }" class="main-btn shadow-xl mb-4">Новости</button>
                <button @click.prevent="category = 'competitions'" :class="{ active: category === 'competitions' }" class="main-btn shadow-xl mb-4 md:ml-4">Соревнования</button>
                <button @click.prevent="category = 'medalists'" :class="{ active: category === 'medalists' }" class="main-btn shadow-xl mb-4 md:ml-4">Медалисты</button>
                <button @click.prevent="category = 'honor'" :class="{ active: category === 'honor' }" class="main-btn shadow-xl mb-4 md:ml-4">Почетные</button>
                <button @click.prevent="category = 'docs'" :class="{ active: category === 'docs' }" class="main-btn shadow-xl mb-4 md:ml-4">Документы</button>
            </div>
            <div>
                <add-news-component v-if="category === 'news'"></add-news-component>
                <add-competitions-component v-if="category === 'competitions'"></add-competitions-component>
                <add-medalists-component v-if="category === 'medalists'"></add-medalists-component>
                <add-honor-component v-if="category === 'honor'"></add-honor-component>
                <add-docs-component v-if="category === 'docs'"></add-docs-component>
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
                category: "news"
            }
        },
        mounted() {
        },
        methods: {
        }
    }
</script>
