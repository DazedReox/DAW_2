<template>
  <form @submit.prevent="handleSubmit" class="grid gap-2">
    <input v-model="form.name" placeholder="Nombre" required />
    <select v-model="form.type">
      <option value="venta">Venta</option>
      <option value="alquiler">Alquiler</option>
    </select>
    <input v-model.number="form.bedrooms" type="number" placeholder="Dormitorios" required />
    <input v-model.number="form.bathrooms" type="number" placeholder="Baños" required />
    <input v-model="form.address" placeholder="Dirección" required />
    <input v-model.number="form.price" type="number" placeholder="Precio (€)" required />
    <label><input type="checkbox" v-model="form.offer" /> En oferta</label>
    <input v-if="form.offer" v-model.number="form.discount" type="number" placeholder="Descuento (%)" />
    <ImageUploader @uploaded="handleImages" />
    <button class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
  </form>
</template>

<script setup>
import { ref } from 'vue'
import { db } from '../firebase'
import { addDoc, collection } from 'firebase/firestore'
import ImageUploader from './ImageUploader.vue'

const emit = defineEmits(['submitted'])

const form = ref({
  name: '',
  type: 'venta',
  bedrooms: 1,
  bathrooms: 1,
  address: '',
  price: 0,
  offer: false,
  discount: 0,
  imageUrls: [],
})

const handleImages = (urls) => {
  form.value.imageUrls = urls
}

const handleSubmit = async () => {
  await addDoc(collection(db, 'properties'), form.value)
  emit('submitted')
}
</script>
