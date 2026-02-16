<script setup>
import ChatNavigation from '../Components/ChatNavigation.vue';
import Layout from '../Layouts/Layout.vue';

</script>


<template>
    <Layout>
        <div class="flex w-full h-full">
            <div class="flex flex-col border-r bg-gray-700 w-2/12 h-11/12">
                <div class="flex justify-between items-center p-4 border-b">
                    <h2 class="font-bold text-2xl">Chats</h2>
                    <div class="bg-gray-800 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>
                </div>

                <div class="flex flex-col w-full">
                    <ChatNavigation />
                    <ChatNavigation />
                    <ChatNavigation />
                    <ChatNavigation />
                </div>
            </div>
            <div class="flex flex-col border-r bg-gray-700 w-10/12 h-11/12 items-center justify-center">
                Start Chatting with username 1234567
            </div>
        </div>
    </Layout>
</template>