<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import ChatNavigation from '../Components/ChatNavigation.vue';
import Layout from '../Layouts/Layout.vue';
import axios from 'axios';
import { computed, onMounted } from 'vue';
import { ref } from 'vue';
import Echo from 'laravel-echo';


interface Data {
    id:number,
    sender_id:number,
    receiver_id:number,
}

interface Receiver{
    id:number,
    username:string,
    email:string,
    profile:null
}

interface Auth{
    user:{
        id:number,
        username:string,
        email:string,
        profile:null
    }
}

interface Message{
    id:number,
    message:string,
    sender_id:number,
    conversation_id:number,
    created_at:string
}


const props = defineProps<{data?: Data, messages?:Message[], opponent?:Receiver,  auth:Auth}>()

const receiver = ref<Receiver | null>(null);
const conversations = ref([]);
const messages = ref<Message[]>([]);


onMounted(async () => {
    
    if(!props.auth.user.id) window.location.href = '/login';

    const getConversation = await axios.post('/api/conversations', {
        user_id: props.auth?.user.id
    })

    conversations.value = getConversation.data

    if (!props.data?.id) return;


    messages.value = props.messages

    if(!props.data.receiver_id || !props.auth?.user) return;
    receiver.value = props.opponent

    window.Echo.private(`conversation.${props.data.id}`)
    .listen('.MessageSent', (e:Object) => {
        messages.value.unshift(e.message)
    })
})

const message = ref('')

async function sendMessage(){
    
    await axios.post('/chat/'+props.data.id, {
        message:message.value,
    })

    message.value = ''
}


</script>


<template>
    <Layout>
        <div class="flex w-full h-full rounded-md" >
            <div class="flex flex-col border-r bg-gray-700 w-2/12 h-11/12 rounded-l-md">
                <div class="flex justify-between items-center p-4 border-b">
                    <h2 class="font-bold text-2xl">Chats</h2>
                    <div class="bg-gray-800 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>
                </div>

                <div class="flex flex-col w-full">
                    <ChatNavigation v-for="data in conversations" :data="data" :latest_message="messages[0]"/>
                </div>
            </div>
            <div class="bg-gray-700 w-10/12 h-11/12 rounded-r-md justify-between">
                <div class="w-full h-full flex items-center justify-center" v-if="!receiver">
                    Choose someone to chat with
                </div>
                <div class="w-full h-full flex flex-col" v-if="receiver">
                    <div class="flex items-center h-20 p-2 gap-3 w-full border-b border-gray-500">
                        <div class="w-13 h-13 bg-gray-800 rounded-full"></div>
                        <div class="flex flex-col">
                            <p>{{ receiver?.username }}</p>
                            <p class="text-xs">{{ receiver?.email }}</p>
                        </div>
                    </div>
    
                    <div class="max-w-full h-full flex flex-col-reverse gap-5 p-6 overflow-auto">
                        <div :class="message.sender_id === props.auth?.user.id ? 'chat-sent' : 'chat-received'" v-for="message in messages">
                            <p>
                                {{ message.message }}
                            </p>
                            <div class="flex self-end items-center gap-2">
                                <span class="text-xs">{{ message.created_at }}</span>
                                <span v-if="message.sender_id === props.auth?.user.id">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
    
                    <form action="post" class="flex" @submit.prevent="sendMessage()">
                        <input v-model="message" class="p-2 rounded-l-md border border-gray-500 w-12/12" type="text" placeholder="Type Something....">
                        <button class="primary py-2 px-4 rounded-r-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </Layout>
</template>