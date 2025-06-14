<template>
  <div class="border rounded p-4 shadow">
    <img
      v-if="property.imageUrls?.length"
      :src="property.imageUrls[0]"
      class="w-full h-40 object-cover mb-2"
    />
    <h2 class="text-lg font-bold">{{ property.name }}</h2>
    <p>{{ property.type }} - {{ property.price }}€</p>
    <RouterLink
      :to="`/property/${property.id}`"
      class="text-blue-500 underline"
    >
      Ver detalles
    </RouterLink>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'

defineProps({
  property: Object
})
</script>
