<template>
  <div>
    <nav class="fixed top-0 left-0 w-full bg-white shadow-md p-4 flex justify-around z-50">
      <RouterLink to="/">Inicio</RouterLink>
      <RouterLink to="/offers">Ofertas</RouterLink>
      <RouterLink to="/profile">Perfil</RouterLink>
    </nav>
    <div class="pt-20 px-4">
      <RouterView />
    </div>
  </div>
</template>

<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<style scoped>
nav a {
  font-weight: bold;
}
</style>
