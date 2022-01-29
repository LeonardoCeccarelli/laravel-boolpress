<template>
  <div>
    <HeroSection
      title="Boolean Posts"
      :subTitle="'Per Categoria: ' + category.name"
    ></HeroSection>
    <Loader v-if="onLoad"></Loader>

    <div class="container py-5">
      <div v-if="category.posts" class="row row-cols-1">
        <h3 class="text-light pt-3 mb-3">
          {{ category.posts.length }} Risultati trovati
        </h3>
        <Post v-for="post in category.posts" :key="post.id" :post="post"></Post>
      </div>
      <div v-if="!category.posts" class="row row-cols-1">
        <h3 class="text-center text-light py-3">
          Ancora nessun dato disponibile
        </h3>
      </div>
    </div>
  </div>
</template>

<script>
import HeroSection from "../../components/HeroSection.vue";
import Loader from "../../components/Loader.vue";
import Post from "../../components/Post.vue";
export default {
  components: { HeroSection, Post, Loader },
  data() {
    return {
      category: {
        type: Object,
        default: () => ({}),
      },
      onLoad: true,
    };
  },

  methods: {
    getData() {
      this.onLoad = true;
      window.axios
        .get("/api/categories/" + this.$route.params.id)
        .then((resp) => {
          this.category = resp.data;
          setTimeout(() => {
            this.onLoad = false;
          }, 0);
        })
        .catch(() => {
          this.$router.replace({ name: "NotFound" });
        });
    },
  },

  mounted() {
    this.getData();
  },
};
</script>

<style>
</style>