<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Operating Units" />

    <DashboardLayout>
        <div class="flex flex-col gap-6 h-full">
            
            <h2 class="font-bold text-lg text-gray-800 uppercase">SERVICES AVAIL</h2>

            <div class="bg-gradient-to-r from-green-500 to-green-400 rounded-full py-3 px-8 text-white text-sm font-semibold flex justify-between shadow-sm overflow-x-auto">
                <span class="whitespace-nowrap px-2">Admission</span>
                <span class="whitespace-nowrap px-2">Application</span>
                <span class="whitespace-nowrap px-2">Issuance of Permit</span>
                <span class="whitespace-nowrap px-2">Issuance of Permit</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="bg-white rounded-[30px] p-6 shadow-sm min-h-[300px] flex flex-col items-center justify-center relative">
                    <h3 class="absolute top-6 left-0 right-0 text-center font-bold text-gray-700 text-xs uppercase">SENTIMENT DISTRIBUTION - REGISTRAR</h3>
                    
                    <div class="relative w-48 h-48 rounded-full bg-[conic-gradient(at_center,_#3b82f6_0deg_200deg,_#fbbf24_200deg_290deg,_#4ade80_290deg_360deg)]">
                        <div class="absolute inset-0 m-auto w-0 h-0 bg-white rounded-full"></div> 
                        
                        <div class="absolute inset-0 w-full h-full rounded-full border-4 border-white opacity-50"></div>
                    </div>

                    <div class="flex gap-4 mt-6 text-[10px] font-bold text-gray-600">
                        <div class="flex items-center gap-1"><span class="w-2 h-2 bg-yellow-400 rounded-sm"></span> Admission</div>
                        <div class="flex items-center gap-1"><span class="w-2 h-2 bg-blue-500 rounded-sm"></span> Application</div>
                        <div class="flex items-center gap-1"><span class="w-2 h-2 bg-green-400 rounded-sm"></span> Issuance</div>
                    </div>
                </div>

                <div class="bg-white rounded-[30px] p-6 shadow-sm min-h-[300px] flex flex-col relative">
                    <h3 class="text-center font-bold text-gray-700 text-xs uppercase mb-8">SENTIMENT DISTRIBUTION - ADMISSION</h3>
                    
                    <div class="flex-1 flex items-end justify-center gap-3 px-4 pb-2 border-b border-gray-200 border-l ml-2">
                        <div class="w-6 bg-red-500 rounded-t-sm h-[20%]"></div>
                        <div class="w-6 bg-yellow-400 rounded-t-sm h-[30%]"></div>
                        <div class="w-6 bg-green-500 rounded-t-sm h-[40%]"></div>
                        <div class="w-6 bg-blue-400 rounded-t-sm h-[50%]"></div>
                        <div class="w-6 bg-red-500 rounded-t-sm h-[60%]"></div>
                        <div class="w-6 bg-yellow-400 rounded-t-sm h-[70%]"></div>
                        <div class="w-6 bg-green-500 rounded-t-sm h-[90%]"></div>
                    </div>

                    <div class="flex justify-center gap-4 mt-4 text-[10px] font-bold text-gray-600">
                        <div class="flex items-center gap-1"><span class="w-2 h-2 bg-yellow-400 rounded-sm"></span> Transferees</div>
                        <div class="flex items-center gap-1"><span class="w-2 h-2 bg-blue-500 rounded-sm"></span> Freshmen</div>
                        <div class="flex items-center gap-1"><span class="w-2 h-2 bg-green-500 rounded-sm"></span> Returning Students</div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div v-for="(label, index) in ['Total Feedback', 'Positive Comments', 'Negative Comments', 'Neutral Comments']" :key="index" 
                    class="bg-green-500 hover:bg-green-600 transition rounded-2xl p-4 text-white shadow-sm flex flex-col justify-center">
                    <div class="text-[10px] opacity-90 uppercase font-semibold mb-1 leading-tight w-2/3">{{ label }}</div>
                    <div class="text-3xl font-bold">1,238</div>
                </div>
            </div>

        </div>
    </DashboardLayout>
</template>