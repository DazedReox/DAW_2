<template>
  <div>
    <h1 class="text-xl font-bold mb-4">Vivienda en oferta</h1>
    
    <div v-if="loading" class="text-center py-8">
      <p>Cargando...</p>
    </div>
    
    <div v-else-if="offer">
      <PropertyCard :property="offer" />
    </div>
    
    <div v-else class="text-center py-8">
      <p class="text-gray-500 mb-4">No hay ofertas disponibles en este momento.</p>
    </div>
    
    <div class="mt-6 space-x-4">
      <RouterLink to="/offers" class="text-blue-500 underline">Ver todas las ofertas</RouterLink>
      <RouterLink to="/profile" class="text-blue-500 underline">Mis propiedades</RouterLink>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { RouterLink } from 'vue-router'
import { collection, query, where, getDocs } from 'firebase/firestore'
import { db } from '../firebase'
import PropertyCard from '../components/PropertyCard.vue'

const offer = ref(null)
const loading = ref(true)

onMounted(async () => {
  console.log('Cargando oferta destacada...')
  try {
    const q = query(collection(db, 'properties'), where('offer', '==', true))
    const snap = await getDocs(q)
    const docs = snap.docs.map(d => ({ id: d.id, ...d.data() }))
    console.log('Ofertas encontradas:', docs.length)
    if (docs.length > 0) {
      offer.value = docs[Math.floor(Math.random() * docs.length)]
      console.log('Oferta seleccionada:', offer.value)
    }
  } catch (error) {
    console.error('Error loading offers:', error)
  } finally {
    loading.value = false
  }
})
</script>