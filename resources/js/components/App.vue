<template>
  <h1 class="text-center">{{ welcomeMsg }}</h1>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      welcomeMsg: "Benvenuto nel mio sito",
    };
  },
};
</script>