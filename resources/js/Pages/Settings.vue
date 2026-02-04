<script setup lang="ts">
import Title from '../Components/Title.vue';
import Layout from '../Layouts/Layout.vue';

</script>

<template>
    <Layout>
        <Title title="Settings"/>

        <div class="flex flex-col justify-center w-full h-fit">
            <table class="w-200">
                <tr class="bg-gray-900">
                    <th class="font-bold text-start text-2xl border-r border-gray-600 p-2">Setting</th>
                    <th class="font-bold text-start text-2xl p-2">Value</th>
                </tr>
                <tr>
                    <td>Profile</td>
                    <td>
                        <label for="profile">
                            <div class="bg-gray-700 w-30 h-30 flex items-center justify-center relative">
                                <img :src="'../storage/images/profile.jpg'" alt="" class="w-full h-full object-center object-cover">
                                <div class="bg-black/55 w-full h-full flex items-center justify-center absolute top-0 left-0 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </div>
                            </div>
                        </label>
                        <input type="file" hidden id="profile" class="border border-gray-600 p-2">
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" placeholder="New Username...." class="border border-gray-600 p-2">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" placeholder="New Email...." class="border border-gray-600 p-2">
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" placeholder="New Username...." class="border border-gray-600 p-2">
                    </td>
                </tr>

            </table>
        </div>
    </Layout>
</template>