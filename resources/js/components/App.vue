<template>
  <h1>{{ welcomeMsg }}</h1>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      welcomeMsg: "Benvenuto Guest",
    };
  },
};
</script>