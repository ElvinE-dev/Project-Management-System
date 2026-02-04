<script setup lang="ts">
import axios from 'axios';
import AddProjectButton from '../Components/AddProjectButton.vue';
import Header from '../Components/Header.vue';
import Modal from '../Components/Modal.vue';
import SideBar from '../Components/SideBar.vue';
import {onMounted, ref} from "vue"


const isModalOpen = ref(false)

interface Project{
    id:number,
    name:string,
    start_date:string,
    deadline:string,
    members:string
}

const projectData = ref<Project[]>([])

function ToggleModal() {
    isModalOpen.value = !isModalOpen.value
}

onMounted(async () =>{
    const res = await axios.get('/api/projects')

    projectData.value = res.data
})

const fetchProject = async () =>{
    const res = await axios.get('/api/projects')

    projectData.value = res.data
}

const deleteProject = async (id:number) =>{
    await axios.post('/api/projects/'+id)

    projectData.value = projectData.value.filter((p) => p.id !== id)
}
</script>


<template>
    <Header />

    <div class="flex dark:bg-gray-800">
        <div class="relative w-15 h-screen">
            <SideBar />
        </div>

        <div class="px-4 py-2 w-full">
            <slot :handleModal="ToggleModal" :projectData="projectData", :deleteProject />
        </div>
    </div>

    <AddProjectButton :handleClick="ToggleModal"/>

    <Modal v-if="isModalOpen" @refresh="fetchProject" :handleClick="ToggleModal"/>

</template>