<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container main_navbar">
      <router-link class="navbar-brand" to="/"> Boolean Blog </router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar sinistra -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'posts.index' }">
              Post
            </router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'about' }">
              About
            </router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'contact' }">
              Contact
            </router-link>
          </li>
        </ul>

        <!-- Navbar destra -->
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="/register">Register</a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Navbar",
  data() {
    return {
      user: {
        type: String,
      },
    };
  },
  methods: {
    getUser() {
      //   console.log("funziona");
      window.axios.get("/api/user").then((resp) => {
        this.user = resp.data;
      });
    },
  },
  mounted() {
    // this.getUser();
  },
};
</script>

<style>
</style>