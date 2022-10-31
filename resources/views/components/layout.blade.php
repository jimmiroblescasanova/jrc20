<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="main-h-screen">
        <header>
            @include('partials.navbar')
        </header>

        <main>
            {{ $slot }}
        </main>
    </div>
</body>

<script>
  const menu = document.getElementById('navbar-search');
  const toggle = () => menu.classList.toggle("hidden");
</script>
</html>
