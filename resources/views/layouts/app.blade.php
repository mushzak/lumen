<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="">
    <title>{{ config('app.name', 'Lumen') }}</title>
    <!-- Styles -->
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
        @yield('content')
</body>
</html>
