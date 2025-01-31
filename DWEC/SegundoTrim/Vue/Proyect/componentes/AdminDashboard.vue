<template>
    <div class="admin">
      <h2>Panel de Administración</h2>
      <div v-if="notes.length">
        <h3>Todas las Notas</h3>
        <NoteItem v-for="note in notes" :key="note.id" :note="note" />
      </div>
      <p v-else>No hay notas aún.</p>
    </div>
  </template>
  
  <script>
  import { getAllNotes } from "../services/notes";
  import NoteItem from "./NoteItem.vue";
  
  export default {
    components: { NoteItem },
    data() {
      return {
        notes: [],
      };
    },
    async mounted() {
      this.notes = await getAllNotes();
    },
  };
  </script>
  
  <style scoped>
  .admin {
    text-align: center;
  }
  </style>