<script setup lang="ts">
import { computed, ref } from 'vue';
import Calendar from '../Components/Calendar.vue';
import Title from '../Components/Title.vue';
import Layout from '../Layouts/Layout.vue';
</script>

<template>
    <Layout>
        <Title title="Dashboard"/>
        <Calendar />

    </Layout>
</template>