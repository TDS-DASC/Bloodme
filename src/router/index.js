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

router.beforeEach(async (to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    try {
      const authenticated = await isAuthenticated();
      if (!authenticated) {
        next({ name: 'login' });
      } else {
        next();
      }
    } catch (error) {
      console.error('Error checking authentication status:', error);
      next({ name: 'login' });
    }
  } else {
    next();
  }
});

router.afterEach(() => {
  // Remove initial loading
  const appLoading = document.getElementById("loading-bg");
  if (appLoading) {
    appLoading.style.display = "none";
  }
});

export default router;
