<script setup lang="ts">
import { computed, onMounted } from 'vue'


const props = defineProps({
    projectData: {
        type: Object,
        required: true
    }
})

// 
const isCompleted = computed(() => {
    return (props.projectData ?? []).filter((project) => project.is_completed !== 0).length
})
const today = new Date().toISOString().split("T")[0]
const overDeadline = computed(() => {
  return (props.projectData ?? []).filter(
    project => new Date(project.deadline) < new Date()
  ).length
})

</script>

<template>
    <div class="flex gap-3 h-fit">
            <div class="flex flex-col items-center justify-center bg-gray-900 px-4 py-4 mb-4">
                <p class="text-primary font-bold text-2xl">
                    {{ props.projectData.length }}
                </p>
                <p>Project Ongoing</p>
            </div>
            <div class="flex flex-col items-center justify-center bg-gray-900 px-4 py-4 mb-4">
                <p class="text-primary font-bold text-2xl">
                    {{ isCompleted }}
                </p>
                <p>Completed</p>
            </div>

            <div class="flex flex-col items-center justify-center bg-gray-900 px-4 py-4 mb-4">
                <p class="text-primary font-bold text-2xl">
                    {{ overDeadline }}
                </p>
                <p>Over Deadline</p>
            </div>

        </div>
</template>