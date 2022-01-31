<template>
  <div>
    <HeroSection
      title="Boolean Blog"
      subTitle="The most wonderful blog that will never exist"
    ></HeroSection>
    <div class="container py-5">
      <div class="w-25 mb-3">
        <img v-if="post.coverImg" :src="post.coverImg" alt="" class="w-100" />
      </div>
      <h1 class="text-light">{{ post.title }}</h1>
    </div>
  </div>
</template>

<script>
import HeroSection from "../../components/HeroSection.vue";
export default {
  components: { HeroSection },
  data() {
    return {
      post: {
        type: Object,
        default: () => ({}),
      },
    };
  },
  methods: {
    getData() {
      window.axios
        .get("/api/posts/" + this.$route.params.id)
        .then((resp) => {
          this.post = resp.data;
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