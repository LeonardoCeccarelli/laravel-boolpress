<template>
  <div>
    <HeroSection
      title="Boolean Blog"
      subTitle="The most wonderful blog that will never exist"
    ></HeroSection>

    <Loader v-if="onLoad"></Loader>

    <div v-else class="container">
      <PostPageControl
        :lastPage="lastPage"
        :currentPage="currentPage"
        @before_page_btn="getData"
        @after_page_btn="getData"
        @change_page_num="getData"
      ></PostPageControl>
      <div class="row row-cols-1">
        <Post v-for="(post, i) in listPost" :key="i" :post="post"></Post>
      </div>

      <PostPageControl
        :lastPage="lastPage"
        :currentPage="currentPage"
        @before_page_btn="getData(currentPage - 1)"
        @after_page_btn="getData(currentPage + 1)"
        @change_page_num="getData(page)"
      ></PostPageControl>
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
      currentPage: 1,
      lastPage: null,
      onLoad: true,
    };
  },

  methods: {
    getData(page = 1) {
      if (page < 1) {
        page = 1;
      } else if (page > this.lastPage) {
        page = this.lastPage;
      }

      if (page === this.currentPage) {
        return;
      }

      this.onLoad = true;

      window.axios.get("/api/posts?page=" + page).then((resp) => {
        this.listPost = resp.data.data;
        this.currentPage = resp.data.current_page;
        this.lastPage = resp.data.last_page;
        setTimeout(() => {
          this.onLoad = false;
        }, 0);
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