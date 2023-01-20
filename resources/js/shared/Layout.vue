<template>
    <div>
        <nav class="fixed z-30 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start">
                        <button id="toggleSidebarMobile" @click.prevent="handleToggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="p-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" :class="hide ? 'hidden' : ''" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                            <svg id="toggleSidebarMobileClose" class="w-6 h-6" :class="hide ? '' : 'hidden'" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <a href="javascript:void(0)" class="flex ml-2 md:mr-24">
                            <img src="https://demo.themesberg.com/windster/images/logo.svg" class="h-8 mr-3" alt="FlowBite Logo">
                            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Windster</span>
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
