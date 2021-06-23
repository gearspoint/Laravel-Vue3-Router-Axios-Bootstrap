import { createWebHistory, createRouter } from "vue-router";

const routes =  [
  {
    path: "/",
    alias: "/sharks",
    name: "sharks",
    component: () => import("./components/sharksList")
  },
  {
    path: "/sharks/:id",
    name: "shark-details",
    component: () => import("./components/shark")
  },
  {
    path: "/add",
    name: "add",
    component: () => import("./components/Addshark")
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;