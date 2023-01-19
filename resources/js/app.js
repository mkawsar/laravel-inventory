import {createApp, h} from "vue";
import {createInertiaApp, Head, Link} from "@inertiajs/inertia-vue3";
import {InertiaProgress} from "@inertiajs/progress";
import Layout from "./Shared/Layout";

createInertiaApp({
    resolve: name => {
        let page = require(`./pages/${name}`).default;
        if (page.layout === undefined) {
            page.layout ??= Layout;
        }

        return page;
    },

    setup({el, App, props, plugin}) {
        let app = createApp({render: () => h(App, props)});
        app.config.globalProperties.$route = window.route;
        app
            .component('Link', Link)
            .component('Head', Head)
            .use(plugin)
            .mount(el);
    },
    // setup({el, App, props, plugin}) {
    //     createApp({render: () => h(App, props)})
    //         .component('Link', Link)
    //         .component('Head', Head)
    //         .use(plugin)
    //         .mount(el);
    // },

    title: title => `My App - ${title}`
})

InertiaProgress.init();
