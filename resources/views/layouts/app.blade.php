<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Tienda Escolar')</title>
  <!-- Tailwind CSS CDN para prototipo -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#16a34a', // verde escolar
            accent: '#f59e0b',
          }
        }
      }
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', system-ui, -apple-system, Segoe UI, Roboto, sans-serif; }
  </style>
  <!-- AlpineJS para interacciones simples -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 text-gray-800">
  <x-navbar />

  <!-- Hero / Page header -->
  <header class="bg-gradient-to-br from-primary to-green-700 text-white">
    <div class="max-w-7xl mx-auto px-4 py-12">
      <h1 class="text-3xl md:text-4xl font-bold">@yield('page_title', 'La Tienda Escolar')</h1>
      <p class="mt-2 opacity-90">@yield('page_subtitle', 'Snacks, bebidas y antojos para alegrar tus recreos')</p>
      @yield('header_actions')
    </div>
  </header>

  <main class="max-w-7xl mx-auto px-4 py-10">
    @yield('content')
  </main>

  <x-footer />
  <script>
  function addToCart(id, name, price, image) {
    fetch(`/cart/add/${id}`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify({ name, price, image })
    })
    .then(res => res.json())
    .then(data => {
      document.getElementById("cart-count").innerText = data.count;
    })
    .catch(err => console.error("Error agregando al carrito:", err));
  }
  </script>
</body>
</html>