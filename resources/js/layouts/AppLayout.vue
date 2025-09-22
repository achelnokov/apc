<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import { ref } from 'vue'
import { logout } from 'App/Http/Controllers/Auth/AuthController'

  const drawer = ref(true)
  const rail = ref(false)
</script>

<template>

    <v-layout>
      <v-navigation-drawer
        class="bg-indigo"
        theme="dark"
        v-model="drawer"
        permanent
        :rail="rail"
        @click="rail = false"
      >

        <v-list>
          <v-list-item
            prepend-avatar="https://randomuser.me/api/portraits/men/84.jpg"
            title="John Leider"
          >
            <template v-slot:append>
              <v-btn
                icon="mdi-chevron-left"
                variant="text"
                @click.stop="rail = !rail"
              ></v-btn>
            </template>
          </v-list-item>
        </v-list>

        <v-divider></v-divider>

        <v-list color="transparent">
          <v-list-item link @click="router.visit('/');" prepend-icon="mdi-view-dashboard" title="Главная"></v-list-item>
          <v-list-item link @click="router.visit('/clients');" prepend-icon="mdi-account-box" title="Клиенты"></v-list-item>
        </v-list>

        <template v-slot:append>
          <div class="pa-2">
            <Link href="logout" method="POST">
              <v-btn
                class="ma-2"
              >
                <v-icon
                  icon="mdi-arrow-left"
                  start
                ></v-icon>
                Выйти
              </v-btn>
            </Link>

          </div>
        </template>
      </v-navigation-drawer>
      <v-main style="min-height: 400px">
        <div class="pl-4 pr-4 pt-4"><slot /></div>
      </v-main>
    </v-layout>


</template>
