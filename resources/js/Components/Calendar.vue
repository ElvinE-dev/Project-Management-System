<script setup lang="ts">
import { ref, computed } from 'vue'

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
</script>

<template>
 <div class="w-full flex-col flex items-center justify-center h-fit">
            <div class="flex justify-between p-2 items-center w-full">
                <button @click="nextDate" class="bg-gray-700 px-4 py-2 rounded-md"><</button>
                <p class="font-bold text-2xl"> {{ monthNames[month] }} {{ year }}</p>
                <button @click="prevDate" class="bg-gray-700 px-4 py-2 rounded-md">></button>
            </div>
            <div class="grid grid-cols-7 w-full">
                <div class="bg-gray-700 p-2 border-gray-600 border">
                    Sun
                </div>
                <div class="bg-gray-700 p-2 border-gray-600 border">
                    Mon
                </div>
                <div class="bg-gray-700 p-2 border-gray-600 border">
                    Tue
                </div>
                <div class="bg-gray-700 p-2 border-gray-600 border">
                    Wed
                </div>
                <div class="bg-gray-700 p-2 border-gray-600 border">
                    Thu
                </div>
                <div class="bg-gray-700 p-2 border-gray-600 border">
                    Fri
                </div>
                <div class="bg-gray-700 p-2 border-gray-600 border">
                    Sat
                </div>
            </div>
            <div class="grid grid-cols-7 w-full">
    
                <div v-for="eday in startDay" :key="`e`+eday" class="bg-gray-700 border-gray-600 border p-4">
                </div>
    
                <div v-for="day in daysInMonth" :key="day" :class="isToday(day) ? `bg-primary` : ``" class="border-gray-600 border p-4 aspect-square">
                    {{ day }}
                </div>
            </div>
        </div>
</template>
