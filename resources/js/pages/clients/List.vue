<script setup lang="ts">
import { defineProps } from 'vue'
import AppLayout from '@/layouts/AppLayout.vue';
import AddClient from '@/components/clients/AddClient.vue'

defineProps({ clients_list: Object })

var table_headers = [
  { title: 'ID', align: 'start', key: 'id' },
  { title: 'Наименование', align: 'start', key: 'title' },
];
</script>


<template>
  <div>
  <AppLayout>
      <AddClient></AddClient>
      <hr class="mt-4">
      <v-data-table :items="clients_list.data" :headers="table_headers" hide-default-footer></v-data-table>
  </AppLayout>
  </div>
</template>