<template>
  <div>
    <input type="file" multiple @change="uploadImages" />
    <p class="text-xs text-gray-500">Máximo 4 imágenes</p>
  </div>
</template>

<script setup>
import { ref as storageRef, uploadBytes, getDownloadURL } from 'firebase/storage'
import { storage } from '../firebase'

const emit = defineEmits(['uploaded'])

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
</script>
