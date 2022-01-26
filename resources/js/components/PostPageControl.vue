<template>
  <div class="row">
    <div class="col justify-content-center d-flex py-5">
      <nav class="nav_page_control">
        <ul class="pagination mb-0">
          <li class="page-item">
            <button
              class="page-link"
              aria-label="Previous"
              @click="$emit('before_page_btn', currentPage - 1)"
              :disabled="currentPage === 1"
            >
              <span aria-hidden="true">&laquo;</span>
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

          <li class="page-item">
            <button
              class="page-link"
              aria-label="Next"
              @click="$emit('after_page_btn', currentPage + 1)"
              :disabled="currentPage === lastPage"
            >
              <span aria-hidden="true">&raquo;</span>
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