<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ url('css/styles1.css') }}">
    <title>{{ $title }}</title>
</head>
<body class="bg">
    @include("components.alerts")
    @yield("content")
</body>
</html>