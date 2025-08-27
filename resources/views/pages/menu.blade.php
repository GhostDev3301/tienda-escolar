@extends('layouts.app')

@section('title', 'Tienda Escolar — Menú de la Semana')
@section('page_title', 'Menú de la Semana')
@section('page_subtitle', 'Opciones ricas y económicas para cada día')

@section('content')
  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($menu as $day => $items)
      <section class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="bg-primary/10 px-5 py-3 font-semibold">{{ $day }}</div>
        <div class="p-5 flex flex-col gap-4">
          @foreach ($items as $item)
            <article class="flex gap-4">
              <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-24 h-24 object-cover rounded-xl border" />
              <div class="flex-1">
                <h4 class="font-semibold">{{ $item['name'] }}</h4>
                <div class="text-primary font-bold">$ {{ number_format($item['price'], 0, ',', '.') }}</div>
              </div>
            </article>
          @endforeach
        </div>
      </section>
    @endforeach
  </div>

  <div class="mt-10 bg-amber-50 border border-amber-200 rounded-2xl p-6">
    <p class="text-sm text-amber-800">* El menú puede variar según disponibilidad. Pregunta por opciones vegetarianas.</p>
  </div>
@endsection
