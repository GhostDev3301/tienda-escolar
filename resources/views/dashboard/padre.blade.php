@extends('layouts.app')

@section('page_title', 'Dashboard Padre')
@section('page_subtitle', 'Revisión de consumos de tus hijos')

@section('content')
<div class="space-y-8">

    @foreach($consumosData as $data)
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-xl font-bold mb-4">
                👦 {{ $data['hijo'] }}
            </h2>

            @if(empty($data['consumos']))
                <p class="text-gray-600">Este hijo no ha consumido productos todavía.</p>
            @else
                <table class="min-w-full bg-white border rounded-xl">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left">Producto</th>
                            <th class="px-4 py-2">Cantidad</th>
                            <th class="px-4 py-2">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['consumos'] as $consumo)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $consumo['producto'] }}</td>
                                <td class="px-4 py-2 text-center">{{ $consumo['cantidad'] }}</td>
                                <td class="px-4 py-2 text-center">
                                    @if($consumo['cantidad'] > 5)
                                        <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">
                                            ⚠️ Exceso de consumo
                                        </span>
                                    @else
                                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">
                                            ✅ Dentro del límite
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @endforeach

</div>
@endsection
