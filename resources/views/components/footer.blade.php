<footer class="border-t border-gray-200 bg-white">
  <div class="max-w-7xl mx-auto px-4 py-8 grid md:grid-cols-3 gap-8">
    <div>
      <div class="flex items-center gap-2 font-bold text-primary">
        <span class="text-2xl">🥪</span>
        <span>Lonchera Mágica</span>
      </div>
      <p class="text-sm text-gray-600 mt-2">Endulzando recreos desde 2025.</p>
    </div>
    <div>
      <h4 class="font-semibold mb-2">Enlaces</h4>
      <ul class="space-y-1 text-sm">
        <li><a href="{{ route('catalog') }}" class="hover:text-primary">Catálogo</a></li>
        <li><a href="{{ route('menu') }}" class="hover:text-primary">Menú de la Semana</a></li>
        <li><a href="{{ route('about') }}" class="hover:text-primary">Nosotros</a></li>
        <li><a href="{{ route('contact') }}" class="hover:text-primary">Contacto</a></li>
      </ul>
    </div>
    <div>
      <h4 class="font-semibold mb-2">Horario</h4>
      <p class="text-sm text-gray-600">Lunes a Viernes: 7:00am – 4:00pm</p>
      <p class="text-sm text-gray-600">Sábados: 8:00am – 12:00pm</p>
    </div>
  </div>
  <div class="text-center text-xs text-gray-500 py-4">© {{ date('Y') }} Lonchera Mágica. Todos los derechos reservados.</div>
</footer>
