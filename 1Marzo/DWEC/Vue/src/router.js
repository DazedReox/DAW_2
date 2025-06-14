import { createRouter, createWebHistory } from 'vue-router'
import Pages from './views/Pages.vue'

const routes = [
  { path: '/', component: Pages, props: { page: 'home' } },
  { path: '/offers', component: Pages, props: { page: 'offers' } },
  { path: '/profile', component: Pages, props: { page: 'profile' } },
  { path: '/property/:id', component: Pages, props: route => ({ page: 'detail', id: route.params.id }) },
  { path: '/login', component: Pages, props: { page: 'login' } },
  { path: '/register', component: Pages, props: { page: 'register' } },
]

export default createRouter({
  history: createWebHistory(),
  routes,
})
