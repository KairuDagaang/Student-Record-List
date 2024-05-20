<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .qrscn {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        #result {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center font-bold text-4xl mb-5">Scan QR Here:</h1>
        <div id='reader' class="qrscn"></div>
        <label for="result">ID Number:</label>
        <input type="text" name='result' id='result'>
    </div>
    <script src='https://unpkg.com/html5-qrcode' type='text/javascript'></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            console.log(`Code matched = ${decodedText}`, decodedResult);
            document.getElementById('result').value = decodedText;
            alert("ID Number: " + decodedText); 
        }
        function onScanFailure(error) {
            console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        {fps:10, qrbox: {width: 250, height:250}},
        false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
</body>
</html>
