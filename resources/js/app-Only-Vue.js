global.jQuery = require('jquery');
var $ = global.jQuery;
window.$ = $;
require('popper.js');
import { createApp } from 'vue'
import App from './App.vue'
import router from './router' // <---

createApp(App).use(router).mount('#app')