<template>
  <div>
    <HeroSection title="Boolean Post" subTitle="Tutti i post"></HeroSection>
    <Loader v-if="onLoad"></Loader>

    <div v-else class="container">
      <div class="row pt-5">
        <div class="col-9">
          <PostPageControl
            v-if="lastPage > 1"
            :lastPage="lastPage"
            :currentPage="currentPage"
            @before_page_btn="getPosts"
            @after_page_btn="getPosts"
            @change_page_num="getPosts"
          ></PostPageControl>
          <div v-if="listPost.length" class="row row-cols-1">
            <Post v-for="post in listPost" :key="post.id" :post="post"></Post>
          </div>
          <div v-if="!listPost.length" class="row row-cols-1">
            <h3 class="text-center text-light py-3">
              Ancora nessun dato disponibile
            </h3>
          </div>

          <PostPageControl
            v-if="lastPage > 1"
            :lastPage="lastPage"
            :currentPage="currentPage"
            @before_page_btn="getPosts"
            @after_page_btn="getPosts"
            @change_page_num="getPosts"
          ></PostPageControl>
        </div>
        <div class="col-3">
          <h3 class="text-light">Filtra per:</h3>
          <div class="dropdown_container py-4 ps-2">
            <h5
              @click="changeCategoriesFilter()"
              class="title_filter text-light mb-0 dropdown_pointer"
            >
              Categoria
              <i
                class="fas fa-angle-down text-light ms-2"
                :class="handleSidebarCategories ? 'active' : ''"
              ></i>
            </h5>
            <ul
              class="categories_container ps-0 my-0"
              :class="handleSidebarCategories ? 'active' : ''"
            >
              <li
                v-for="category in listCategories"
                :key="category.id"
                class="form-check text-light mt-2"
              >
                <input
                  class="form-check-input"
                  type="radio"
                  name="categories"
                  :id="category.name"
                  :value="category.id"
                  v-model="filterCategories"
                />
                <label class="form-check-label" :for="category.name">
                  {{ category.name }}
                </label>
              </li>
            </ul>
          </div>
          <div class="d-flex justify-content-center align-items-center py-3">
            <button
              @click="getFilteredPosts()"
              class="btn btn-success text-light"
            >
              Filtra
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import HeroSection from "../../components/HeroSection.vue";
import Loader from "../../components/Loader.vue";
import Post from "../../components/Post.vue";
import PostPageControl from "../../components/PostPageControl.vue";
export default {
  components: {
    Loader,
    PostPageControl,
    Post,
    HeroSection,
  },
  data() {
    return {
      listPost: [],
      listCategories: [],
      handleSidebarCategories: false,
      filterCategories: "",
      currentPage: 1,
      lastPage: null,
      onLoad: true,
    };
  },

  methods: {
    getPosts(page = 1) {
      if (page < 1) {
        page = 1;
      } else if (page > this.lastPage) {
        page = this.lastPage;
      }

      if (page === this.currentPage) {
        return;
      }

      this.onLoad = true;

      window.axios
        .get("/api/posts", {
          params: {
            page,
            category: this.filterCategories,
          },
        })
        .then((resp) => {
          this.listPost = resp.data.data;
          this.currentPage = resp.data.current_page;
          this.lastPage = resp.data.last_page;
          setTimeout(() => {
            this.onLoad = false;
          }, 0);
        });
    },

    getFilteredPosts(page = 1) {
      if (!this.filterCategories) return;

      window.axios
        .get("/api/posts/filtered", {
          params: {
            page,
            category: this.filterCategories,
          },
        })
        .then((resp) => {
          console.log(resp);
          this.listPost = resp.data.data;
          this.currentPage = resp.data.current_page;
          this.lastPage = resp.data.last_page;
          setTimeout(() => {
            this.onLoad = false;
          }, 0);
        });
    },

    getCategories() {
      window.axios.get("/api/categories").then((resp) => {
        this.listCategories = resp.data;
      });
    },

    changeCategoriesFilter() {
      this.handleSidebarCategories = this.handleSidebarCategories
        ? false
        : true;
    },
  },

  mounted() {
    this.getPosts();
    this.getCategories();
  },
};
</script>

<style>
</style>