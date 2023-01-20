<template>
<!--    <nav>
        <ul class="flex space-x-6">
            <li>
                <Link href="/" class="text-black hover:underline"
                      :class="{'font-bold underline' : $page.url === '/'}">Home
                </Link>
            </li>
            <li>
                <Link href="/users" class="text-black hover:underline"
                      :class="{'font-bold underline' : $page.url === '/users'}">Users
                </Link>
            </li>
            <li>
                <Link href="/settings" class="text-black hover:underline"
                      :class="{'font-bold underline' : $page.url === '/settings'}">Settings
                </Link>
            </li>
            <li>
                <Link href="/logout" method="post" as="button" class="text-black hover:underline">Logout</Link>
            </li>
        </ul>
    </nav>-->

    <div class="flex items-center">
        <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
            <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
        </div>
    </div>
</template>

<script>

export default {
    name: "Nav",
    data() {
        return {

        }
    },
    methods: {
        handleToggleSideBar() {

        }
    }
}
</script>

<style scoped>

</style>
