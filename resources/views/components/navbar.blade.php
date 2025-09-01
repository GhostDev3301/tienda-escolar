<nav class="bg-white/90 backdrop-blur supports-[backdrop-filter]:bg-white/60 border-b border-gray-200" x-data="{open:false}">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex items-center justify-between h-16">
      <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-primary">
        <span class="text-2xl">🥪</span>
        <span>Lonchera Mágica</span>
      </a>

      <div class="hidden md:flex items-center gap-6">
        <a href="{{ route('home') }}" class="hover:text-primary">Inicio</a>
        <a href="{{ route('catalog') }}" class="hover:text-primary">Catálogo</a>
        <a href="{{ route('menu') }}" class="hover:text-primary">Menú de la Semana</a>
        <a href="{{ route('about') }}" class="hover:text-primary">Nosotros</a>
        <a href="{{ route('contact') }}" class="hover:text-primary">Contacto</a>

      </div>


        <!-- Carrito (visible siempre) -->
      <div class="flex items-center">
        <a href="{{ route('cart.index') }}" class="relative">
          Carrito 🛒
          <span id="cart-count" class="absolute -top-2 -right-3 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">
            {{ session('cart') ? count(session('cart')) : 0 }}
          </span>
        </a>
      </div>

      <div class="flex items-center gap-3">
        <form action="{{ route('catalog') }}" method="get" class="hidden md:block">
          <input name="q" type="search" placeholder="Buscar..." class="rounded-xl border-gray-300 focus:border-primary focus:ring-primary" />
        </form>
        <button class="md:hidden p-2" @click="open = !open" aria-label="Abrir menú">
          ☰
        </button>
      </div>
    </div>
  </div>

  <!-- Menú móvil -->
  <div class="md:hidden" x-show="open" x-transition>
    <div class="px-4 pb-4 flex flex-col gap-2">
      <a href="{{ route('home') }}" class="py-2">Inicio</a>
      <a href="{{ route('catalog') }}" class="py-2">Catálogo</a>
      <a href="{{ route('menu') }}" class="py-2">Menú de la Semana</a>
      <a href="{{ route('about') }}" class="py-2">Nosotros</a>
      <a href="{{ route('contact') }}" class="py-2">Contacto</a>
      <form action="{{ route('catalog') }}" method="get" class="pt-2">
        <input name="q" type="search" placeholder="Buscar..." class="w-full rounded-xl border-gray-300 focus:border-primary focus:ring-primary" />
      </form>
    </div>
  </div>
</nav>
