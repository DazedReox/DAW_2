<template>
    <div class="auth-layout">
      <nav>
        <router-link to="/dashboard">Mis Recordatorios</router-link>
        <router-link v-if="isAdmin" to="/admin">Admin</router-link>
        <button @click="handleLogout">Cerrar Sesión</button>
      </nav>
      <main>
        <slot />
      </main>
    </div>
  </template>
  
  <script>
  import { logout } from "../services/auth";
  import { auth } from "../services/firebaseConfig";
  
  export default {
    computed: {
      isAdmin() {
        return auth.currentUser?.email === "admin@example.com";
      },
    },
    methods: {
      async handleLogout() {
        await logout();
        this.$router.push("/");
      },
    },
  };
  </script>
  
  <style scoped>
  .auth-layout {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
  }
  nav {
    display: flex;
    gap: 20px;
  }
</style>
  