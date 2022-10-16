<template>
    <nav>
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
                <Link href="/logout" method="post" as="button" :data="{foo: 'bar'}"
                      class="text-black hover:underline">Logout
                </Link>
            </li>
        </ul>
    </nav>
</template>

<script>

export default {
    name: "Nav"
}
</script>

<style scoped>

</style>
