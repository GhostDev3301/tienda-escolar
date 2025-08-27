@extends('layouts.app')

@section('title', 'Tienda Escolar — Contacto')
@section('page_title', 'Contacto')
@section('page_subtitle', '¿Consultas, pedidos o sugerencias? Escríbenos')

@section('content')
  <div class="grid md:grid-cols-2 gap-8">
    <form class="bg-white rounded-2xl border border-gray-100 p-6">
      <div class="grid md:grid-cols-2 gap-4">
        <div>
          <label class="text-sm">Nombre</label>
          <input class="mt-1 w-full rounded-xl border-gray-300 focus:border-primary focus:ring-primary" />
        </div>
        <div>
          <label class="text-sm">Correo</label>
          <input type="email" class="mt-1 w-full rounded-xl border-gray-300 focus:border-primary focus:ring-primary" />
        </div>
      </div>
      <div class="mt-4">
        <label class="text-sm">Mensaje</label>
        <textarea rows="5" class="mt-1 w-full rounded-xl border-gray-300 focus:border-primary focus:ring-primary"></textarea>
      </div>
      <button type="button" class="mt-4 px-5 py-2 rounded-xl bg-primary text-white">Enviar</button>
    </form>

    <div class="bg-white rounded-2xl border border-gray-100 p-6">
      <h3 class="font-semibold mb-2">Información</h3>
      <p class="text-gray-700">Correo: tienda@colegio.edu</p>
      <p class="text-gray-700">Teléfono: (###) ### ####</p>
      <p class="text-gray-700">Dirección: Calle 123 #45-67</p>
      <div class="mt-4">
        <img src="https://placehold.co/800x400?text=Mapa" class="rounded-xl border" alt="Mapa" />
      </div>
    </div>
  </div>
@endsection
