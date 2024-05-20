<script setup>
import { Link } from '@inertiajs/vue3';
import Homelayout from '@/Layouts/Homelayout.vue';

defineOptions({
    layout: Homelayout
})

</script>

<template>
    <main id="page-trans">
        <div class="info">
        <img src="https://louisville.edu/enrollmentmanagement/images/person-icon/image" alt="">
        <h1 class="text-4xl text-center font-bold mt-5">Student Record List</h1>
        <p class="text-center font-bold">(SRL)</p>
        <p class="mt-5 text-center">A student list is a compilation of individuals enrolled in an educational institution or program.</p>
        <p class="text-center">It typically includes details such as students' names,</p>
        <p class="text-center">identification numbers, and sometimes additional data like course and year level, </p>
        <p class="text-center">Student lists are fundamental administrative tools</p>
        <p class="text-center">for managing academic institutions, facilitating communication, tracking progress, </p>
        <p class="text-center mb-5">and ensuring compliance with regulations. </p>
        <Link href="/list" class="route font-bold bg-blue-600 py-2 px-5 text-center rounded">Explore now</Link>
        </div>
    </main>
</template>

<style scoped>
.route{
    margin-left: 430px;
}
.route:hover{
    background-color: rgb(121, 176, 248);
}
.info {
    background-color: black;
    color: white;
    height: 200vh;
}
img {
    height: 100px;
    width: 110px;
    border-radius: 50%;
    margin-left: 440px;
}
</style>