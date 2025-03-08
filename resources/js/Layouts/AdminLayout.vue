<template>
    <div>
        <div class="bg-white border-b border-gray-300 py-4">
            <div class="w-1/2 mx-auto">
                <Link :href="route('sections.index')" class="mr-4">Форум</Link>
                <Link :href="route('users.personal')" class="mr-4">Личный кабинет</Link>
                <Link :href="route('admin.main.index')" class="mr-4">Личный кабинет</Link>
            </div>
        </div>
        <div class="flex items-start w-1/2 mx-auto py-4">
            <div class="w-1/4 bg-white mr-4 border border-gray-300">
                <h3 class="text-xl mr-4 p-4">Меню</h3>
                <div>
                    <div>
                        <Link class="p-4 block w-full border-t border-b border-gray-300" :href="route('admin.main.index')">Статистика</Link>
                    </div>

                    <div>
                        <Link class="p-4 block w-full border-t border-b border-gray-300" :href="route('admin.complaints.index')">Жалобы</Link>
                    </div>

                    <div>
                        <Link class="p-4 block w-full border-t border-b border-gray-300" :href="route('admin.roles.index')">Роли</Link>
                    </div>

                    <div>
                        <Link class="p-4 block w-full border-t border-b border-gray-300" :href="route('admin.users.index')">Пользователь</Link>
                    </div>
                </div>
            </div>
            <div class="w-3/4 bg-white p-4 border border-gray-300">
                <slot/>
            </div>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "AdminLayout",

    components: {Link},
}
</script>

<style scoped>

</style>
