<script setup lang="ts">
import { Link } from '@inertiajs/vue3';


interface Data{
    opponent:{
        id:number,
        username:string,
        email:string,
        profile:null
    },
    conversation_id:number,
    latest_chat:{
        id:number,
        message:string,
        sender_id:number,
        conversation_id:number,
        created_at:string
    }
}

const props = defineProps<{data:Data}>();

const opponent = props.data.opponent

</script>

<template>
        <Link :href="'/chats/'+props.data.conversation_id" class="w-full h-20  hover:bg-gray-800! flex items-center p-2 border-b border-white/10">
            <div class="rounded-full bg-gray-800 w-2/12 shrink-0 aspect-square">

            </div>

            <div class="flex flex-col w-10/12 h-full px-2 justify-center">
                <div class="w-full flex justify-between items-center">
                    <p>{{ opponent.username }}</p>
                    <p class="text-xs">12.17</p>
                </div>
                
                <div class="w-full flex justify-between items-center">
                    <span class="text-sm truncate">{{ props.data.latest_chat?.message }}</span>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                    </div>
                </div>
            </div>
        </Link>
</template>