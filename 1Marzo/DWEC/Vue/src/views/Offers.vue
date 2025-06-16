<template>
  <div>
    <h1 class="text-xl font-bold mb-4">Ofertas disponibles</h1>
    

    <div v-if="loading" class="text-center py-8">
      <p>Cargando ofertas...</p>
    </div>
    

    <div v-else-if="offers.length === 0" class="text-center py-8">
      <p class="text-gray-500 mb-4">No hay ofertas disponibles en este momento.</p>
      <p class="text-sm text-gray-400">
        Para crear una oferta, ve a tu perfil y marca la casilla "En oferta" al crear una propiedad.
      </p>
    </div>
    

    <div v-else class="grid gap-4">
      <PropertyCard v-for="p in offers" :key="p.id" :property="p" />
    </div>
    
    <div class="mt-8 p-4 bg-gray-100 rounded text-sm">
      <p><strong>Debug info:</strong></p>
      <p>Total ofertas encontradas: {{ offers.length }}</p>
      <p>Loading: {{ loading }}</p>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { collection, query, where, getDocs } from 'firebase/firestore'
import { db } from '../firebase'
import PropertyCard from '../components/PropertyCard.vue'

const offers = ref([])
const loading = ref(true)

onMounted(async () => {
  console.log('Cargando ofertas...')
  try {
    const q = query(collection(db, 'properties'), where('offer', '==', true))
    const snap = await getDocs(q)
    offers.value = snap.docs.map(d => ({ id: d.id, ...d.data() }))
    console.log('Ofertas cargadas:', offers.value)
  } catch (error) {
    console.error('Error loading offers:', error)
  } finally {
    loading.value = false
  }
})
</script>