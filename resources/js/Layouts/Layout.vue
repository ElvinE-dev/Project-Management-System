<script setup lang="ts">
import axios from 'axios';
import AddProjectButton from '../Components/AddProjectButton.vue';
import Header from '../Components/Header.vue';
import Modal from '../Components/Modal.vue';
import SideBar from '../Components/SideBar.vue';
import {computed, onMounted, ref} from "vue"
import { usePage } from '@inertiajs/vue3';


const isModalOpen = ref(false)
const projectId = ref(0)

interface Project{
    id:number,
    name:string,
    start_date:string,
    deadline:string,
    members:string
}

const projectData = ref<Project[]>([])

const EditProjectData = computed<Project | undefined>(() =>
    projectData.value.find((p) => p.id === projectId.value) ?? undefined
)

function ToggleModal(id:number) {
    isModalOpen.value = !isModalOpen.value
    projectId.value = id
}

onMounted(async () =>{
    const res = await axios.get('/api/projects')

    projectData.value = res.data
})

const fetchProjects = async () =>{
    const res = await axios.get('/api/projects')

    projectData.value = res.data
}

const deleteProject = async (id:number) =>{
    await axios.post('/api/projects/'+id)

    projectData.value = projectData.value.filter((p) => p.id !== id)
}

const route = usePage();
</script>


<template>
    <Header />

    <div class="flex dark:bg-gray-800">
        <div class="relative w-15 h-screen">
            <SideBar />
        </div>

        <div class="px-4 py-2 w-full">
            <slot :handleModal="ToggleModal" :projectData="projectData", :deleteProject="deleteProject" />
        </div>
    </div>

    <AddProjectButton v-if="route.url !== '/chats'" :handleClick="ToggleModal"/>

    <Modal v-if="isModalOpen" :EditProjectData="EditProjectData" @refresh="fetchProjects" :handleClick="ToggleModal"/>

</template>