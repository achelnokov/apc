<script setup lang="ts">
import { defineComponent } from 'vue'
import AppLayout from '@/layouts/AppLayout.vue';
</script>


<template>
  <div>
  <AppLayout>
      <v-btn color="success" prepend-icon="mdi-plus">Добавить клиента</v-btn>
      <hr class="mt-4">

  </AppLayout>
  </div>
</template>