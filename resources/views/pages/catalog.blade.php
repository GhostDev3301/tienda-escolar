@extends('layouts.app')

@section('title', 'Lonchera Mágica — Catálogo')
@section('page_title', 'Catálogo de Productos')
@section('page_subtitle', 'Filtra por categoría o busca por nombre')

@section('content')
  {{-- Filtros por categorías y barra de búsqueda --}}
  <div class="flex flex-wrap items-center gap-3 mb-6">
    {{-- Chip de "Todos" --}}
    <a href="{{ route('catalog') }}">
      <x-category-chip :active="!$activeCategory">
        <span>Todos</span>
      </x-category-chip>
    </a>

    {{-- Chips de categorías --}}
    @foreach ($categories as $cat)
      <a href="{{ route('catalog', ['categoria' => $cat['slug']]) }}">
        <x-category-chip :active="$activeCategory === $cat['slug']">
          <span>{{ $cat['icon'] }}</span> <span>{{ $cat['name'] }}</span>
        </x-category-chip>
      </a>
    @endforeach

    {{-- Barra de búsqueda --}}
    <form action="{{ route('catalog') }}" method="get" class="ml-auto flex">
      @if($activeCategory)
        <input type="hidden" name="categoria" value="{{ $activeCategory }}">
      @endif
      <input 
        type="text" 
        name="q" 
        value="{{ $q }}" 
        placeholder="Buscar producto..." 
        class="rounded-l-xl border-gray-300 focus:border-primary focus:ring-primary px-3"
      />
      <button 
        class="px-4 py-2 rounded-r-xl bg-primary text-white hover:bg-primary/90 transition">
        Buscar
      </button>
    </form>
  </div>

  {{-- Grid de productos --}}
  <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse ($products as $product)
      <x-product-card :product="$product" />
    @empty
      <div class="col-span-full text-center text-gray-600">
        No encontramos productos con esos filtros.
      </div>
    @endforelse
  </div>
@endsection
