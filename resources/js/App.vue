<template>
    <div class="min-h-screen bg-gray-50 text-gray-900">
        <!-- Navigation Bar -->
        <nav class="bg-white shadow-md p-4 mb-6">
    <div class="max-w-7xl mx-auto w-full flex justify-between items-center">
        
        <div>
            <h1 class="text-2xl font-bold text-blue-600">JobSeeker App</h1>
        </div>

        <div class="flex space-x-4">
            <router-link to="/login" class="text-xl text-gray-600 hover:text-blue-600">Login</router-link>
            <router-link to="/register" class="text-xl text-gray-600 hover:text-blue-600">Register</router-link>
        </div>

    </div>
</nav>

        <!-- Tempat kandungan page (Login/Register) dipaparkan -->
        <main class="max-w-7xl mx-auto p-4">
            <router-view></router-view>
        </main>
    </div>
</template>

<script setup>
// Kod global kalau ada
</script>