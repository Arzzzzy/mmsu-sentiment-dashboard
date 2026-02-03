<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const currentUrl = computed(() => page.url);
</script>

<template>
    <div class="flex min-h-screen bg-gray-100 font-sans text-gray-800">
        <aside class="w-64 bg-white m-4 rounded-3xl flex flex-col py-8 px-4 shadow-sm h-[95vh] sticky top-4">
            <div class="mb-10 text-center">
                <h1 class="text-xl font-bold text-gray-900">DASHBOARD</h1>
                <p class="text-xs text-gray-500 uppercase tracking-widest">Overview</p>
            </div>

            <nav class="space-y-2 flex-1">
                <Link 
                    href="/dashboard" 
                    :class="[
                        'flex items-center px-4 py-3 rounded-xl font-semibold mb-2 transition',
                        currentUrl === '/dashboard' 
                            ? 'bg-green-100 text-green-800' 
                            : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900'
                    ]"
                >
                    Dashboard
                </Link>

                <Link 
                    href="/operating-units"
                    :class="[
                        'flex items-center px-4 py-3 rounded-xl font-semibold mb-2 transition',
                        currentUrl === '/operating-units' 
                            ? 'bg-green-100 text-green-800' 
                            : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900'
                    ]"
                >
                    Operating Units
                </Link>
                
                <div class="mt-8">
                   <button class="flex items-center gap-2 px-4 py-2.5 text-gray-600 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 w-full text-sm font-medium transition">
                       <span class="text-lg font-bold">+</span> Add a csv file
                   </button>
                </div>
            </nav>

            <div class="mt-auto pt-6 border-t border-gray-100 text-center">
                 <div class="w-14 h-14 mx-auto bg-blue-100 rounded-full mb-3 overflow-hidden border-2 border-white shadow-sm">
                     <img src="https://ui-avatars.com/api/?name=Juan+Dela+Cruz&background=90cdf4&color=fff" alt="User" />
                 </div>
                 <h3 class="font-bold text-gray-800 text-sm">Juan Dela Cruz</h3>
                 <Link href="/" class="text-xs text-red-400 hover:text-red-600 mt-1 block">Log Out</Link>
            </div>
        </aside>

        <main class="flex-1 p-4 pl-0 overflow-y-auto">
            <slot />
        </main>
    </div>
</template>