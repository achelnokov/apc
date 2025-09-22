<script setup lang="ts">
import { ref, reactive } from 'vue';
import { router } from '@inertiajs/vue3'

defineProps({ errors: Object })

const visible = ref(false)
const loading = ref(false)

const form = reactive({
  email: null,
  password: null,
})

function submit() {
    loading.value = true
    let request = router.post('/login', form, {onFinish: function(){
        loading.value = false
    }})

}
</script>


<template>
       <v-app>
            <v-container>
                <v-card class="mx-auto pa-12 pb-5 my-auto mt-10" elevation="8" max-width="448" rounded="lg">
                    <h2>Войти в систему</h2>
                    <v-form @submit.prevent="submit" >
                        <div class="text-subtitle-1 text-medium-emphasis">Почта</div>
                        <v-text-field 
                            density="compact" 
                            placeholder="Email" 
                            prepend-inner-icon="mdi-email-outline"
                            variant="outlined" 
                            clearable 
                            v-model="form.email"
                            :error-messages="errors.email"
                            ></v-text-field>
                        <div class="text-subtitle-1 text-medium-emphasis d-flex align-center justify-space-between">
                            Пароль
                        </div>
                        <v-text-field 
                            :append-inner-icon="visible ? 'mdi-eye-off' : 'mdi-eye'"
                            :type="visible ? 'text' : 'password'" 
                            density="compact" 
                            placeholder="Пароль"
                            prepend-inner-icon="mdi-lock-outline" 
                            variant="outlined"
                            @click:append-inner="visible = !visible" clearable  
                            v-model="form.password"
                            :error-messages="errors.password"
                            ></v-text-field>

                        <v-btn block class="mb-8" size="large" variant="tonal" type="submit" :loading="loading">
                            Войти
                        </v-btn>
                    </v-form>
                </v-card>
            </v-container>

        </v-app>
</template>