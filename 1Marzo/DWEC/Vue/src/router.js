import { createRouter, createWebHistory } from 'vue-router'
import Home from './views/Home.vue'
import Offers from './views/Offers.vue'
import Profile from './views/Profile.vue'

const routes = [
  { path: '/', component: Home },
  { path: '/offers', component: Offers },
  { path: '/profile', component: Profile },
  // Mantén Pages.vue solo para las rutas que aún no has separado
  // { path: '/property/:id', component: Pages, props: route => ({ page: 'detail', id: route.params.id }) },
  // { path: '/login', component: Pages, props: { page: 'login' } },
  // { path: '/register', component: Pages, props: { page: 'register' } },
]

export default createRouter({
  history: createWebHistory(),
  routes,
})