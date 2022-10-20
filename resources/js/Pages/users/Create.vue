<template>
    <Head title="User Create"/>

    <h1 class="text-3xl">Create New User</h1>

    <form @submit.prevent="submit" method="post" class="max-w-md mx-auto mt-8">
        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
            <input type="text" class="border border-gray-400 p-2 w-full" name="name" id="name" v-model="form.name">
            <div v-if="form.errors.name" v-text="form.errors.name"
                 class="text-red-500 text-xs mt-1"></div>
        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
            <input type="email" class="border border-gray-400 p-2 w-full" name="email" id="email" v-model="form.email">
            <div v-if="form.errors.email" v-text="form.errors.email"
                 class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
            <input type="password" class="border border-gray-400 p-2 w-full" name="password" id="password"
                   v-model="form.password">
            <div v-if="form.errors.password" v-text="form.errors.password"
                 class="text-red-500 text-xs mt-1"></div>
        </div>

        <div class="mb-6">
            <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" type="submit"
                    :disabled="form.processing">Submit
            </button>
        </div>
    </form>
</template>

<script setup>
import {useForm} from '@inertiajs/inertia-vue3'

let form = useForm({
    name: '',
    email: '',
    password: ''
});

let submit = () => {
    form.post('/users');
}
</script>

<style scoped>

</style>
