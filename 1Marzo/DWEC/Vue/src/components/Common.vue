<template>
  <div>
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full bg-white shadow-md p-4 flex justify-around z-50">
      <RouterLink to="/">Inicio</RouterLink>
      <RouterLink to="/offers">Ofertas</RouterLink>
      <RouterLink to="/profile">Perfil</RouterLink>
    </nav>

    <!-- Slot para usar los subcomponentes dentro de Pages.vue -->
    <div class="pt-20">
      <slot />
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'
import { useRoute, useRouter, RouterLink } from 'vue-router'
import { auth, db, storage } from '../firebase'
import { collection, addDoc, deleteDoc, doc } from 'firebase/firestore'
import { uploadBytes, getDownloadURL, ref as storageRef } from 'firebase/storage'

/* Puedes exportar los siguientes subcomponentes para usarlos en Pages.vue */

export const PropertyCard = {
  props: ['property'],
  template: `
    <div class="border rounded p-4 shadow">
      <img :src="property.imageUrls?.[0]" class="w-full h-40 object-cover mb-2" v-if="property.imageUrls?.length" />
      <h2 class="text-lg font-bold">{{ property.name }}</h2>
      <p>{{ property.type }} - {{ property.price }}€</p>
      <RouterLink :to="'/property/' + property.id" class="text-blue-500 underline">Ver detalles</RouterLink>
    </div>
  `
}

export const PropertyForm = {
  emits: ['submitted'],
  template: `
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
  `,
  components: { ImageUploader },
  setup(_, { emit }) {
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

    return { form, handleSubmit, handleImages }
  }
}

export const ImageUploader = {
  emits: ['uploaded'],
  template: `
    <div>
      <input type="file" multiple @change="uploadImages" />
      <p class="text-xs text-gray-500">Máximo 4 imágenes</p>
    </div>
  `,
  setup(_, { emit }) {
    const uploadImages = async (e) => {
      const files = Array.from(e.target.files).slice(0, 4)
      const urls = []

      for (const file of files) {
        const path = `images/${Date.now()}-${file.name}`
        const imgRef = storageRef(storage, path)
        await uploadBytes(imgRef, file)
        const url = await getDownloadURL(imgRef)
        urls.push(url)
      }

      emit('uploaded', urls)
    }

    return { uploadImages }
  }
}
export default {
  name: 'Common'
}
</script>

<style scoped>
nav a {
  font-weight: bold;
}
</style>
