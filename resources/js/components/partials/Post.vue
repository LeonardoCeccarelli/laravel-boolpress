<template>
  <div class="col py-4">
    <div class="card">
      <img src="" class="card-img-top" alt="post_image" />
      <div class="card-body">
        <h5 class="card-title">{{ post.title }}</h5>
        <h6 v-if="post.subtitle">{{ post.subtitle }}</h6>
        <p class="card-text">{{ post.content }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Post",
  props: {
    post: {
      type: Object,
      require: true,
    },
  },
};
</script>
