import { createWebHistory, createRouter } from "vue-router";
import Store from "../pages/Store.vue";
import Login from "../pages/Login.vue";
import Register from "../pages/Register.vue";
import Report from "../pages/Report.vue";
import Transection from "../pages/Transection.vue";
import Pos from "../pages/Pos.vue"
import Notfound from '../pages/Notfound.vue';

export const routers = [
    { name: "Store", path: "/Store", component: Store,},
    { name: "Login", path: "/", component: Login,},
    { name: "Login2", path: "/Login", component: Login,},
    { name: "Register", path: "/Register", component: Register,},
    { name: "Report", path: "/Report", component: Report,},
    { name: "Transection", path: "/Transection", component: Transection,},
    { name: "Pos", path: "/Pos", component: Pos,},
    { path: "/:catchAll(.*)", component: Notfound,},
];

const router = createRouter({
    history: createWebHistory(),
    routes: routers,
    scrollBehavior(){
        window.scrollTo(0,0);
    }
});

export default router;
