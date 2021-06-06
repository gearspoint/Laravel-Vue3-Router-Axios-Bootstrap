// require('./bootstrap');
import { createApp } from 'vue';
import { createRouter } from 'vue-router'
createApp.use(createRouter)
import App from './components/App.vue'
createApp(App).mount("#app")
