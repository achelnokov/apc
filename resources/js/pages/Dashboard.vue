<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue'


  const drawer = ref(true)
  const rail = ref(true)
</script>

<template>

 
    <v-layout>
      <v-navigation-drawer
        class="bg-indigo"
        theme="dark"
        v-model="drawer"
        permanent
        :rail="rail"
        @click="rail = !rail"
      >
        <v-list color="transparent">
          <v-list-item prepend-icon="mdi-view-dashboard" title="Dashboard"></v-list-item>
          <v-list-item prepend-icon="mdi-account-box" title="Account"></v-list-item>
          <v-list-item prepend-icon="mdi-gavel" title="Admin"></v-list-item>
        </v-list>

        <template v-slot:append>
          <div class="pa-2">
            <v-btn block>
              Logout
            </v-btn>
          </div>
        </template>
      </v-navigation-drawer>
      <v-main style="height: 400px">as</v-main>
    </v-layout>


</template>
