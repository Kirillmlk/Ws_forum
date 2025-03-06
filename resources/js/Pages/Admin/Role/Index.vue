<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-4">Роли</h3>
            <Link :href="route('admin.roles.create')"
                  class="block mr-4 w-1/6 px-2 py-1 bg-white border border-gray-300 rounded-lg text-center">Добавить Роль
            </Link>
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
    name: "Index",

    components: {
        Link,
    },

    props: [
        'complaints'
    ],

    layout: AdminLayout
}
</script>

<style scoped>

</style>
