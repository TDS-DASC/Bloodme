const routes = [
  {
    path: "/",
    name: "Layout",
    redirect: "/home",
    component: () => import("@/Layout/index.vue"),
    children: [
      {
        path: "/home",
        name: "home",
        component: () => import("@/views/index.vue"),
      },
      {
        path: "/campaigns",
        name: "campaigns",
        component: () => import("@/views/campaigns/index.vue"),
      },
      {
        path: "/hospitals",
        name: "hospitals",
        component: () => import("@/views/hospitals/index.vue"),
      },
      {
        path: "/users",
        name: "users",
        children: [
          {
            path: "",
            name: "routless",
            component: () => import("@/views/users/index.vue"),
          },
          {
            path: "index",
            name: "index",
            component: () => import("@/views/users/index.vue"),
          },
          {
            path: "create",
            name: "create",
            component: () => import("@/views/users/create.vue"),
          },
          {
            path: "edit",
            component: () => import("@/views/users/edit.vue"),
          },
          {
            path: ":id/view",
            component: () => import("@/views/users/view.vue"),
          }
        ],  
      },
/*       {
        path: "/users/create",
        name: "create",
        component: () => import("@/views/users/create.vue"),
      }, */
    ],
  },
  {
    path: "/login",
    name: "login",
    component: () => import("@/views/auth/login.vue"),
  },
  {
    path: "/register",
    name: "register",
    component: () => import("@/views/auth/register.vue"),
  },
  {
    path: "/forgot",
    name: "forgot",
    component: () => import("@/views/auth/forgot.vue"),
  },
  {
    path: "/:catchAll(.*)",
    name: "404",
    component: () => import("@/views/404.vue"),
  },
];

export default routes;
