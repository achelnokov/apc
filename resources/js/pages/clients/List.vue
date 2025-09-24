<script setup lang="ts">
import { defineProps, ref } from 'vue'
import AppLayout from '@/layouts/AppLayout.vue';
import AddClient from '@/components/clients/AddClient.vue'
import { usePage, router } from '@inertiajs/vue3';
import {list} from '@/actions/App/Http/Controllers/Client/ClientController'

defineProps({ clients_list: Object })

const page = usePage()
const current_page = ref(page.props.clients_list.current_page)

var table_headers = [
  { title: 'ID', align: 'start', key: 'id' },
  { title: 'Наименование', align: 'start', key: 'title' },
];

function handlePageChange() {
  const options = {
      mergeQuery: {
          page: current_page.value,
      },
  };

  router.get(list.url(options))
}
</script>


<template>
  <div>
  <AppLayout>
      <AddClient></AddClient>
      <hr class="mt-4">
      <v-data-table :items="clients_list.data" :headers="table_headers" hide-default-footer></v-data-table>

      <div class="text-center pt-2">
          <v-pagination
            v-model="current_page"
            :length="clients_list.last_page"
            @click="handlePageChange"
          ></v-pagination>
      </div>
  </AppLayout>
  </div>
</template>