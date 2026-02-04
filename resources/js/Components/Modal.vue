<script setup>
import { ref } from 'vue'

const props = defineProps({
    handleClick: {
        type: Function,
        required: true
    }
})

const emit = defineEmits(['refresh'])

const ToggleModal = () => {
    props.handleClick()
}

const name = ref('')
const deadline = ref('')
const start_date = ref('')
const members = ref('')

const CreateProject = async () => {
    await axios.post('/api/projects',{
        name: name.value,
        deadline: deadline.value,
        start_date: start_date.value,
        members: members.value,
        is_completed: false
    })

    name.value = ''
    start_date.value = ''
    deadline.value = ''
    members.value = ''

    ToggleModal()

    emit('refresh')

}

</script>

<template>
    <div class="flex z-10 items-center justify-center fixed top-0 left-0 w-screen h-screen">
        <span class="w-full h-full bg-black/15 absolute z-15" @click="ToggleModal"></span>
        <form @submit.prevent="CreateProject()" class="flex flex-col bg-gray-800 w-200 h-100 z-20 gap-5 p-4">
            <div class="flex-col flex w-full">
                namaproject
                <input 
                type="text" 
                v-model="name"
                class="bg-gray-700 border border-gray-400 p-3 w-full rounded-md">
            </div>

            <div class="flex gap-5 w-full">
                <div class="w-full">
                    deadline
                    <input 
                    type="date" 
                    v-model="deadline"
                    class="bg-gray-700 border border-gray-400 p-3 w-full rounded-md">
                </div>

                <div class="w-full">
                    startdate
                    <input 
                    type="date" 
                    v-model="start_date"
                    class="bg-gray-700 border border-gray-400 p-3 w-full rounded-md">
                </div>
            </div>

            <div class="flex-col flex w-full">
                members
                <input 
                type="text" 
                v-model="members"
                class="bg-gray-700 border border-gray-400 p-3 w-full rounded-md">
            </div>

            <button role="submit" type="submit"  class="bg-primary! p-3 w-full rounded-md">
                Create
            </button>

        </form>
    </div>
</template>