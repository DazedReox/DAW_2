<template>
  <div class="register">
    <h2>Registrarse</h2>
    <form @submit.prevent="handleRegister">
      <input type="email" v-model="email" placeholder="Correo electrónico" required />
      <input type="password" v-model="password" placeholder="Contraseña" required />
      <button type="submit">Registrarse</button>
    </form>
  </div>
</template>

<script>
import { register } from "../services/auth";

export default {
  data() {
    return { email: "", password: "" };
  },
  methods: {
    async handleRegister() {
      try {
        await register(this.email, this.password);
        this.$router.push("/dashboard");
      } catch (error) {
        alert(error.message);
      }
    },
  },
};
</script>

<style scoped>
.register {
  text-align: center;
}
</style>
