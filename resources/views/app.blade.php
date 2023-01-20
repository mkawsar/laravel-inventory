<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    @routes
    @inertiaHead
</head>

<body>
@inertia
<script src="{{ asset(mix('js/app.js')) }}" defer></script>
</body>
</html>
