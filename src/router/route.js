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
        meta: { requiresAuth: true }
      },
      {
        path: "/campaigns",
        name: "campaigns",
        meta: { requiresAuth: true },
        children: [
          {
            path: "",
            name: "campaigns index",
            component: () => import("@/views/campaigns/index.vue"),
          },
          {
            path: "index",
            name: "campaigns",
            component: () => import("@/views/campaigns/index.vue"),
          },
          {
            path: "create",
            name: "campaigns-create",
            component: () => import("@/views/campaigns/create.vue"),
          },
          {
            path: ":id/edit",
            name: "campaigns-edit",
            component: () => import("@/views/campaigns/edit.vue"),
          },
          {
            path: ":id",
            name: "campaigns-view",
            component: () => import("@/views/campaigns/view.vue"),
          }
        ],  
      },
      {
        path: "/refresh",
        name: "refresh",
        meta: { requiresAuth: true },
        component: () => import("@/views/refresh.vue"),
      },
      {
        path: "/hospitals",
        name: "hospitals",
        meta: { requiresAuth: true },
        children: [
          {
            path: "",
            name: "hospitals index",
            component: () => import("@/views/hospitals/index.vue"),
          },
          {
            path: "index",
            name: "hospitals",
            component: () => import("@/views/hospitals/index.vue"),
          },
          {
            path: "create",
            name: "hospitals-create",
            component: () => import("@/views/hospitals/create.vue"),
          },
          {
            path: ":id/edit",
            name: "hospitals-edit",
            component: () => import("@/views/hospitals/edit.vue"),
          },
          {
            path: ":id",
            name: "hospitals-view",
            component: () => import("@/views/hospitals/view.vue"),
          }
        ],  
      },
      {
        path: "/appointments",
        name: "appointments",
        meta: { requiresAuth: true },
        children: [
          {
            path: "",
            name: "appointments index",
            component: () => import("@/views/appointments/index.vue"),
          },
          {
            path: "index",
            name: "appointments",
            component: () => import("@/views/appointments/index.vue"),
          },
          {
            path: "create",
            name: "appointments-create",
            component: () => import("@/views/appointments/create.vue"),
          },
          {
            path: ":id/edit",
            name: "appointments-edit",
            component: () => import("@/views/appointments/edit.vue"),
          },
          {
            path: ":id",
            name: "appointments-view",
            component: () => import("@/views/appointments/view.vue"),
          }
        ],  
      },
      {
        path: "/participants",
        name: "participants",
        meta: { requiresAuth: true },
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
        meta: { requiresAuth: true },
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
        meta: { requiresAuth: true },
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
      {
        path: "/beneficiaries",
        name: "beneficiaries",
        meta: { requiresAuth: true },
        children: [
          {
            path: "",
            name: "beneficiaries index",
            component: () => import("@/views/beneficiaries/index.vue"),
          },
          {
            path: "index",
            name: "beneficiaries",
            component: () => import("@/views/beneficiaries/index.vue"),
          },
          {
            path: "create",
            name: "beneficiaries-create",
            component: () => import("@/views/beneficiaries/create.vue"),
          },
          {
            path: ":id/edit",
            name: "beneficiaries-edit",
            component: () => import("@/views/beneficiaries/edit.vue"),
          },
          {
            path: ":id",
            name: "beneficiaries-view",
            component: () => import("@/views/beneficiaries/view.vue"),
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
