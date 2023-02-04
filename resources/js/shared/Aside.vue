<template>
    <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 bg-white divide-y space-y-1">
                <ul class="space-y-2 pb-2">
                    <li :class="{'bg-gray-200 rounded-lg' : $page.props.menu === 'dashboard'}">
                        <Link :href="$route('dashboard.index')"
                              class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
                            <i class="fa fa-home"></i>
                            <span class="ml-3">Dashboard</span>
                        </Link>
                    </li>
                    <li :class="{'bg-gray-200 rounded-lg' : $page.props.menu === 'user'}"
                        v-if="$page.props.auth.user.role === 'admin'">
                        <Link :href="$route('users.index')"
                              class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                            <i class="fa fa-user-circle"></i>
                            <span class="ml-3 flex-1 whitespace-nowrap">Users</span>
                        </Link>
                    </li>
                    <li :class="{'bg-gray-200 rounded-lg' : $page.props.menu === 'category'}">
                        <Link :href="$route('category.index')"
                              class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                            <i class="fa fa-list-alt"></i>
                            <span class="ml-3 flex-1 whitespace-nowrap">Inventory Category</span>
                        </Link>
                    </li>

                    <li :class="{'bg-gray-200 rounded-lg' : $page.props.menu === 'product'}">
                        <Link :href="$route('product.index')"
                           class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                            <i class="fab fa-product-hunt"></i>
                            <span class="ml-3 flex-1 whitespace-nowrap">Products</span>
                        </Link>
                    </li>
                </ul>
            </div>
            <div class="flex-shrink-0 p-2 border-t max-h-14">
                <Link href="/logout" method="post" as="button"
                    class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-red-100 border rounded-md focus:outline-none focus:ring">
                    <span>
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </span>
                    <span> Logout </span>
                </Link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Aside",
}
</script>

<style scoped>

</style>
