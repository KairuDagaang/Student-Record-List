<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <div class="flex">
        <div class="navbar w-[200px] bg-gray-800 text-white">
            <img src='https://images.rawpixel.com/image_png_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjkzNy1hZXctMTY1LnBuZw.png' alt="">
            <nav class="item-center">
                <h1 class="text-center mt-[25px] text-2xl">Student Record List</h1>
                <p class="text-center mt-5">College students</p>
                <Link href="/" class="about bg-black py-2 px-5 text-center rounded mt-3">About</Link>
                <Link href="/list" class="about bg-black py-2 px-5 text-center rounded">Add List</Link>
                <Link href="/record" class="about bg-black py-2 px-5 text-center rounded">Students</Link>
                <Link href="/student-csvimport" class="about bg-black py-2 px-5 text-center rounded">Open CSV</Link>
                <Link href="/qrscanner" class="about bg-black py-2 px-5 text-center rounded">Scan QR Code</Link>
            </nav>
            
        </div>
        <div class="content flex-grow">
            <Transition name="page-trans" mode="out-in"> 
            <slot />
            </Transition>
        </div>   
    </div>
</template>

<style scoped>
img {
    margin-top: 15px;
    height: 100px;
    width: 100px;
    border-radius: 50%;
    margin-left: 100px;
}
.about{
    margin-left: 70px;
    margin-bottom: 20px;
    width: 150px;
}
.about:hover{
    background-color: rgb(22, 22, 22);
}
h1 {
    text-shadow: 
        0 0 5px #4a4a4a, 
        0 0 10px #4a4a4a,
        0 0 15px #4a4a4a,
        0 0 20px #4a4a4a,
        0 0 25px #4a4a4a,
        0 0 30px #4a4a4a,
        0 0 35px #4a4a4a;
}

.navbar {
    width: 300px;
    height: 200vh;
}

.navbar nav {
    display: flex;
    flex-direction: column;
}

.navbar a {
    text-decoration: none;
    color: inherit;
}

.navbar a:hover {
    background-color: #4a4a4a;
}

.content {
    flex-grow: 1;
}
</style>
