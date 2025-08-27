@extends('layouts.app')

@section('title', 'Tienda Escolar — Inicio')
@section('page_title', '¡Bienvenido a la Tienda Escolar!')
@section('page_subtitle', 'Snacks, bebidas y antojos para alegrar tus recreos')

@section('header_actions')
  <div class="mt-6 flex flex-wrap gap-3">
    <a href="{{ route('catalog') }}" class="px-5 py-2 rounded-xl bg-white text-primary font-medium hover:bg-gray-100">Ver Catálogo</a>
    <a href="{{ route('menu') }}" class="px-5 py-2 rounded-xl border border-white/60 text-white hover:bg-white/10">Menú de la Semana</a>
  </div>
@endsection

@section('content')
  <section>
    <x-section-title title="Categorías" subtitle="Explora por tipo de producto" />
    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-4">
      @foreach ($categories as $cat)
        <a href="{{ route('catalog', ['categoria' => $cat['slug']]) }}" class="group bg-white rounded-2xl border border-gray-100 p-5 hover:shadow-md transition">
          <div class="text-3xl">{{ $cat['icon'] }}</div>
          <h3 class="mt-2 font-semibold group-hover:text-primary">{{ $cat['name'] }}</h3>
          <p class="text-sm text-gray-600">{{ $cat['desc'] }}</p>
        </a>
      @endforeach
    </div>
  </section>

  <section class="mt-12">
    <x-section-title title="Productos destacados" subtitle="Los favoritos del recreo" />
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @foreach ($featured as $product)
        <x-product-card :product="$product" />
      @endforeach
    </div>
  </section>

  <section class="mt-12">
    <div class="bg-gradient-to-r from-amber-100 to-amber-50 rounded-2xl p-6 md:p-8 flex flex-col md:flex-row items-center justify-between gap-6">
      <div>
        <h3 class="text-xl font-bold">¿Ya viste el Menú de la Semana?</h3>
        <p class="text-gray-700">Descubre las opciones frescas de cada día.</p>
      </div>
      <a href="{{ route('menu') }}" class="px-5 py-2 rounded-xl bg-amber-500 text-white hover:bg-amber-600">Ver Menú</a>
    </div>
  </section>
@endsection
