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
        <nav class="bg-white border-b border-gray-200 fixed z-30 w-full">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start">
                        <button id="toggleSidebarMobile" @click.prevent="handleToggleSidebarMobile" aria-expanded="true"
                                aria-controls="sidebar"
                                class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
                            <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" :class="hide ? 'hidden' : ''"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <svg id="toggleSidebarMobileClose" class="w-6 h-6" :class="hide ? '' : 'hidden'" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <a href="#" class="text-xl font-bold flex items-center lg:ml-2.5">
                            <img src="https://demo.themesberg.com/windster/images/logo.svg" class="h-6 mr-2"
                                 alt="Windster Logo">
                            <span class="self-center whitespace-nowrap">Windster</span>
                        </a>
                    </div>
                    <Nav/>
                </div>
            </div>
        </nav>
        <div class="flex overflow-hidden bg-white pt-16">
            <aside id="sidebar"
                   class="fixed z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75"
                   aria-label="Sidebar" :class="hide ? '' : 'hidden'">
                <Aside/>
            </aside>
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
    },
    data() {
        return {
            hide: false
        }
    },
    methods: {
        handleToggleSidebarMobile() {
            this.hide = !this.hide;
        }
    }
}
</script>

<style scoped>

</style>
