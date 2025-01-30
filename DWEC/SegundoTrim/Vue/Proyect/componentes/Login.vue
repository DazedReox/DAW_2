<template>
  <div class="login">
    <h2>Iniciar Sesión</h2>
    <form @submit.prevent="handleLogin">
      <input type="email" v-model="email" placeholder="Correo electrónico" required />
      <input type="password" v-model="password" placeholder="Contraseña" required />
      <button type="submit">Ingresar</button>
    </form>
    <button @click="handleGoogleLogin">Iniciar sesión con Google</button>
    <button @click="handleGithubLogin">Iniciar sesión con GitHub</button>
  </div>
</template>

<script>
import { login, loginWithGoogle, loginWithGithub } from "../services/auth";

export default {
  data() {
    return { email: "", password: "" };
  },
  methods: {
    async handleLogin() {
      try {
        await login(this.email, this.password);
        this.$router.push("/dashboard");
      } catch (error) {
        alert(error.message);
      }
    },
    async handleGoogleLogin() {
      await loginWithGoogle();
      this.$router.push("/dashboard");
    },
    async handleGithubLogin() {
      await loginWithGithub();
      this.$router.push("/dashboard");
    },
  },
};
</script>

<style scoped>
.login {
  text-align: center;
}
</style>
