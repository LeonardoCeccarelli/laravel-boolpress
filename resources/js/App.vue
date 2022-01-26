<template>
  <section class="body_homepage">
    <Navbar></Navbar>

    <router-view></router-view>

    <Footer></Footer>
  </section>
</template>

<script>
import Navbar from "./components/Navbar.vue";
import Footer from "./components/Footer.vue";
export default {
  name: "App",
  components: {
    Navbar,
    Footer,
  },
  data() {
    return {};
  },
  methods: {},
  mounted() {},
};
</script>