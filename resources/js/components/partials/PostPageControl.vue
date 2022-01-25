<template>
  <div class="row">
    <div class="col justify-content-center d-flex py-5">
      <nav>
        <ul class="pagination">
          <li>
            <button
              class="page-link"
              @click="$emit('before_page_btn', currentPage)"
            >
              &leftarrow;
            </button>
          </li>

          <li
            v-for="page in lastPage"
            :key="page"
            class="page-item"
            :class="currentPage === page ? 'active' : ''"
          >
            <button
              v-if="page >= currentPage - 2 && page <= currentPage + 2"
              class="page-link"
              @click="$emit('change_page_num', page)"
            >
              {{ page }}
            </button>
          </li>

          <li>
            <button
              class="page-link"
              @click="$emit('after_page_btn', currentPage)"
            >
              &rightarrow;
            </button>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostPageControl",
  props: {
    lastPage: {
      type: Number,
      require: true,
    },
    currentPage: {
      type: Number,
      require: true,
    },
  },
};
</script>

<style>
</style>