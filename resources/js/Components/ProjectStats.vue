<script setup lang="ts">

const props = defineProps({
    projectData: {
        type: Object,
        required: true
    }
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
</template>