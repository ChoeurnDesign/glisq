<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title inertia>{{ config('app.name', 'GLISQ') }}</title>

    <!-- SEO / Meta -->
    <meta name="description"
        content="GLISQ – Soft Like Silk, Strong Like You. Premium skincare infused with natural silkworm sericin for radiant, youthful skin.">
    <meta name="keywords" content="GLISQ, skincare, serum, silkworm, sericin, Cambodia, beauty, organic, glow">
    <meta name="author" content="GLISQ">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @routes
    @vite(['resources/css/app.css','resources/js/app.js'])
    @inertiaHead

</head>

<body class="font-sans antialiased bg-[#fdfcf8] text-gray-800">
    @inertia
</body>

</html>