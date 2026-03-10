<script setup lang="ts">
import Calendar from '../Components/Calendar.vue';
import Title from '../Components/Title.vue';
import Layout from '../Layouts/Layout.vue';
import ProjectList from '../Components/ProjectList.vue';
import ProjectStats from '../Components/ProjectStats.vue';

</script>

<template>
    <Layout v-slot="{ membersData, projectData, handleModal, deleteProject }">
        
        <Title title="Dashboard"/>
         
        <div class="flex-col w-full flex h-fit">
            <div class="flex gap-2 m-8">
                <Calendar :projectData="projectData"/>
            </div>
            <div class="flex flex-col w-full gap-2 h-full overflow-auto">
                <div class="flex flex-col w-full p-8 h-161">
                    <ProjectStats :projectData="projectData"/>
                    <ProjectList v-for="project in projectData" :member="membersData" :handleModal="handleModal" :deleteProject="deleteProject" :data="project" :key="project.id"/>
                </div>
            </div>
        </div>

    </Layout>
</template>