<script setup>
import { Head, useForm, router } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: '',
});

const submit = () => {
    router.visit('/dashboard');
};
</script>

<template>
    <Head title="MMSU Login" />

    <div class="min-h-screen flex items-center justify-center bg-gray-50">
        <div class="bg-white p-10 rounded-xl shadow-lg w-full max-w-md border border-gray-100">
            <div class="flex justify-center mb-6">
                <img 
                    src="/mmsulogo.png" 
                    alt="MMSU Logo" 
                    class="w-50 h-50 object-contain"
                />
            </div>

            <h2 class="text-center text-green-900 font-bold text-lg mb-8 tracking-wide">
                Mariano Marcos State University
            </h2>

            <form @submit.prevent="submit" class="space-y-5">
                <div>
                    <input 
                        v-model="form.email"
                        type="email" 
                        required
                        placeholder="Enter your email..." 
                        class="w-full px-5 py-3 rounded-full border border-gray-300 focus:border-green-700 focus:ring-1 focus:ring-green-700 outline-none text-gray-600 placeholder-gray-400 transition"
                    />
                </div>

                <div>
                    <input 
                        v-model="form.password"
                        type="password" 
                        required
                        placeholder="Enter your password." 
                        class="w-full px-5 py-3 rounded-full border border-gray-300 focus:border-green-700 focus:ring-1 focus:ring-green-700 outline-none text-gray-600 placeholder-gray-400 transition"
                    />
                </div>

                <button 
                    :disabled="form.processing"
                    class="w-full bg-green-900 hover:bg-green-800 text-white font-semibold py-3 rounded-lg transition duration-200 mt-2 shadow-sm"
                >
                    Log in
                </button>
            </form>
        </div>
    </div>
</template>