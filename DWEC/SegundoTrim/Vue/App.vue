<script setup>
import {ref} from 'vue';

    function altaNuevaNota(texto){
        let nuevoRecordatorio ={
            titulo: texto,
            fechaCreacion: 0,
            prioridad: "baja",
            acabada: false,
        }
    }
    function borrarTarea(pos){
        listaRecordatorios.value.splice(pos);
    }
</script>

<template>
    
    <Cabecera v-on:altaRecordatorio="altaNuevaNota"></Cabecera>
    <Tarea v-for="(tarea, indice) in listaRecordatorios" :titulo="tarea.titulo" v-on:borrado="borrarTarea(indice)"></Tarea>

</template>

<style scoped>

</style>