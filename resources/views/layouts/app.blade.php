<!DOCTYPE html>
<html class="h-full bg-gray-50" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="h-full">
{{ $slot }}

@livewireScripts
</body>
</html>
