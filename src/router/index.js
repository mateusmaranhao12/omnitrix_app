import { createRouter, createWebHistory } from 'vue-router'
import AdicionarAlien from '../views/AdicionarAlien.vue'
import Home from '../views/Home.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },

  {
    path: '/adicionar-alien',
    name: 'AdicionarAlien',
    component: AdicionarAlien
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
