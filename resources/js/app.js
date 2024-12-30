import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import Antd from 'ant-design-vue'
import '../css/app.css'

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
        app.use(plugin)
        app.use(Antd)
        app.mount(el)

        // createApp({ render: () => h(App, props) })
        //     .use(plugin)
        //     .use(Antd)
        //     .mount(el)
    },

})