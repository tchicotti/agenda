/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

import './bootstrap'
import Vue from 'vue'
import vuetify from '@/js/vuetify'

// Route information for Vue Router
import Routes from '@/js/routes.js'

// Component File
import App from '@/js/views/App'


const app = new Vue({
    el: '#app',
    vuetify,
    router: Routes,
    render: h => h(App),
})

export default app;
