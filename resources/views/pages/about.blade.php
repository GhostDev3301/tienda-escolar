@extends('layouts.app')

@section('title', 'Tienda Escolar — Nosotros')
@section('page_title', 'Sobre la Tienda Escolar')
@section('page_subtitle', 'Comprometidos con la frescura y el buen servicio')

@section('content')
  <div class="grid md:grid-cols-2 gap-8">
    <div>
      <h3 class="text-xl font-semibold mb-3">Nuestra historia</h3>
      <p class="text-gray-700 leading-relaxed">
        Nacimos con la idea de ofrecer snacks ricos y asequibles para los estudiantes.
        Priorizamos la calidad, la higiene y la atención amable.
      </p>

      <h3 class="text-xl font-semibold mt-6 mb-3">Valores</h3>
      <ul class="list-disc pl-5 text-gray-700 space-y-1">
        <li>Productos frescos</li>
        <li>Precios justos</li>
        <li>Servicio rápido y cordial</li>
      </ul>
    </div>

    <img src="https://placehold.co/800x600?text=Tienda+Escolar" alt="Tienda" class="rounded-2xl border" />
  </div>
@endsection
