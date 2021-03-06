import Vue from "vue"
import VueRouter from "vue-router"

// start section import
import Home from "./pages/Home.vue"
import About from "./pages/About.vue"
import Contact from "./pages/Contact.vue"
import PostsIndex from "./pages/post/PostsIndex.vue"
import PostShow from "./pages/post/PostShow.vue"
import CategoryShow from "./pages/category/CategoryShow.vue"
import NotFound from "./pages/NotFound.vue"
// end section import

Vue.use(VueRouter)

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/about",
            name: "about",
            component: About
        },
        {
            path: "/contact",
            name: "contact",
            component: Contact
        },
        {
            path: "/posts",
            name: "posts.index",
            component: PostsIndex
        },
        {
            path: "/posts/:id",
            name: "posts.show",
            component: PostShow
        },
        {
            path: "/posts/*",
            name: "NotFound",
            component: NotFound
        },
        {
            path: "/categories/:id",
            name: "categories.show",
            component: CategoryShow
        },
        {
            path: "/*",
            name: "home",
            component: Home
        }
    ]
})

export default router