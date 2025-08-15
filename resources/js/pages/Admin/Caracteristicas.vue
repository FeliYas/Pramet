<script setup>
import DashboardLayout from '@/layouts/DashboardLayout.vue';
import DataTable from '@/components/DataTable.vue';

defineOptions({
    layout: DashboardLayout
});

const props = defineProps({
    logo: {
        type: String,
        required: true
    },
    caracteristicas: {
        type: Array,
        required: true
    },
    producto: {
        type: Object,
        required: true
    }
});

// Definición de las columnas
const columns = ['orden', 'titulo', 'valor'];

// Definición de rutas
const createRoute = route('caracteristicas.store', { id: props.producto.id });
const updateRoute = (id) => route('caracteristicas.update', { id: props.producto.id, caracteristicaId: id });
const deleteRoute = (id) => route('caracteristicas.destroy', { id: props.producto.id, caracteristicaId: id });


</script>

<template>
    <div>
        <div class="py-3 text-xl text-gray-700">
            <h1>Caracteristicas de {{ producto.titulo }}</h1>
        </div>
        <!-- Línea -->
        <hr class="border-t-[3px] border-main-color rounded">
        <DataTable :columns="columns" :data="caracteristicas" :createRoute="createRoute" :updateRoute="updateRoute"
            :deleteRoute="deleteRoute" />
    </div>
</template>
