<template>
  <div>
    <HeroSection title="Contact" subTitle="Chiedi ciò che vuoi"></HeroSection>
    <h5 class="text-light py-5 text-center">Sezione Contact</h5>
    <Loader v-if="onLoad"></Loader>
    <div v-else class="container pb-5">
      <form v-if="!formSend" @submit.prevent="onFormSubmit">
        <div class="form-group mb-3">
          <label class="form-label text-light">Nome</label>
          <input type="text" class="form-control" v-model="form.name" />
        </div>

        <div class="form-group mb-3">
          <label class="form-label text-light">Email</label>
          <input type="email" class="form-control" v-model="form.email" />
        </div>

        <div class="form-group mb-3">
          <label class="form-label text-light">Messaggio</label>
          <textarea
            type="text"
            class="form-control"
            v-model="form.message"
          ></textarea>
        </div>

        <div class="text-center py-3">
          <button class="btn btn-success text-light">Invia</button>
        </div>
      </form>
      <div v-else class="alert alert-success">
        <h5 class="mb-0">Messaggio inviato correttamente</h5>
      </div>
    </div>
  </div>
</template>

<script>
import HeroSection from "../components/HeroSection.vue";
import Loader from "../components/Loader.vue";
export default {
  components: { HeroSection, Loader },
  data() {
    return {
      onLoad: false,
      formSend: false,
      form: {
        name: "",
        email: "",
        message: "",
      },
    };
  },

  methods: {
    onFormSubmit() {
      this.onLoad = true;
      window.axios.post("/api/contacts", this.form).then((resp) => {
        this.onLoad = false;
        this.formSend = true;
      });
    },
  },
  mounted() {},
};
</script>

<style>
</style>