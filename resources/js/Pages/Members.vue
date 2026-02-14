<script setup lang="ts">
import axios from 'axios';
import Title from '../Components/Title.vue';
import Layout from '../Layouts/Layout.vue';
import { onMounted, ref } from 'vue';

interface UserData{
    id:number;
    username:string;
    email:string;
    profile: string|null;
}


const usersData = ref<UserData[]>([])


onMounted(async() => {
    const res = await axios.get('/api/users');
    usersData.value = res.data
})

</script>

<template>
    <Layout>
        <Title title="Members"/>

        <div v-for="user in usersData">
            {{ user.username }}
        </div>
    </Layout>
</template>