<template>
  <div class="col py-4">
    <div class="card post_card">
      <img src="" class="card-img-top" alt="post_image" />
      <div class="card-body">
        <h5 class="card-title mb-3">{{ post.title }}</h5>

        <h6 class="mb-3" v-if="post.subtitle">{{ post.subtitle }}</h6>

        <p class="card-text my-5" v-html="post.content"></p>

        <h6 class="class-text">
          Categoria: <span class="text-success">{{ post.category.name }}</span>
        </h6>

        <div>
          <h6
            class="d-inline-block mr-1"
            v-for="tag in post.tags"
            :key="tag.id"
          >
            <span class="badge badge-secondary">{{ tag.name }}</span>
          </h6>
        </div>

        <p class="mb-0 author_name">
          <small>
            {{ post.user.name }}
            <br />
            {{ post.created_at }}
          </small>
        </p>
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
