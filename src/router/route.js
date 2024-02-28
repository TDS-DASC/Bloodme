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
        path: "/participants",
        name: "participants",
        children: [
          {
            path: "",
            name: "participants index",
            component: () => import("@/views/participants/index.vue"),
          },
          {
            path: "index",
            name: "participants",
            component: () => import("@/views/participants/index.vue"),
          },
          {
            path: "create",
            name: "participants-create",
            component: () => import("@/views/participants/create.vue"),
          },
          {
            path: ":id/edit",
            name: "participants-edit",
            component: () => import("@/views/participants/edit.vue"),
          },
          {
            path: ":id",
            name: "participants-view",
            component: () => import("@/views/participants/view.vue"),
          }
        ],  
      },
      {
        path: "/agents",
        name: "agents",
        children: [
          {
            path: "",
            name: "agents index",
            component: () => import("@/views/agents/index.vue"),
          },
          {
            path: "index",
            name: "agents",
            component: () => import("@/views/agents/index.vue"),
          },
          {
            path: "create",
            name: "agents-create",
            component: () => import("@/views/agents/create.vue"),
          },
          {
            path: ":id/edit",
            name: "agents-edit",
            component: () => import("@/views/agents/edit.vue"),
          },
          {
            path: ":id",
            name: "agents-view",
            component: () => import("@/views/agents/view.vue"),
          }
        ],  
      },
      {
        path: "/administrators",
        name: "administrators",
        children: [
          {
            path: "",
            name: "administrators index",
            component: () => import("@/views/administrators/index.vue"),
          },
          {
            path: "index",
            name: "administrators",
            component: () => import("@/views/administrators/index.vue"),
          },
          {
            path: "create",
            name: "administrators-create",
            component: () => import("@/views/administrators/create.vue"),
          },
          {
            path: ":id/edit",
            name: "administrators-edit",
            component: () => import("@/views/administrators/edit.vue"),
          },
          {
            path: ":id",
            name: "administrators-view",
            component: () => import("@/views/administrators/view.vue"),
          }
        ],  
      },
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
