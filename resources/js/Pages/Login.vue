<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';

const form = useForm({
    email:'',
    password:'',
    remember:false
})

const loginRequest = () => {
    form.post('/login')
}
</script>

<template>
    <div class="bg-gray-800 w-screen h-screen flex items-center justify-center">
        <div class="flex flex-col items-center justify-center bg-gray-700 w-120 h-160 rounded-md">
            <h1>Login</h1>

            <form action="" method="post" class="flex flex-col gap-4 w-full p-4" @submit.prevent="loginRequest">
                <input type="text" v-model="form.email" class="bg-gray-800! px-4 py-2 rounded-md" placeholder="Email....">
                <div v-if="form.errors.email" class="text-red-500">
                    {{ form.errors.email }}
                </div>
                <input type="text" v-model="form.password" class="bg-gray-800! px-4 py-2 rounded-md" placeholder="Password....">
                <span class="flex gap-2">
                    <input type="checkbox" v-model="form.remember" class="bg-gray-800! w-4 rounded-md">
                    <span>Remember Me</span>
                </span>
                <button class="bg-primary! px-4 py-2 rounded-md" >Login</button>
            </form>
        </div>
    </div>
</template>