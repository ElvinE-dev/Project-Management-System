<script setup>
import ChatNavigation from '../Components/ChatNavigation.vue';
import Layout from '../Layouts/Layout.vue';

</script>


<template>
    <Layout>
        <div class="flex w-full h-full rounded-md">
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
                    <ChatNavigation />
                    <ChatNavigation />
                    <ChatNavigation />
                    <ChatNavigation />
                </div>
            </div>
            <div class="flex flex-col bg-gray-700 w-10/12 h-11/12 rounded-r-md justify-between">
                <div class="flex items-center h-20 p-2 gap-3 w-full border-b border-gray-500">
                    <div class="w-13 h-13 bg-gray-800 rounded-full"></div>
                    <p>Username 1234567</p>
                </div>

                <div class="w-full h-full flex flex-col-reverse gap-5 p-6">
                    <div class="chat-sent">
                        asdasdasd
                        asdasdasd
                        asdasdasd
                        asdasdasd
                        asdasdasd
                        asdasdasd
                        asdasdasd
                        asdasdasd
                    </div>
                    <div class="chat-received">
                        asdasdasd
                        asdasdasd
                        asdasdasd
                        asdasdasd
                        asdasdasd
                        asdasdasd
                        asdasdasd
                        asdasdasd
                    </div>
                </div>

                <form action="" class="flex">
                    <input class="p-2 rounded-l-md border border-gray-500 w-12/12" type="text" placeholder="Type Something....">
                    <button class="primary py-2 px-4 rounded-r-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </Layout>
</template>