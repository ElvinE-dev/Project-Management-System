<script setup lang="ts">
import axios from 'axios';
import ProjectList from '../Components/ProjectList.vue';
import Title from '../Components/Title.vue';
import Layout from '../Layouts/Layout.vue';
import { onMounted, ref } from 'vue';

</script>

<template>
    <Layout v-slot="{ handleModal, projectData, deleteProject }">
        <Title title="Projects" />

        <div class="flex gap-3">
            <div class="flex flex-col items-center justify-center bg-gray-900 px-4 py-4 mb-4">
                <p class="text-primary font-bold text-2xl">
                    {{ projectData.length }}
                </p>
                <p>Project Ongoing</p>
            </div>
            <div class="flex flex-col items-center justify-center bg-gray-900 px-4 py-4 mb-4">
                <p class="text-primary font-bold text-2xl">
                    8
                </p>
                <p>Completed</p>
            </div>

            <div class="flex flex-col items-center justify-center bg-gray-900 px-4 py-4 mb-4">
                <p class="text-primary font-bold text-2xl">
                    11
                </p>
                <p>Over Deadline</p>
            </div>

            <div class="flex flex-col items-center justify-center bg-gray-900 px-4 py-4 mb-4">
                <p class="text-primary font-bold text-2xl">
                    21
                </p>
                <p>Employee working</p>
            </div>

        </div>

        <div class="flex gap-5 flex-col" >
                <ProjectList :data="data" :handleModal="handleModal" :delete-project="deleteProject" v-for="(data, index) in projectData" :key="index"/>
        </div>
        
    </Layout>
</template>