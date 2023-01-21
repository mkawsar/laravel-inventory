<template>
    <Head title="Users"/>
    <!--    <div class="flex justify-between mb-6">
            <div class="flex items-center">
                <h1 class="text-3xl">Users</h1>
                <Link href="/users/create" class="text-blue-500 text-sm ml-3">New User</Link>
            </div>
            <input type="text" placeholder="Search..." class="border px-2 rounded-lg" v-model="search">
        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-auto-2 sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="(user, index) in users.data" :key="index">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ user.name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <Link :href="`/users/${user.id}/edit`" class="text-indigo-600 hover:text-indigo-900">
                                        Edit
                                    </Link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>-->
    <!-- component -->
    <!-- This is an example component -->
    <div class="mx-auto">
        <div class="relative">
            <div class="p-4">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search" v-model="search"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Search for items">
                </div>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Role</th>
                    <th scope="col" class="px-6 py-3">Create Date</th>
                    <th scope="col" class="px-6 py-3"><span class="sr-only">Edit</span></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(user, index) in users.data" :key="index"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{ user.name }}
                    </th>
                    <td class="px-6 py-4">{{ user.email }}</td>
                    <td class="px-6 py-4">{{ user.role }}</td>
                    <td class="px-6 py-4">{{ created(user.created_at) }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <Paginator :links="users.links"/>
    </div>
</template>

<script setup>
import Paginator from "../../Shared/Paginator";
import {Inertia} from '@inertiajs/inertia';
import {ref, watch} from "vue";
import debounce from 'lodash/debounce'

let props = defineProps({
    users: Object,
    filter: Object
});

let search = ref(props.filter.search);

watch(search, debounce(function(value) {
    Inertia.get('/users', {search: value}, {
        preserveState: true
    })
}, 500));
</script>

<script>
export default {
    name: 'UserIndex',
    methods: {
        created(value) {
            return this.$moment(value).format('yyy/MM/DD');
        }
    }
}
</script>
