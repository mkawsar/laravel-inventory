<template>
<!--    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="font-bold text-lg">App Name</h1>
                <p class="text-sm ml-4">Welcome back, {{username}}</p>
            </div>
            <Nav/>
        </header>
    </section>
    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <slot/>
        </div>
    </section>-->
    <!-- This is an example component -->
    <div>
        <Nav/>
        <div class="flex overflow-hidden bg-white pt-16">
            <Aside/>
            <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
            <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
                <main style="min-height: 760px">
                    <div class="pt-6 px-4">
                        <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
                            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 2xl:col-span-3">
                                <div class="flex justify-between mb-4">
                                    <slot/>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <Footer/>
            </div>
        </div>
    </div>
</template>

<script>
import Nav from "./Nav";
import Aside from "./Aside.vue";
import Footer from "./Footer.vue";

export default {
    name: "Layout",
    components: {Footer, Aside, Nav},
    computed: {
        username() {
            return this.$page.props.auth.user.username;
        }
    }
}
</script>

<style scoped>

</style>
