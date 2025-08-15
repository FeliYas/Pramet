<script setup>
import { ref, onMounted, inject } from 'vue';
import { useForm } from '@inertiajs/vue3';
import DashboardLayout from '@/layouts/DashboardLayout.vue';
import DataTable from '@/components/DataTable.vue';

const notification = inject('noti');

defineOptions({
    layout: DashboardLayout
});

// Definición de las columnas
const columns = ['orden', 'path', 'titulo', 'constructivas', 'tablero', 'quemador', 'categoria_id', 'manual', 'memoria'];

// Definición de rutas
const createRoute = route('productos.store');
const updateRoute = (id) => route('productos.update', { id });
const deleteRoute = (id) => route('productos.destroy', { id });
const caracteristicasRoute = (id) => route('caracteristicas.dashboard', { id });

const props = defineProps({
    logo: {
        type: String,
        required: true
    },
    categorias: {
        type: Array,
        required: true
    },
    productos: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <div>
        <div class="py-3 text-xl text-gray-700">
            <h1>Productos</h1>
        </div>
        <!-- Línea -->
        <hr class="border-t-[3px] border-main-color rounded">
        <DataTable :columns="columns" :data="productos.map(p => ({ ...p, galeria: p.galeria || [] }))"
            entityType="producto" :categorias="categorias" :createRoute="createRoute" :updateRoute="updateRoute"
            :deleteRoute="deleteRoute" recomendacion="600x600px" :caracteristicasRoute="caracteristicasRoute" />
    </div>
</template>
