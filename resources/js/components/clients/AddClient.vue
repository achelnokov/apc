<script setup lang="ts">
import { defineProps, shallowRef, reactive } from 'vue'
import { router } from '@inertiajs/vue3'

defineProps({ dialog: Boolean })

const dialog = shallowRef(false)
const loading = shallowRef(false)
const form = reactive({
    title: null
})

function createClient() {
    loading.value = true
    router.post('/clients', form, {onFinish: function(){
        loading.value = false
        dialog.value = false
        form.title = ''
    }})
}
</script>


<template>
    <div>
        <v-dialog
        v-model="dialog"
        max-width="600"
        >
        <template v-slot:activator="{ props: activatorProps }">
            <v-btn
            prepend-icon="mdi-plus"
            text="Добавить клиента"
            color="success"
            v-bind="activatorProps"
            ></v-btn>
        </template>

        <v-card
            prepend-icon="mdi-account"
            title="Добавление нового клиента"
        >
            <v-card-text>
                <v-row>
                    <v-col cols="12">
                        <v-text-field label="Название карточки клиента" v-model="form.title"></v-text-field>
                    </v-col>
                </v-row>
            </v-card-text>

            <v-divider></v-divider>

            <v-card-actions>
                <v-btn
                    text="Закрыть"
                    variant="flat"
                    color="error"
                    @click="dialog = false"
                    :loading="loading"
                ></v-btn>

                <v-btn
                    color="success"
                    text="Сохранить и открыть"
                    variant="flat"
                    @click="createClient()"
                    :loading="loading"
                ></v-btn>
            </v-card-actions>
        </v-card>
        </v-dialog>
    </div>
</template>