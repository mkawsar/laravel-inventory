import moment from 'moment';
import {createApp, h} from "vue";
import {createInertiaApp, Head, Link} from "@inertiajs/inertia-vue3";
import {InertiaProgress} from "@inertiajs/progress";
import Layout from "@/shared/Layout";

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
        app.config.globalProperties.$route = window.route;
        app.config.globalProperties.$moment = moment;
        app
            .component('Link', Link)
            .component('Head', Head)
            .use(plugin)
            .mount(el);
    },

    title: title => `My App - ${title}`
})

InertiaProgress.init({
    // The delay after which the progress bar will
    // appear during navigation, in milliseconds.
    delay: 250,

    // The color of the progress bar.
    color: '#dc0f56',
})
