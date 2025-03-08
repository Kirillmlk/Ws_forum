<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-4">Роли</h3>
            <Link :href="route('admin.roles.create')"
                  class="block mr-4 w-1/6 px-2 py-1 bg-white border border-gray-300 rounded-lg text-center">Добавить
                Роль
            </Link>
        </div>
        <div>
            <div class="border border-gray-200 rounded-lg overflow-x-auto">
                <table class="text-center w-full text-medium">
                    <thead class="w-full bg-gray-100">
                    <tr>
                        <th class="p-2 text-gray-700">ID</th>
                        <th class="p-2 text-gray-700">Имя</th>
                        <th class="p-2 text-gray-700">Роли</th>
                        <th class="p-2 text-gray-700">Изменить роль</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="user in users" class="text-gray-500">
                        <td class="p-2">{{ user.id }}</td>
                        <td class="p-2">{{ user.name }}</td>
                        <td class="p-2">
                            <div>
                                <p v-for="role in user.roles">
                                    {{ role.code }}
                                </p>
                            </div>
                        </td>
                        <td class="p-2">
                            <a href="#">Выбрать</a>
                            <div class="text-left">
                                <div v-for="role in roles" class="mb-2">
                                    <input class="mr-2" type="checkbox" :id="role.id" :value="role.id">
                                    <label class="cursor-pointer" :for="role.id">{{ role.code }}</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
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
        'users',
        'roles'
    ],

    layout: AdminLayout
}
</script>

<style scoped>

</style>
