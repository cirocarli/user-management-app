<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage, useForm } from '@inertiajs/vue3';
import { reactive } from 'vue';
import axios from 'axios';

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
                                    <span>Name</span>
                                    <label for="name" value="Name" class="form-label" />
                                    <input id="name" type="text" class="form-control" v-model="formData.name"
                                        required autofocus autocomplete="name" />
                                    <InputError class="mt-2" :message="formData.errors.name" />
                                </div>

                                <div class="col-6">
                                    <span>Last name</span>
                                    <label for="last_name" value="Last Name" class="form-label" />
                                    <input id="last_name" type="text" class="form-control"
                                        v-model="formData.last_name" required autofocus autocomplete="last_name" />
                                    <InputError class="mt-2" :message="formData.errors.last_name" />
                                </div>
                            </div>
                            <div class="mt-4">
                                <span>Address</span>
                                <label for="address" value="Address" class="form-label" />
                                <input id="address" type="text" class="form-control" v-model="formData.address"
                                    autofocus autocomplete="address" />
                                <InputError class="mt-2" :message="formData.errors.address" />
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <span>Zip Code</span>
                                    <label for="zip_code" value="Zip Code" class="form-label" />
                                    <input id="zip_code" type="text" class="form-control"
                                        v-model="formData.zip_code" autofocus autocomplete="zip_code" />
                                    <InputError class="mt-2" :message="formData.errors.zip_code" />
                                </div>
                                <div class="col-6">
                                    <span>City</span>
                                    <label for="city" value="City" class="form-label" />
                                    <input id="city" type="text" class="form-control" v-model="formData.city"
                                        autofocus autocomplete="city" />
                                    <InputError class="mt-2" :message="formData.errors.city" />
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <span>State</span>
                                    <label for="state" value="State" class="form-label" />
                                    <input id="state" type="text" class="form-control" v-model="formData.state"
                                        autofocus autocomplete="state" />
                                    <InputError class="mt-2" :message="formData.errors.state" />
                                </div>
                                <div class="col-6">
                                    <span>Country</span>
                                    <label for="country" value="Country" class="form-label" />
                                    <input id="country" type="text" class="form-control" v-model="formData.country"
                                        autofocus required autocomplete="country" />
                                    <InputError class="mt-2" :message="formData.errors.country" />
                                </div>
                            </div>
                            <div class="mt-4">
                                <span>Email</span>
                                <label for="email" value="Email" class="form-label" />
                                <input id="email" type="email" class="form-control" v-model="formData.email"
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
