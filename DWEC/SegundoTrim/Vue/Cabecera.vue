<script setup>
import {ref} from 'vue';

    const emit = defineEmits(["altaRecordatorio"]);
    var textoNuevaNota = "";

    function altaNuevaNota(){
        emit("altaRecordatorio", textoNuevaNota);
        textoNuevaNota= "";
    }

</script>
<template>

    <h1>Cabecera</h1>
    <input v-model="textoNuevaNota" placeholder="Escribe texto de la nota" v-on_keyup.enter="altaNuevaNota" type="text">
    
</template>
<style>

</style>