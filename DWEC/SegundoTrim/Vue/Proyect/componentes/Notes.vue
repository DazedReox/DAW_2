<template>
    <div class="notes">
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
    </div>
  </template>
  
  <script>
  import NoteItem from "./NoteItem.vue";
  import { addNote, getUserNotes } from "../services/notes";
  import { auth } from "../services/firebaseConfig";
  
  export default {
    components: { NoteItem },
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
        await addNote(auth.currentUser.uid, this.title, th
  