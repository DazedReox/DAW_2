<script setup>
defineProps(["titulo"]);
defineEmits(["borrado"]);

</script>
<template>
    <div>
        <h1>{{titulo}}</h1>
        <button v-on:click="emit("borrado")">Borrar</button>
    </div>
</template>