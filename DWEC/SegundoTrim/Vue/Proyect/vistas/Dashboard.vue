<template>
    <AuthLayout>
      <h2>Mis Recordatorios</h2>
      <form @submit.prevent="addNewNote">
        <input v-model="title" placeholder="Título" required />
        <textarea v-model="content" placeholder="Contenido" required></textarea>
        <button type="submit">Agregar</button>
      </form>
  
      <div v-if="notes.length">
        <h3>Tus Notas</h3>
        <NoteItem v-for="note in notes" :key="note.id" :note="note" />
      </div>
      <p v-else>No tienes recordatorios aún.</p>
    </AuthLayout>
  </template>
  
  <script>
  import AuthLayout from "../layouts/AuthLayout.vue";
  import NoteItem from "../components/NoteItem.vue";
  import { addNote, getUserNotes } from "../services/notes";
  import { auth } from "../services/firebaseConfig";
  
  export default {
    components: { AuthLayout, NoteItem },
    data() {
      return {
        notes: [],
        title: "",
        content: "",
      };
    },
    async mounted() {
      this.notes = await getUserNotes(auth.currentUser.uid);
    },
    methods: {
      async addNewNote() {
        await addNote(auth.currentUser.uid, this.title, this.content);
        this.notes = await getUserNotes(auth.currentUser.uid);
        this.title = "";
        this.content = "";
      },
    },
  };
  </script>
  