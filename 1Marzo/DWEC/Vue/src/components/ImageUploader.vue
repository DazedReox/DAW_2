<template>
  <div>
    <input type="file" multiple accept="image/*" @change="uploadImages" />
    <p class="text-xs text-gray-500">Máximo 4 imágenes (jpeg/png)</p>
  </div>
</template>

<script setup>
import { ref as fbRef, uploadBytes, getDownloadURL } from 'firebase/storage'
import { storage } from '../firebase'

const emit = defineEmits(['uploaded'])

const uploadImages = async (e) => {
  const files = Array.from(e.target.files).slice(0, 4)
  const urls = []

  for (const file of files) {
    const filePath = `images/${Date.now()}-${file.name}`
    const fileRef = fbRef(storage, filePath)

    await uploadBytes(fileRef, file)
    const url = await getDownloadURL(fileRef)
    urls.push(url)
  }

  emit('uploaded', urls)
}
</script>
