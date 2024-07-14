<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, usePage, useForm } from '@inertiajs/vue3';

const page = usePage();
const formData = useForm({
    name: page.props.user.name,
    email: page.props.user.email,
    last_name: page.props.user_meta.last_name,
    address: page.props.user_meta.address,
    zip_code: page.props.user_meta.zip_code,
    city: page.props.user_meta.city,
    state: page.props.user_meta.state,
    country: page.props.user_meta.country,
});

</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit user</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <hr>
                        <form @submit.prevent="formData.patch(route('admin.users.update', page.props.user.id))">
                            <div class="row pt-4">
                                <div class="col-6">
                                    <InputLabel for="name" value="Name" class="form-label" />
                                    <TextInput id="name" type="text" class="form-control" v-model="formData.name"
                                        required autofocus autocomplete="name" />
                                    <InputError class="mt-2" :message="formData.errors.name" />
                                </div>

                                <div class="col-6">
                                    <InputLabel for="last_name" value="Last Name" class="form-label" />
                                    <TextInput id="last_name" type="text" class="form-control"
                                        v-model="formData.last_name" required autofocus autocomplete="last_name" />
                                    <InputError class="mt-2" :message="formData.errors.last_name" />
                                </div>
                            </div>
                            <div class="mt-4">
                                <InputLabel for="address" value="Address" class="form-label" />
                                <TextInput id="address" type="text" class="form-control" v-model="formData.address"
                                    autofocus autocomplete="address" />
                                <InputError class="mt-2" :message="formData.errors.address" />
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <InputLabel for="zip_code" value="Zip Code" class="form-label" />
                                    <TextInput id="zip_code" type="text" class="form-control"
                                        v-model="formData.zip_code" autofocus autocomplete="zip_code" />
                                    <InputError class="mt-2" :message="formData.errors.zip_code" />
                                </div>
                                <div class="col-6">
                                    <InputLabel for="city" value="City" class="form-label" />
                                    <TextInput id="city" type="text" class="form-control" v-model="formData.city"
                                        autofocus autocomplete="city" />
                                    <InputError class="mt-2" :message="formData.errors.city" />
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <InputLabel for="state" value="State" class="form-label" />
                                    <TextInput id="state" type="text" class="form-control" v-model="formData.state"
                                        autofocus autocomplete="state" />
                                    <InputError class="mt-2" :message="formData.errors.state" />
                                </div>
                                <div class="col-6">
                                    <InputLabel for="country" value="Country" class="form-label" />
                                    <select id="country" class="form-control" v-model="formData.country" autofocus required
                                        autocomplete="country" style="height: 42px;">
                                        <option v-for="country in page.props.countries" :key="country.id" :value="country.name">
                                            {{ country.name }}
                                        </option>
                                    </select>
                                    <InputError class="mt-2" :message="formData.errors.country" />
                                </div>
                            </div>
                            <div class="mt-4">
                                <InputLabel for="email" value="Email" class="form-label" />
                                <TextInput id="email" type="email" class="form-control" v-model="formData.email"
                                    required autocomplete="username" />
                                <InputError class="mt-2" :message="formData.errors.email" />
                            </div>
                            <div class="row pt-4">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-warning">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
