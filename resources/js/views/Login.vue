<template>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow text-center">
        <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>

        <form @submit.prevent="handleLogin">
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input v-model="form.email" type="email" class="w-full p-2 border rounded" placeholder="email@example.com" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
                <input v-model="form.password" type="password" class="w-full p-2 border rounded" placeholder="********" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-800 text-white p-2 rounded">Login</button>
        </form>

        <p class="mt-4">
            Don't have an account? <router-link to="/register" class="text-blue-600">Register here</router-link>
        </p>

        <p v-if="errorMessage" class="mt-4 text-red-500 text-sm text-center">
            {{errorMessage}}
        </p>
    </div>
</template>

<script setup>
// Kod logik login kita letak sini nanti
import { ref, reactive } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();
const form = reactive({
    email: '',
    password: ''
});

const errorMessage = ref('');

const handleLogin = async () => {
    try {
        errorMessage.value = '';
        // We sent request to Laravel API 
        const response = await axios.post('/api/login', form);

        // We store token in browser (LocalStorage)
        localStorage.setItem('token', response.data.token);

        alert('Login Berjaya!');
        router.push('/');

        
    } catch (error) {
        errorMessage.value = error.response?.data?.message || "Login gagal. Sila cuba lagi";   
    }
};

</script>