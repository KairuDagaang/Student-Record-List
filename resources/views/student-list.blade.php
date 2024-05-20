<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student List</title>
    <style>
        *{
            font-family: 'Courier New', Courier, monospace;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Student List</h1>
    <br>
    <table>
        <thead>
            <tr>
                <th>QrCode</th>
                <th>ID Number</th>
                <th>Student Name</th>
                <th>Course</th>
                <th>Year</th>
                <th>Subject</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $stud)
            <tr>
                <td><img src="data:image/png;base64,{{ base64_encode($stud->qrCode) }}" alt="QR Code"></td>
                <td>{{ $stud->id_number}}</td>
                <td>{{ $stud->name }}</td>
                <td>{{ $stud->course }}</td>
                <td>{{ $stud->year }}</td>
                <td>{{ $stud->subject }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
