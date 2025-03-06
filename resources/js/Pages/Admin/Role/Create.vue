<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-4">Добавить Роль</h3>
        </div>
        <div>
            <div class="border border-gray-200 rounded-lg overflow-x-auto">

            </div>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    name: "Create",

    components: {
        Link
    },

    layout: AdminLayout
}
</script>

<style scoped>

</style>
