<script setup>
import Homelayout from '@/Layouts/Homelayout.vue';

defineOptions({
    layout: Homelayout
})

const props = defineProps({
    students: Array
})

</script>

<template>
    <main id="page-trans">
        <div class="container">
            <div class="button-group">
                <a href="/pages/csv-all" target="_blank" class="csv-downloader btn btn-primary">Download CSV</a>
                <a href="students/pdf" class="export-pdf btn btn-secondary">Export PDF</a>
            </div>
            <h1 class="text-2xl font-bold mb-2">Students</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Number</th>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Subject</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(student, index) in students" :key="index">
                        <td>{{ student.id_number }}</td>
                        <td>{{ student.name }}</td>
                        <td>{{ student.course }}</td>
                        <td>{{ student.year }}</td>
                        <td>{{ student.subject }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</template>

<style scoped>
.container {
    margin-top: 15px;
    margin-left: 15px;
}

.button-group {
    margin-bottom: 15px;
}

.csv-downloader, .open-csv {
    display: inline-block;
    margin-right: 10px;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    text-decoration: none;
    color: #fff;
    background-color: #4c74af;
    transition: background-color 0.3s;
}

.csv-downloader:hover, .open-csv:hover {
    background-color: #364b79;
}

.export-pdf {
    padding: 8px 16px;
    border-radius: 4px;
    color: #fff;
    background-color: #4CAF50;
    margin-left: 700px;
    transition: background-color 0.3s;
}
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.table th {
    background-color: #f2f2f2;
    color: #333;
}

.table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table tr:hover {
    background-color: #ddd;
}
</style>
