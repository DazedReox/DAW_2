<template>
    <div class="auth">
      <h2 v-if="isLogin">Iniciar Sesión</h2>
      <h2 v-else>Registrarse</h2>
  
      <form @submit.prevent="handleSubmit">
        <input type="email" v-model="email" placeholder="Correo electrónico" required />
        <input type="password" v-model="password" placeholder="Contraseña" required />
        <button type="submit">{{ isLogin ? "Ingresar" : "Registrarse" }}</button>
      </form>
  
      <button @click="toggleMode">{{ isLogin ? "Crear cuenta nueva" : "Ya tengo cuenta" }}</button>
  
      <button @click="handleGoogleLogin">Iniciar sesión con Google</button>
      <button @click="handleGithubLogin">Iniciar sesión con GitHub</button>
    </div>
  </template>
  
  <script>
  import { login, register, loginWithGoogle, loginWithGithub } from "../services/auth";
  
  export default {
    data() {
      return {
        email: "",
        password: "",
        isLogin: true,
      };
    },
    methods: {
      async handleSubmit() {
        try {
          if (this.isLogin) {
            await login(this.email, this.password);
          } else {
            await register(this.email, this.password);
          }
          this.$router.push("/dashboard");
        } catch (error) {
          alert(error.message);
        }
      },
      toggleMode() {
        this.isLogin = !this.isLogin;
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
  .auth {
    text-align: center;
    max-width: 400px;
    margin: auto;
  }
  </style>
  