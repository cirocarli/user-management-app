<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';

const page = usePage();
let usersInfo = JSON.parse(JSON.stringify(page.props.users));
let userMetaInfo = JSON.parse(JSON.stringify(page.props.user_meta));
const allUsersInfo = usersInfo.map((item, i) => Object.assign({}, item, userMetaInfo[i]));

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Users</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="d-flex align-items-center justify-content-between">
                        </div>
                        <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Zip Code</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="allUsersInfo" v-for="user in allUsersInfo">
                                <td class="align-middle">{{ user.name }}</td>
                                <td class="align-middle">{{ user.last_name }}</td>
                                <td class="align-middle">{{ user.email }}</td>
                                <td class="align-middle">{{ user.address }}</td>
                                <td class="align-middle">{{ user.zip_code }}</td>
                                <td class="align-middle">{{ user.city }}</td>
                                <td class="align-middle">{{ user.state }}</td>
                                <td class="align-middle">{{ user.country }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a :href="`../users/profile/${user.id}`" type="button" class="btn btn-primary">Profile</a>
                                        <a :href="`users/edit/${user.id}`" type="button" class="btn btn-secondary">Edit</a>
                                        <a v-if="user.is_admin != 1" :href="`users/delete/${user.id}`" type="button" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr v-if="!allUsersInfo">
                                <td class="text-center" colspan="5">Users not found</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
