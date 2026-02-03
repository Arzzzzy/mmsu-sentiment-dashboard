<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <DashboardLayout>
        <div class="grid grid-cols-4 gap-4 mb-6">
            <div v-for="(label, index) in ['Total Feedback', 'Positive Comments', 'Negative Comments', 'Neutral Comments']" :key="index" 
                 class="bg-green-500 rounded-2xl p-5 text-white shadow-sm relative overflow-hidden group hover:bg-green-600 transition">
                <div class="relative z-10">
                    <div class="text-[10px] opacity-90 uppercase tracking-widest font-semibold mb-1">{{ label }}</div>
                    <div class="text-3xl font-bold">1,238</div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            
            <div class="lg:col-span-2 bg-white rounded-3xl p-6 shadow-sm border border-gray-100/50">
                <h3 class="font-bold text-gray-800 mb-6 text-sm uppercase tracking-wide">SENTIMENT DISTRIBUTION</h3>
                <div class="flex items-center justify-center h-48 gap-8">
                    <div class="w-40 h-40 rounded-full bg-[conic-gradient(at_center,_#3b82f6_0deg_140deg,_#fbbf24_140deg_260deg,_#22c55e_260deg_360deg)] border-4 border-white shadow-lg relative">
                        <div class="absolute inset-0 m-auto w-2 h-2 bg-white rounded-full"></div>
                    </div>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-yellow-400"></span> Positive</div>
                        <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-blue-500"></span> Negative</div>
                        <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-green-500"></span> Neutral</div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1 bg-green-400 rounded-3xl p-6 shadow-sm relative text-white flex flex-col items-center justify-center text-center">
                 <h3 class="font-semibold mb-1 opacity-90 text-sm uppercase">RANKING</h3>
                 <p class="text-[10px] mb-6 opacity-75">(According to Good Performance)</p>
                 
                 <div class="flex items-end gap-4">
                     <span class="text-6xl font-black leading-none">1</span>
                     <span class="text-lg font-medium mb-2">Registrar</span>
                 </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100/50 overflow-hidden">
            <div class="p-6 flex justify-between items-end border-b border-gray-50">
                <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wide">RECENT FEEDBACK</h3>
                <span class="text-xs text-gray-400 hover:text-gray-600 cursor-pointer transition">show 10</span>
            </div>
            
            <div class="p-4">
                <div class="grid grid-cols-12 gap-4 bg-blue-500 text-white text-xs font-bold uppercase tracking-wider py-4 px-6 rounded-t-xl">
                    <div class="col-span-2">Language</div>
                    <div class="col-span-5">Feedback Text</div>
                    <div class="col-span-2 text-center">Sentiment</div>
                    <div class="col-span-3 text-right">Sentiment Keyword</div>
                </div>

                <div class="grid grid-cols-12 gap-4 py-4 px-6 border-b border-gray-100 hover:bg-gray-50 transition text-sm items-center">
                    <div class="col-span-2 text-gray-600 font-medium">English</div>
                    <div class="col-span-5 text-gray-800 truncate pr-4">The enrollment process was very fast and smooth today.</div>
                    <div class="col-span-2 text-center">
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">Positive</span>
                    </div>
                    <div class="col-span-3 text-right font-mono text-green-600">"fast", "smooth"</div>
                </div>

                <div class="grid grid-cols-12 gap-4 py-4 px-6 border-b border-gray-100 hover:bg-gray-50 transition text-sm items-center">
                    <div class="col-span-2 text-gray-600 font-medium">Tagalog</div>
                    <div class="col-span-5 text-gray-800 truncate pr-4">Sobrang bagal ng pila sa window 2, nakakainis.</div>
                    <div class="col-span-2 text-center">
                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold">Negative</span>
                    </div>
                    <div class="col-span-3 text-right font-mono text-red-500">"bagal", "nakakainis"</div>
                </div>

                <div class="grid grid-cols-12 gap-4 py-4 px-6 hover:bg-gray-50 transition text-sm items-center">
                    <div class="col-span-2 text-gray-600 font-medium">English</div>
                    <div class="col-span-5 text-gray-800 truncate pr-4">I submitted my documents at 9 AM.</div>
                    <div class="col-span-2 text-center">
                        <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-bold">Neutral</span>
                    </div>
                    <div class="col-span-3 text-right font-mono text-gray-400">N/A</div>
                </div>
            </div>
        </div>

    </DashboardLayout>
</template>