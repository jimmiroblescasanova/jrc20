<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <section id="main">
        @include('partials.navbar')

        <div id="container">
            {{ $slot }}
        </div>
    </section>
</body>

<script>
  const menu = document.getElementById('navbar-search');
  const toggle = () => menu.classList.toggle("hidden");
</script>
</html>
