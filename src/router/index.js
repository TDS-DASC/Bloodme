import { createRouter, createWebHistory } from "vue-router";
import { isAuthenticated } from '@/services/auth';

import routes from "./route";

const router = createRouter({
  history: createWebHistory(import.meta.BASE_URL),
  base: import.meta.BASE_URL,
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition;
    } else {
      return { top: 0 };
    }
  },
});

router.beforeEach((to, from, next) => {
  const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
  const user = JSON.parse(localStorage.getItem('user'));
  
  if (requiresAuth) {
    if (!user) {
      next({ name: 'login' });
    } else {
      if (to.matched.some(record => record.meta.requiresAdmin)) {
        if (user.role === 'admin') {
          next();
        } else {
          next({ name: 'home' });
        }
      } else if(to.matched.some(record => record.meta.requiresAgent)) {
        if (user.role === 'agent') {
          next();
        } else {
          next({ name: 'dashboard' });
        }
      }else{
        next();
      }
    }
  } else {
    next();
  }
});

router.afterEach(() => {
  const appLoading = document.getElementById("loading-bg");
  if (appLoading) {
    appLoading.style.display = "none";
  }
});

export default router;
