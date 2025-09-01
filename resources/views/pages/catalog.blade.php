@extends('layouts.app')

@section('title', 'Lonchera Mágica — Catálogo')
@section('page_title', 'Catálogo de Productos')
@section('page_subtitle', 'Filtra por categoría o busca por nombre')

@section('content')
  <div class="flex flex-wrap items-center gap-3">
    <a href="{{ route('catalog') }}">
      <x-category-chip :active="!$activeCategory">
        <span>Todos</span>
      </x-category-chip>
    </a>

    @foreach ($categories as $cat)
      <a href="{{ route('catalog', ['categoria' => $cat['slug']]) }}">
        <x-category-chip :active="$activeCategory === $cat['slug']">
          <span>{{ $cat['icon'] }}</span> <span>{{ $cat['name'] }}</span>
        </x-category-chip>
      </a>
    @endforeach

    <form action="{{ route('catalog') }}" method="get" class="ml-auto">
      @if($activeCategory)
        <input type="hidden" name="categoria" value="{{ $activeCategory }}">
      @endif
      <input name="q" value="{{ $q }}" placeholder="Buscar producto..." class="rounded-xl border-gray-300 focus:border-primary focus:ring-primary" />
      <button class="ml-2 px-4 py-2 rounded-xl bg-primary text-white">Buscar</button>
    </form>
  </div>

  <div class="mt-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse ($products as $product)
      <x-product-card :product="$product" />
    @empty
      <div class="col-span-full text-center text-gray-600">
        No encontramos productos con esos filtros.
      </div>
    @endforelse
  </div>
@endsection
