<script setup lang="ts">
import { ref, computed } from 'vue'

const props = defineProps({
    projectData: {
        type:Object,
        required: true,
    }
})


interface Project{
    id:number,
    name:string,
    start_date:string,
    deadline:string,
    members:string
}

const currentDate = ref(new Date())

const today = new Date()
const year = computed(() => currentDate.value.getFullYear())
const month = computed(() => currentDate.value.getMonth())

const monthNames = [
  'January','February','March','April','May','June',
  'July','August','September','October','November','December'
]

const daysInMonth = computed(() => 
    new Date(year.value, month.value + 1, 0).getDate()
)
const startDay = computed(() => 
    new Date(year.value, month.value, 1).getDay()
)

const isToday = (day:number) => day === today.getDate() && month.value === today.getMonth() && year.value === today.getFullYear()

const nextDate = () => {
    currentDate.value = new Date(year.value, month.value - 1, 1)
}
const prevDate = () => {
    currentDate.value = new Date(year.value, month.value + 1, 1)
}

const getProjectByDate = (day:number) => {
    return props.projectData.filter((p:Project) => {
        let deadline = new Date(p.deadline)

        return (
            deadline.getDate() === day && deadline.getMonth() === month.value && deadline.getFullYear() === year.value
        )
    })
}
</script>

<template>
 <div class="w-6/12 h-fit flex-col flex items-center justify-center p-8 bg-gray-900 rounded-xl">
            <div class="flex justify-between p-2 items-center w-full">
                <button @click="nextDate" class="bg-gray-700 px-4 py-2 rounded-md"><</button>
                <p class="font-bold text-2xl"> {{ monthNames[month] }} {{ year }}</p>
                <button @click="prevDate" class="bg-gray-700 px-4 py-2 rounded-md">></button>
            </div>
            <div class="grid grid-cols-7 w-full">
                <div class="font-bold p-2">
                    Sun
                </div>
                <div class="font-bold p-2">
                    Mon
                </div>
                <div class="font-bold p-2">
                    Tue
                </div>
                <div class="font-bold p-2">
                    Wed
                </div>
                <div class="font-bold p-2">
                    Thu
                </div>
                <div class="font-bold p-2">
                    Fri
                </div>
                <div class="font-bold p-2">
                    Sat
                </div>
            </div>
            <div class="grid grid-cols-7 w-full">
    
                <div v-for="eday in startDay" :key="`e`+eday" class="p-4 hover:bg-gray-800 rounded-xl">
                </div>

                <!-- :class="isToday(day) ? 'bg-blue-500' : '' " -->

                <div v-for="day in daysInMonth" :key="day" :class="isToday(day) ? 'bg-blue-500 hover:bg-blue-400!' : ''"  class=" border border-gray-900 p-4 aspect-square hover:bg-gray-800 rounded-xl cursor-pointer">
                    {{ day }}

                    <div class="text-xs truncate" v-for="project in getProjectByDate(day)">
                        {{ project.name }}
                    </div>
                </div>
            </div>
        </div>
</template>
