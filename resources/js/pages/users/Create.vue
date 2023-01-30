<template>
    <Head title="User Create"/>

    <h1 class="text-3xl">Create New User</h1>

    <form @submit.prevent="handleUserCreateFormSubmit" method="post" class="max-w-md mx-auto mt-8">
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
            <label for="role" class="block mb-2 uppercase font-bold text-xs text-gray-700">User Role</label>
            <select name="role_id" id="role_id" class="border border-gray-400 p-2 w-full" v-model="form.role_id">
                <option value="">Select an option</option>
                <option v-for="role in roles" :value="role.id">{{ role.description }}</option>
            </select>
            <div v-if="form.errors.role_id" v-text="form.errors.role_id"
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

<script>
import {useToastr} from '@/services/toastr';
import {useForm} from '@inertiajs/inertia-vue3'

export default {
    name: 'UserCreate',
    setup() {
        let form = useForm({
            name: '',
            email: '',
            role_id: '',
            password: ''
        });
        const toastr = useToastr();

        return {form, toastr};
    },
    props: {
        roles: Object
    },
    methods: {
        handleUserCreateFormSubmit() {
            this.form.post(this.$route('users.store'), {
                onSuccess: (res) => {
                    console.log(res);
                    if (res.props.flash.error !== null) {
                        this.toastr.error(res.props.flash.error);
                    } else {
                        this.toastr.success(res.props.flash.success);
                    }
                },
                //onError: () => this.toastr.error('Something, went wrong!')
            });
        }
    }
}
</script>

<style scoped>

</style>
