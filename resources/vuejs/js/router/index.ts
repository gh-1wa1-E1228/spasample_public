import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path:'/vuejs',
        component: () => import('../views/ArticleListPage.vue')
    },
    {
        path:'/vuejs/:page/:limit/:category_id',
        component: () => import('../views/ArticleListPage.vue')
    },
    {
        path:'/vuejs/:page/:limit',
        component: () => import('../views/ArticleListPage.vue')
    },
    {
        path:'/vuejs/todo',
        component: () => import('../views/ToDoPage.vue')
    },
    // {
    //     path:'/vuejs/:pathMatch(.*)*',
    //     component: () => import('../views/NotFoundPage.vue')
    // }
];
const router = createRouter({
    history: createWebHistory(),
    linkExactActiveClass:'active',
    routes,
});

export default router;