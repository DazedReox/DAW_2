<template>
  <div>
    <h1 class="text-xl font-bold mb-4">Mis propiedades</h1>
    <div class="grid gap-4">
      <PropertyCard v-for="p in myProps" :key="p.id" :property="p" />
    </div>
    <h2 class="text-lg font-semibold mt-6">Nueva propiedad</h2>
    <PropertyForm @submitted="loadMyProps" />
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { collection, getDocs } from 'firebase/firestore'
import { db } from '../firebase'
import PropertyCard from '../components/PropertyCard.vue'
import PropertyForm from '../components/PropertyForm.vue'

const myProps = ref([])

const loadMyProps = async () => {
  try {
    const snap = await getDocs(collection(db, 'properties'))
    myProps.value = snap.docs.map(d => ({ id: d.id, ...d.data() }))
  } catch (error) {
    console.error('Error loading properties:', error)
  }
}

onMounted(() => {
  loadMyProps()
})
</script>