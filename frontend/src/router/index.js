

import { createRouter, createWebHistory } from "vue-router";
const routes = [
  {
    path: "/",
    name: "index",
    component: () => import("../views/index.vue"),
  },
  {
    path: "/register",
    name: "register",
    component: () =>import("../views/register.vue"),
  },  
  {
    path: "/login",
    name: "login",
    component: () =>import("../views/login.vue"),
  },  {
    path: "/Offre",
    name: "Offre",
    component: () =>import("../views/Post.vue"),
  },

];
const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});
export default router;
