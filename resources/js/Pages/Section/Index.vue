<template>
    <div>
        <div class="flex items-center mb-8">
            <h3 class="text-xl mr-4">Разделы</h3>
            <template v-if="checkGlobalAuth()">
                <Link :href="route('sections.create')"
                      class="block mr-4 w-1/6 px-2 py-1 bg-white border border-gray-300 rounded-lg text-center">Добавить
                    Раздел
                </Link>
            </template>
            <template v-if="sections.filter(section => checkGlobalAuth(section)).length">
                <Link :href="route('branches.create')"
                      class="block w-1/6 px-2 py-1 bg-white border border-gray-300 rounded-lg text-center">Добавить
                    Ветку
                </Link>
            </template>
        </div>
        <div v-if="sections">
            <div v-for="section in sections" class="mb-8">
                <div v-if="section.branches.length">
                    <div class="mb-4 flex items-center">
                        <h3 class="text-lg mr-4">{{ section.title }}</h3>
                        <template v-if="checkSectionAuth(section)">
                            <Link :href="route('sections.edit', section.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="size-6 mr-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"/>
                                </svg>
                            </Link>
                            <!--                        <Link :href="route('sections.destroy', section.id)" method="delete">-->
                            <!--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500">-->
                            <!--                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />-->
                            <!--                            </svg>-->
                            <!--                        </Link>-->
                            <Link :href="route('sections.destroy', section.id)" method="delete" as="button"
                                  class="text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                </svg>
                            </Link>
                        </template>
                    </div>
                    <div v-for="branch in section.branches" class="flex items-center">
                        <Link :href="route('branches.show', branch.id)"
                              class="block bg-white p-4 border border-gray-300 w-full">
                            <h3>{{ branch.title }}</h3>
                        </Link>
                        <template v-if="checkBranchAuth(section, branch)">
                            <Link :href="route('branches.edit', branch.id)" class="mr-4 block bg-sky-600 p-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="size-6 mr-4 stroke-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"/>
                                </svg>
                            </Link>
                            <Link :href="route('branches.destroy', branch.id)" method="delete" as="button"
                                  class="mr-4 block bg-red-600 p-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="size-6 stroke-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                </svg>
                            </Link>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Index",

    props: [
        'sections',
    ],

    components: {
        Link,
    },

    methods: {
        checkGlobalAuth(section) {
            return this.$page.props.auth.roles.some(code => {
                return [
                    `editor`,
                ].includes(code)
            })
        },

        checkSectionAuth(section) {
            return this.$page.props.auth.roles.some(code => {
                return [
                    `editor`,
                    `editor.${section.id}`,
                ].includes(code)
            })
        },

        checkBranchAuth(section, branch) {
            return this.$page.props.auth.roles.some(code => {
                return [
                    `editor`,
                    `editor.${section.id}`,
                    `editor.${section.id}.${branch.id}`,
                ].includes(code)
            })
        }
    },

    layout: MainLayout
}
</script>

<style scoped>

</style>
