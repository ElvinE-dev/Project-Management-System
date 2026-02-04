<script setup lang="ts">
import { computed } from 'vue'

const props = defineProps({
    data:{
        type: Object,
        required: true,
    },
    deleteProject:{
        type:Function,
        required:true
    },
    handleModal:{
        type:Function,
        required:true
    }
})

async function deleteProject(id:number){
    await props.deleteProject(id)
}

const daysLeft = computed(() => {
    const now: Date = new Date()
    const end: Date = new Date(props.data.deadline)

    return Math.ceil((end.getTime() - now.getTime()) / (1000 * 60 * 60 * 24))
})

</script>


<template>
    <div class="bg-gray-700 w-full h-30 px-4 py-2 flex flex-col justify-between">
        <div class="flex justify-between">
            <div class="flex gap-2 items-center">
                <h1 class="font-bold text-2xl">{{ data.name }} | {{ data.id }}</h1>
                <span>|</span>

                <p class="font-bold">{{ data.start_date }}</p>
            </div>
            <div class="flex items-end flex-col gap-1">
                <h1 class="text-md">{{ daysLeft }} Days Left</h1>
                <h1 class="text-xs text-red-500!">Deadline: {{ data.deadline }}</h1>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex">
                <div class="bg-gray-800 w-13 h-13 rounded-full"></div>
                <div class="bg-gray-800 w-13 h-13 rounded-full"></div>
                <div class="bg-gray-800 w-13 h-13 rounded-full"></div>
                <div class="bg-gray-800 w-13 h-13 rounded-full"></div>
                <div class="bg-gray-800 w-13 h-13 rounded-full"></div>
            </div>

            <div class="flex gap-2">
                <button class="primary rounded-sm px-4 py-2">
                    Set as Complete
                </button>
                <button @click="props.handleModal()" class="primary rounded-sm px-4 py-2">
                    Edit
                </button>
                <button class="primary rounded-sm px-4 py-2" @click="deleteProject(data.id)">
                    Delete
                </button>
            </div>
        </div>
    </div>
</template>


<!-- 
    deadline
    start date
    member
    namaproject
    completed?
    id
    -->