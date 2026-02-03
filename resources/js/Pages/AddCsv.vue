<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

// State for the UI
const isDragging = ref(false);
const processing = ref(false);
const progress = ref(0);
const currentStep = ref(0);

// Inertia Form
const form = useForm({
    csv_file: null,
});

// Steps for the "Model Process" visualization
const steps = [
    { title: 'Uploading File', icon: '📂' },
    { title: 'Cleaning Data', icon: '🧹' },
    { title: 'Extracting Sentiments', icon: '🧠' },
    { title: 'Saving to Database', icon: '💾' }
];

// Handle File Selection
const handleFile = (event) => {
    const selected = event.target.files ? event.target.files[0] : event.dataTransfer.files[0];
    if (selected && selected.type === "text/csv") {
        form.csv_file = selected;
        uploadFile();
    } else {
        alert("Please upload a valid CSV file.");
    }
    isDragging.value = false;
};

// Real Upload Process with UI Simulation
const uploadFile = () => {
    processing.value = true;
    currentStep.value = 0;
    progress.value = 0;

    // Start UI Animation Loop
    const interval = setInterval(() => {
        if (progress.value < 90) {
            progress.value += 1;
            updateStep();
        }
    }, 50);

    // Submit to Backend
    form.post(route('upload.csv'), {
        onSuccess: () => {
            clearInterval(interval);
            progress.value = 100;
            currentStep.value = 3;
            setTimeout(() => {
                alert("Success! Data labeled and saved to MySQL.");
                processing.value = false;
                form.reset();
            }, 500);
        },
        onError: () => {
            clearInterval(interval);
            processing.value = false;
            alert("Error uploading file.");
        }
    });
};

const updateStep = () => {
    if (progress.value < 30) currentStep.value = 0;
    else if (progress.value < 60) currentStep.value = 1;
    else if (progress.value < 90) currentStep.value = 2;
    else currentStep.value = 3;
};
</script>

<template>
    <Head title="Add CSV Dataset" />

    <DashboardLayout>
        <div class="h-full flex flex-col">
            
            <h2 class="font-bold text-2xl text-gray-800 mb-6">Import New Dataset (MySQL)</h2>

            <div class="bg-white flex-1 rounded-[30px] p-8 shadow-sm border border-gray-100 flex flex-col items-center justify-center relative overflow-hidden">
                
                <div v-if="!processing" class="w-full max-w-xl transition-all duration-300">
                    <div 
                        @dragover.prevent="isDragging = true"
                        @dragleave.prevent="isDragging = false"
                        @drop.prevent="handleFile"
                        :class="[
                            'border-4 border-dashed rounded-3xl p-10 text-center transition-all duration-300 cursor-pointer flex flex-col items-center justify-center min-h-[300px]',
                            isDragging ? 'border-green-500 bg-green-50 scale-105' : 'border-gray-200 hover:border-green-400 hover:bg-gray-50'
                        ]"
                    >
                        <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-4 text-3xl">
                            📄
                        </div>

                        <h3 class="text-xl font-bold text-gray-700 mb-2">
                            {{ isDragging ? 'Drop it here!' : 'Drag & Drop your CSV file' }}
                        </h3>
                        <p class="text-gray-400 text-sm mb-6">or click to browse from your computer</p>
                        
                        <input type="file" accept=".csv" class="hidden" id="fileInput" @change="handleFile">
                        
                        <label for="fileInput" class="bg-gray-900 text-white px-8 py-3 rounded-full font-semibold hover:bg-gray-800 transition shadow-lg cursor-pointer">
                            Browse Files
                        </label>
                    </div>

                    <div class="mt-8 text-center">
                        <p class="text-xs text-gray-400 uppercase tracking-widest font-bold">Supported Formats</p>
                        <p class="text-sm text-gray-500 mt-1">.CSV (Column 1 = Text)</p>
                    </div>
                </div>

                <div v-else class="w-full max-w-2xl">
                    
                    <h3 class="text-center text-xl font-bold text-gray-800 mb-8 animate-pulse">
                        Processing & Labeling Data...
                    </h3>

                    <div class="relative flex justify-between items-start mb-12">
                        <div class="absolute top-5 left-0 w-full h-1 bg-gray-200 rounded-full -z-10"></div>
                        <div class="absolute top-5 left-0 h-1 bg-green-500 rounded-full -z-10 transition-all duration-300" :style="{ width: progress + '%' }"></div>

                        <div v-for="(step, index) in steps" :key="index" class="flex flex-col items-center w-1/4">
                            <div 
                                :class="[
                                    'w-10 h-10 rounded-full flex items-center justify-center text-lg border-2 transition-all duration-500',
                                    index <= currentStep ? 'bg-green-500 border-green-500 text-white scale-110 shadow-lg' : 'bg-white border-gray-300 text-gray-300'
                                ]"
                            >
                                <span v-if="index < currentStep">✓</span>
                                <span v-else>{{ step.icon }}</span>
                            </div>
                            <p 
                                :class="[
                                    'mt-3 text-xs font-bold uppercase tracking-wider text-center transition-colors',
                                    index <= currentStep ? 'text-green-600' : 'text-gray-400'
                                ]"
                            >
                                {{ step.title }}
                            </p>
                        </div>
                    </div>

                    <div class="bg-gray-900 rounded-xl p-6 font-mono text-xs text-green-400 shadow-2xl h-48 overflow-hidden relative">
                        <div class="absolute top-4 right-4 flex gap-2">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        </div>
                        <div class="flex flex-col gap-2 mt-4 opacity-90">
                            <p>> Initializing upload...</p>
                            <p v-if="currentStep >= 0">> File received: {{ form.csv_file ? form.csv_file.name : 'Unknown' }}</p>
                            <p v-if="currentStep >= 1">> Cleaning data stream...</p>
                            <p v-if="currentStep >= 2" class="text-blue-300">> Running Sentiment Analysis...</p>
                            <p v-if="currentStep >= 2" class="text-blue-300">> Labeling rows [Positive/Negative]...</p>
                            <p v-if="currentStep >= 3" class="text-white">> INSERT INTO database...</p>
                            <p v-if="progress >= 100" class="text-green-200">> DONE.</p>
                            <p class="animate-pulse">_</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </DashboardLayout>
</template>