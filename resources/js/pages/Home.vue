<template>
  <div>
    <HeroSection
      title="Boolean Blog"
      subTitle="The most wonderful blog that will never exist"
    ></HeroSection>
    <h1 class="text-center text-light py-5">Sezione Home con ultimi 5 post</h1>
  </div>
</template>

<script>
import HeroSection from "../components/HeroSection.vue";
import Loader from "../components/Loader.vue";
import PostPageControl from "../components/PostPageControl.vue";
import Post from "../components/Post.vue";
export default {
  components: {
    HeroSection,
    Loader,
    PostPageControl,
    Post,
  },
  data() {
    return {};
  },

  methods: {},

  mounted() {},
};
</script>

<style>
</style>