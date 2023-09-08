<template>
    <div class="row">
      <div class="col text-center">
        <slot name="divider">
  
        </slot>
      </div>
    </div>
  </template>
  
  <script>
    export default {
      name: "Divider",
  
      components: {
        // 
      },
  
      data() {
        return {
          lista: {},
          linhaSelecionada: null,
        }
      },
  
      mounted() {
        this.$emit('status');
        this.$emit('tipo');
      },
  
      methods: {
        
      },
    }
  </script>
  
  <style>
  
  </style>