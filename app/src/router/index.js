import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "dashboard",
      component: () => import("../components/Dashboard.vue"),
    },
    {
      path: "/data",
      name: "data",
      component: () => import("../components/DataRender.vue"),
    }
  ],
});

export default router;
