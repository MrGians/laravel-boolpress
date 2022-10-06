// import Vue Router
import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import HomePage from "./components/pages/HomePage";
import PostsPage from "./components/pages/PostsPage";
import PostDetailPage from "./components/pages/PostDetailPage";
import AboutPage from "./components/pages/AboutPage";
import NotFoundPage from "./components/pages/NotFoundPage";

const routes = new VueRouter({
    mode: "history",
    linkExactActiveClass: "active",
    linkActiveClass: "active",
    routes: [
        { path: "/", component: HomePage, name: "home" },
        { path: "/posts", component: PostsPage, name: "posts" },
        {
            path: "/posts/:slug",
            component: PostDetailPage,
            name: "post-detail",
        },
        { path: "/about", component: AboutPage, name: "about" },
        { path: "*", component: NotFoundPage, name: "not-found" },
    ],
});

export default routes;
