<script setup lang="ts">
import axios from 'axios';
import ProjectList from '../Components/ProjectList.vue';
import Title from '../Components/Title.vue';
import Layout from '../Layouts/Layout.vue';
import { onMounted, ref } from 'vue';
import ProjectStats from '../Components/ProjectStats.vue';

</script>

<template>
    <Layout v-slot="{ handleModal, projectData, deleteProject }">
        <Title title="Projects" />

        <ProjectStats :projectData />

        <div class="flex gap-5 flex-col" >
                <ProjectList :data="data" :handleModal="handleModal" :delete-project="deleteProject" v-for="(data, index) in projectData" :key="index"/>
        </div>
        
    </Layout>
</template>