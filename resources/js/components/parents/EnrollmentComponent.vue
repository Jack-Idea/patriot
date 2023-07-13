<template>
    <div class="mt-14 relative">
        <div v-if="docs" class="w-full lg:w-11/12">
            <p class="text-gray-600 mb-7 font-light">{{ docs[0].text }}</p>
            <p class="text-[var(--accent-color)] mb-3">{{ docs[1].text }}</p>
            <p v-for="item in docs[1].list" class="text-gray-600 mb-2 font-light">- {{ item }};</p>
            <p class="text-gray-600 mb-7 mt-2 font-light">{{ docs[1].text2 }}</p>
            <p class="text-[var(--accent-color)] mb-3">{{ docs[2].text }}</p>
            <p v-for="item in docs[2].list" class="text-gray-600 mb-2 font-light">- {{ item }};</p>
            <p class="text-gray-600 mb-7 mt-7 font-light">{{ docs[3].text }}</p>
            <p class="text-gray-600 mb-7 font-light">{{ docs[4].text }}</p>
            <p class="text-gray-600 mb-7 font-light">{{ docs[5].text }}</p>
            <p class="text-gray-600 mb-7 uppercase">{{ docs[6].text }}</p>
            <p class="text-gray-600 mb-7 font-light">{{ docs[7].text }}</p>
            <p class="text-gray-600 mb-7 font-light">{{ docs[8].text }}</p>
            <p class="text-gray-600 mb-7 font-light">{{ docs[9].text }}</p>
            <p class="text-gray-600 mb-7 font-light">{{ docs[10].text }}</p>
            <p class="text-gray-600 mb-7 font-light">{{ docs[11].text }}</p>
            <p class="text-gray-600 mb-7 font-light">{{ docs[12].text }}</p>
        </div>
    </div>
</template>

<style scoped>
    img {
        filter: sepia(30%);
    }
</style>

<script>
    export default {
        data() {
            return {
                docs: ""
            }
        },
        mounted() {
            this.startPage()
        },
        methods: {
            startPage() {
                let self = this
                axios
                    .get('js/enrollment.json')
                    .then(function (response) {
                        self.docs = response.data.enrollment
                    })
            }
        }
    }
</script>
