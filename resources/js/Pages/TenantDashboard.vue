<script setup>
import { computed } from 'vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

import InputLabel from '@/components/InputLabel.vue'
import TextInput from '@/components/TextInput.vue'



</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tenant Dashboard ( {{ $page.props.tenant_id }} )
            </h2>
        </template>
    </AuthenticatedLayout>
</template>
