<script setup>
import { computed } from 'vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

import InputLabel from '@/components/InputLabel.vue'
import TextInput from '@/components/TextInput.vue'


const form = useForm({
    tenant_id: '',
    plan: '',
    domain: '',

})

const submit = () => {
    form.post(route('tenant.create'), {
        onFinish: () => route('dashboard'),
    })
}


</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Central Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Tenant
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        id
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Plano
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Dominio
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Gerenciar
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="$page.props.tenant" v-for="tenant in $page.props.tenant" :key="tenant"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ tenant.id }}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ tenant.tenant_id }}
                                    </th>

                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ tenant.plan }}
                                    </th>

                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ tenant.domains.length > 0 ? tenant.domains[0].domain : '' }}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Edit
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-[500px] mx-auto text-2xl font-extrabol ">
                <div>Adicionar Novo Tenant</div>

                <form @submit.prevent="submit">

                    <div class="mt-3">
                        <InputLabel class="-mb-1.5" value="Tenant ID" />
                        <TextInput v-model="form.tenant_id" type="text" class="mt-1 block w-full" required
                            placeholder="Ex: jla" />
                    </div>

                    <div class="mt-3">
                        <InputLabel class="-mb-1.5" value="Dominio" />
                        <TextInput v-model="form.domain" type="text" class="mt-1 block w-full" required
                            placeholder="Ex: jla.com" />
                    </div>

                    <div class="mt-3">
                        <InputLabel class="-mb-1.5" value="Plano" />
                        <TextInput v-model="form.plan" type="text" class="mt-1 block w-full" required placeholder="Free" />
                    </div>

                    <div class="mt-6">
                        <button class="bg-yellow-400 px-4 font-bold text-[14px] rounded-lg shadow-sm cursor-pointer">
                            Criar Tenant
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
