@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Dashboard de Consumos</h1>
    <p class="mb-6">Bienvenido {{ $padre->name }}. Aquí puedes ver lo que consumen tus hijos:</p>

    @forelse ($hijos as $hijo)
        <div class="mb-6 p-4 border rounded-lg bg-gray-50">
            <h2 class="text-xl font-semibold mb-2">{{ $hijo->name }}</h2>
            <ul class="list-disc pl-6">
                @forelse ($hijo->consumos as $consumo)
                    <li>
                        {{ $consumo->producto->name ?? 'Producto eliminado' }} 
                        - {{ $consumo->created_at->format('d/m/Y') }}
                    </li>
                @empty
                    <li>No tiene consumos registrados.</li>
                @endforelse
            </ul>
        </div>
    @empty
        <p>No tienes hijos registrados en el sistema.</p>
    @endforelse
</div>
@endsection
