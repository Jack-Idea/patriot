<template>
    <div class="flex flex-col">
        <div class="w-full flex flex-col mt-10">
            <div class="w-full lg:w-[80%]">
                <a :href="doc.link" v-for="doc in docs" target="_blank" class="text-gray-700 flex items-center p-3 bg-white rounded-lg shadow-lg mb-3 hover:no-underline">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <p class="ml-2 w-[90%]">{{ doc.title }}</p>
                </a>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .more-btn {
        min-width: 130px;
    }
    .back-btn {
        width: 130px;
        min-width: 100px;
    }
</style>

<script>
    Vue.use(require('vue-moment'));
    export default {
        data() {
            return {
                docs: '',
            }
        },
        mounted() {
            this.getNews()
        },
        methods: {
            getNews() {
                let self = this
                axios
                    .get('/get-docs')
                    .then(function (response) {
                        self.docs = response.data.docs
                    })
            }
        }
    }
</script>
