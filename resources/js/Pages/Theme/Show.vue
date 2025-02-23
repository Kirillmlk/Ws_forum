<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-4">{{ theme.title }}</h3>
        </div>
        <div>

        </div>
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Show",

    props: [
        'theme',
    ],

    data() {

    },

    components: {
      Link,
    },

    layout: MainLayout
}
</script>

<style scoped>

</style>
