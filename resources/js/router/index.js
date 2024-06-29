import {createRouter, createWebHistory} from 'vue-router'
import HomeView from "../component/HomeView.vue";
import AboutView from "../component/AboutView.vue";
import ListView from "../component/ListView.vue";
import EditView from "../component/EditView.vue";

const routes = [
    { path: '/', name:'HomeView', component: HomeView },
    { path: '/about', name:'AboutView', component: AboutView },
    { path: '/list', name:'ListView', component: ListView },
    { path: '/edit/:id', name:'EditView', component: EditView },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;




