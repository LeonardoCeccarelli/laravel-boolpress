<template>
  <div>
    <HeroSection title="Boolean Post" subTitle="Tutti i post"></HeroSection>

    <div class="container">
      <div class="row py-5">
        <div class="col-9">
          <!-- <PostPageControl
            v-if="lastPage > 1"
            :lastPage="lastPage"
            :currentPage="currentPage"
            @before_page_btn="getPosts"
            @after_page_btn="getPosts"
            @change_page_num="getPosts"
          ></PostPageControl> -->
          <div
            v-if="listPost.length"
            class="row row-cols-1 justify-content-center"
          >
            <Post v-for="post in listPost" :key="post.id" :post="post"></Post>
            <button
              v-if="lastPage < 6 && !onLoad && currentPage != lastPage"
              @click="getPosts(currentPage + 1)"
              class="btn btn-outline-info w-25 mb-5"
            >
              Mostra altri risultati
            </button>
          </div>

          <div v-else class="row row-cols-1">
            <h3 class="text-center text-light py-3">
              Ancora nessun dato disponibile
            </h3>
          </div>

          <Loader v-if="onLoad"></Loader>

          <!-- <PostPageControl
            v-if="lastPage > 1"
            :lastPage="lastPage"
            :currentPage="currentPage"
            @before_page_btn="getPosts"
            @after_page_btn="getPosts"
            @change_page_num="getPosts"
          ></PostPageControl> -->
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
                  class="form-check-input text-success"
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
      if (page > 1 && this.onLoad) {
        return;
      }

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
          resp.data.data.forEach((post) => {
            this.listPost.push(post);
          });

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

        if (bottomOfWindow && this.lastPage >= 6) {
          this.getPosts(this.currentPage + 1);
        }
      };
    },
  },

  mounted() {
    this.getPosts();
    this.getCategories();
    this.scroll();
  },
};
</script>

<style>
</style>