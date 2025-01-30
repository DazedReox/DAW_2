<template>
    <AuthLayout>
      <h2>Panel de Administración</h2>
      <div v-if="notes.length">
        <h3>Todas las Notas</h3>
        <NoteItem v-for="note in notes" :key="note.id" :note="note" />
      </div>
      <p v-else>No hay notas aún.</p>
    </AuthLayout>
  </template>
  
  <script>
  import { getAllNotes } from "../services/notes";
  import NoteItem from "../components/NoteItem.vue";
  import AuthLayout from "../layouts/AuthLayout.vue";
  
  export default {
    components: { NoteItem, AuthLayout },
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
  