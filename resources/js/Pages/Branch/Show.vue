<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-4">{{ branch.title }}</h3>
            <template v-if="this.$page.props.auth.roles.some(code => {
                            return [
                                `editor`,
                                `editor.${branch.section.id}`,
                                `editor.${branch.section.id}.${branch.id}`,
                                `editor.${branch.section.id}.${branch.parent_id}`,
                            ].includes(code)
                        })">
                <Link :href="route('branches.themes.create', branch.id)"
                      class="block mr-4 w-1/6 px-2 py-1 bg-white border border-gray-300 rounded-lg text-center">
                    Добавить тему
                </Link>
            </template>
        </div>
        <div>
            <div class="mb-8">
                <h3 class="text-xl">Разделы</h3>
            </div>
            <div v-for="branch in branch.children" class="flex items-center">
                <Link :href="route('branches.show', branch.id)"
                      class="w-full flex items-center block bg-white p-4 border border-gray-300">
                    <div class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"/>
                        </svg>
                    </div>
                    <h3>{{ branch.title }}</h3>
                </Link>
                <template v-if="this.$page.props.auth.roles.some(code => {
                            return [
                                `editor`,
                                `editor.${branch.section.id}`,
                                `editor.${branch.section.id}.${branch.id}`,
                                `editor.${branch.section.id}.${branch.parent_id}`,
                            ].includes(code)
                        })">
                    <Link :href="route('branches.edit', branch.id)" class="mr-4 block bg-sky-600 p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6 mr-4 stroke-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"/>
                        </svg>
                    </Link>
                    <Link :href="route('branches.destroy', branch.id)" method="delete" as="button"
                          class="mr-4 block bg-red-600 p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6 stroke-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                        </svg>
                    </Link>
                </template>
            </div>
        </div>
        <div class="mt-8">
            <div class="mb-8">
                <h3 class="text-xl">Темы</h3>
            </div>
            <div v-for="theme in branch.themes" class="flex items-center">
                <Link :href="route('themes.show', theme.id)"
                      class="block flex items-center bg-white p-4 border border-gray-300 w-full ">
                    <div class="mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                        </svg>
                    </div>
                    <div>
                        <h3>{{ theme.title }}</h3>
                        <p class="text-sm">{{ theme.description }}</p>
                    </div>
                </Link>
                <template v-if="this.$page.props.auth.roles.some(code => {
                            return [
                                `editor`,
                                `editor.${branch.section.id}`,
                                `editor.${branch.section.id}.${branch.id}`,
                            ].includes(code)
                        })">
                    <Link :href="route('themes.edit', theme.id)" class="mr-4 block mx-2 bg-sky-600 p-4 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6 mr-4 stroke-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"/>
                        </svg>
                    </Link>
                    <Link :href="route('themes.destroy', theme.id)" method="delete" as="button"
                          class="mr-4 block bg-red-600 p-4 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6 stroke-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                        </svg>
                    </Link>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";


export default {
    name: "Show",

    components: {
        Link
    },

    props: [
        'branch',
    ],

    layout: MainLayout
}
</script>

<style scoped>

</style>
