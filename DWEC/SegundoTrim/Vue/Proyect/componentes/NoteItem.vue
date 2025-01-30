<template>
    <div class="note-item">
      <h4>{{ note.title }}</h4>
      <p>{{ note.content }}</p>
    </div>
  </template>
  
  <script>
  export default {
    props: ["note"],
  };
  </script>
  
  <style scoped>
  .note-item {
    border: 1px solid #ddd;
    padding: 10px;
    margin: 5px;
    border-radius: 5px;
  }
  </style>
  