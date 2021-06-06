import { createWebHistory, createRouter } from "vue-router";
import Home from "./views/Home.vue";
import About from "./views/About.vue";
import Main from "./Main.vue";
const routes = [{
        path: "/home",
        name: "Home",
        component: Home,
    },
    {
        path: "/about",
        name: "About",
        component: About,
    },
    {
        path: "/main",
        name: "Main",
        component: Main,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
