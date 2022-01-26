import Vue from "vue"
import VueRouter from "vue-router"

// start section import
import Home from "./pages/Home.vue"
// end section import

Vue.use(VueRouter)

const router = new VueRouter({
    mode: "history",
    routes: [{
        path: "/",
        name: "home",
        component: Home
    }]
})

export default router