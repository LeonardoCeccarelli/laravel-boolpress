<template>
  <section>
    <div class="container mb-5">
      <div class="row row-cols-1">
        <Post v-for="(post, i) in listPost" :key="i" :post="post"></Post>
      </div>
    </div>
  </section>
</template>

<script>
import Post from "./partials/Post.vue";
export default {
  name: "App",
  components: {
    Post,
  },
  data() {
    return {
      listPost: [],
    };
  },
  mounted() {
    window.axios.get("/api/posts").then((resp) => {
      this.listPost = resp.data;
    });
  },
};
</script>