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
  // Check if the route requires authentication
  if (to.matched.some(record => record.meta.requiresAuth)) {
    try {
      // Check if the user is authenticated
      const authenticated = await isAuthenticated();

      if (!authenticated) {
        console.log(authenticated)
        // If not authenticated, redirect to the login page
        next({ name: 'login' });
      } else {
        // If authenticated, continue to the next route
        next();
      }
    } catch (error) {
      // Handle any errors that occur during the authentication check
      console.error('Error checking authentication status:', error);
      // Redirect to the login page or display an error message as appropriate
      next({ name: 'login' });
    }
  } else {
    // Continue to the next route for non-protected routes
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
