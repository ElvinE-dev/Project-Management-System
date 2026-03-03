<script setup lang="ts">
import axios from 'axios';
import Title from '../Components/Title.vue';
import Layout from '../Layouts/Layout.vue';
import { onMounted, ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { computed } from '@vue/reactivity';

interface UserData{
    id:number;
    username:string;
    email:string;
    profile: string|null;
}
interface PageProps {
  [key: string]: unknown

  auth?: {
    user?: {
      id: number
      name: string
      email: string
    } | null
  }
}
const page = usePage<PageProps>()

const auth = computed(() => page.props.auth?.user)


const usersData = ref<UserData[]>([])


onMounted(async() => {
    const res = await axios.get('/api/users');
    usersData.value = res.data
})

async function createConversation(target_id:number){
    const {data} = await axios.post('/api/conversation', {
        sender_id:auth.value?.id,
        receiver_id:target_id
    })

    if(data.conversation_id){
        window.location.href ='/chats/'+data.conversation_id
    }
}

</script>

<template>
    <Layout>
        <Title title="Members"/>
        <div class="flex gap-5 flex-wrap">
            <div class="bg-gray-700 rounded-md w-50 h-75 flex flex-col items-center justify-center gap-5" v-for="user in usersData">
                <div class="rounded-full w-30 h-30 bg-gray-800"></div>
                <div class="text-center flex flex-col gap-1">
                    <h3>{{ user.username }}</h3>
                    <h4 class="text-xs">{{ user.email }}</h4>
                </div>

                <div class="flex">
                    <button @click="createConversation(user.id)" class="bg-primary! px-8 py-2 rounded-md">Chat</button>
                </div>
            </div>
        </div>
    </Layout>
</template>