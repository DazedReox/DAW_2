import {createRouter, createWebHistory} from "vue-router";
import LandingPage from "../componentes/LandingPage.vue";
import LoginRegister from "../vistas/LoginRegister.vue";
import Dashboard from "../vistas/Dashboard.vue";
import Admin from "../vistas/Admin.vue";
import {auth} from "../servicios/firebaseConfig";

const routes = [
  {path: "/", component: LandingPage},
  {path: "/login-register", component: LoginRegister},
  {path: "/dashboard", component: Dashboard, meta: { requiresAuth: true }},
  {path: "/admin", component: Admin, meta: {requiresAdmin: true }},
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    const user = auth.currentUser;

    if (to.meta.requiresAuth && !user){
        next("/");
    }else if(to.meta.requiresAdmin && user?.email !== "admin@example.com"){
        next("/dashboard");
    }else{
        next();
    }
});

export default router;