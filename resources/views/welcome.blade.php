<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, td {
          border: 1px solid black;  
          border-collapse: collapse;          
        }
        td{
            padding: 5px; 
        }
    </style>
</head>

<body>
    <h1>Islam Mohamed Project API</h1>
    {{-- Test --}}
    <input type="file" id="file-upload" name="file">
    <button id="send">Send</button>
    <script src="{{ asset('libCustomAjax_v1.js') }}"></script>
    <script src="{{ asset('js.js') }}"></script>
    {{-- / Test --}}



</body>

</html>
