<template>
  <section class="body_homepage">
    <div class="container mb-5">
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
  </section>
</template>

<script>
import Post from "./partials/Post.vue";
import PostPageControl from "./partials/PostPageControl.vue";
export default {
  name: "App",
  components: {
    Post,
    PostPageControl,
  },
  data() {
    return {
      listPost: [],
      currentPage: 1,
      lastPage: null,
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

      window.axios.get("/api/posts?page=" + page).then((resp) => {
        this.listPost = resp.data.data;
        this.currentPage = resp.data.current_page;
        this.lastPage = resp.data.last_page;
      });
    },
  },
  mounted() {
    this.getData();
  },
};
</script>