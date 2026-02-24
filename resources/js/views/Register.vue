<template>
    <div class="flex items-center justify-center min-h-[80vh]">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">Register Account</h2>

            <form @submit.prevent="handleRegister" class="space-y-4">
                <!-- Nama -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input v-model="form.name" type="text" class="w-full px-4 py-2 rounded-xl border border-gray-200" required>
                </div>
                                
                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input v-model="form.email" type="email" class="w-full px-4 py-2 rounded-xl border border-gray-200" required>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input v-model="form.password" type="password" class="w-full px-4 py-2 rounded-xl border border-gray-200" required>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <input v-model="form.password_confirmation" type="password" class="w-full px-4 py-2 rounded-xl border border-gray-200" required>
                </div>

                <!-- Role Selection -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">I am...</label>
                    <select v-model="form.role" class="w-full px-4 py-2 rounded-xl border border-gray-200" required>
                        <option value="job_seeker">Job Seeker</option>
                        <option value="employer">Employer</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-xl shadow-lg transition-all active:scale-[0.98]">
                    Register Now
                </button>
            </form>

            <p v-if="errorMessage" class="mt-4 p-3 bg-red-50 text-red-600 text-sm rounded-lg text-center">
                {{ errorMessage }}
            </p>
        </div>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();
const errorMessage = ref('');
const form = reactive({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role: 'job_seeker' // default value
});

const handleRegister = async () => {
    try {
        errorMessage.value = '';
        const response = await axios.post('/api/register', form);
        
        alert('Registration successful!');
        
        // After registration, we take him to the Login page
        router.push('/login');
        
    } catch (error) {
        errorMessage.value = error.response?.data?.message || 'Registration failed.';
    }
};
</script>