const routes = [
  {
    path: "/",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/DashboardPage.vue"),
        meta: {
          requireAuth: true,
        },
      },
    ],
  },
  {
    path: "/register",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/RegisterPage.vue"),
        meta: {
          requireAuth: false,
          register: true,
        },
      },
    ],
  },
  {
    path: "/login",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/LoginPage.vue"),
        meta: {
          requireAuth: false,
          login: true,
        },
      },
    ],
  },
  {
    path: "/posts",
    component: () => import("layouts/MainLayout.vue"),
    meta: {
      requireAuth: true,
    },
    children: [
      {
        path: "",
        component: () => import("pages/AllPosts.vue"),
      },
      {
        path: "create",
        component: () => import("pages/CreatePost.vue"),
      },
      {
        path: "edit",
        component: () => import("pages/EditPost.vue"),
      },
    ],
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: "/:catchAll(.*)*",
    component: () => import("pages/ErrorNotFound.vue"),
  },
];

export default routes;
