<template>
  <div>
    <HeroSection
      title="Boolean Blog"
      subTitle="The most wonderful blog that will never exist"
    ></HeroSection>
    <h3 v-if="scrolledToBottom" class="text-light">Scroll arrivo</h3>
    <h1 class="text-center text-light py-5">Sezione Home con ultimi 5 post</h1>
    <div class="container">
      <div class="row row-cols-1">
        <Post v-for="post in listPost" :key="post.id" :post="post"></Post>
      </div>
    </div>
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
    return {
      listPost: [],
      scrolledToBottom: false,
    };
  },

  methods: {
    getPosts() {
      window.axios.get("/api/posts/home").then((resp) => {
        this.listPost = resp.data;
      });
    },
    scroll() {
      window.onscroll = () => {
        let bottomOfWindow =
          Math.max(
            window.pageYOffset,
            document.documentElement.scrollTop,
            document.body.scrollTop
          ) +
            window.innerHeight ===
          document.documentElement.offsetHeight;

        if (bottomOfWindow) {
          this.scrolledToBottom = true; // replace it with your code
        }
      };
    },
  },

  mounted() {
    this.getPosts();
    this.scroll();
  },
};
</script>

<style>
</style>