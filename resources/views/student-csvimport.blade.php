<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import CSV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .alert {
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-error {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        .csv-container {
            text-align: center;
            margin-top: 30px;
        }
        .upload-csv {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
        }
        .import-csv {
            margin-bottom: 20px;
        }
        .upload-csv label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }
        .upload-csv input[type="file"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }
        .upload-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .upload-button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .message {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @error('csv-file')
            <div class="alert alert-error">{{ $message }}</div>
        @enderror

        <p class="message">Please select a CSV file to import.</p>
        <div class="csv-container">
            <form action="/students/csv-import" method="POST" enctype="multipart/form-data" class="upload-csv">
                @csrf
                <div class="import-csv">
                    <label for="csv-file">Select CSV File:</label>
                    <input type="file" name="csv-file" id="csv-file" accept=".csv" required>
                </div>
                <button type="submit" class="upload-button">Upload</button>
            </form>
            <table id="csv-table" style="display: none;">
                <thead>
                    <tr>
                        <th>ID Number</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Subject</th>
                    </tr>
                </thead>
                <tbody id="csv-body"></tbody>
            </table>
        </div>
    </div>
    <script>
        document.getElementById('csv-file').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (!file) return;

            const extension = file.name.split('.').pop().toLowerCase();
            if (extension !== 'csv') {
                showError('Please select a CSV file.');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                const csvData = e.target.result;
                displayCSVData(csvData);
            };
            reader.readAsText(file);
        });

        function displayCSVData(csv) {
            const table = document.getElementById('csv-table');
            const body = document.getElementById('csv-body');
            body.innerHTML = '';

            csv.split('\n').forEach(line => {
                const row = document.createElement('tr');
                line.split(',').forEach(col => {
                    const cell = document.createElement('td');
                    cell.textContent = col;
                    row.appendChild(cell);
                });
                body.appendChild(row);
            });

            table.style.display = 'table';
        }

        function showError(message) {
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-error';
            alertDiv.textContent = message;
            document.body.insertBefore(alertDiv, document.querySelector('.csv-container'));
        }
    </script>
</body>
</html>