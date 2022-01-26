<template>
  <div class="hero_section">
    <div class="main_title">
      <h1 class="text-center">{{ title }}</h1>
      <h2 class="fw-light">{{ subTitle }}</h2>
    </div>
  </div>
</template>

<script>
export default {
  name: "HeroSection",
  props: {
    title: String,
    subTitle: String,
  },
};
</script>

<style>
</style>