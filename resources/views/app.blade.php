<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.unpkg.com/tailwindcss@2.0.0/dist/tailwind.min.css">
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <script src="{{ asset(mix('js/app.js')) }}" defer></script>
    @inertiaHead
</head>

<body>
@inertia
</body>

</html>
