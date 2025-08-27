@extends('layouts.app')

@section('page_title', 'Carrito de Compras')
@section('page_subtitle', 'Revisa tus productos seleccionados')

@section('content')
<div class="space-y-6">

    @if(session('success'))
        <div class="p-4 rounded bg-green-100 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if(empty($cart))
        <div class="text-center py-10">
            <p class="text-gray-600">Tu carrito está vacío 🛒</p>
            <a href="{{ route('catalog') }}" class="mt-4 inline-block px-4 py-2 bg-primary text-white rounded-xl">Ir al catálogo</a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-xl shadow-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left">Producto</th>
                        <th class="px-4 py-3">Precio</th>
                        <th class="px-4 py-3">Cantidad</th>
                        <th class="px-4 py-3">Total</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalGeneral = 0; @endphp
                    @foreach($cart as $item)
                        @php $subtotal = $item['price'] * $item['quantity']; @endphp
                        @php $totalGeneral += $subtotal; @endphp
                        <tr class="border-b">
                            <td class="px-4 py-3 flex items-center gap-3">
                                <img src="{{ $item['image'] }}" class="w-16 h-16 rounded-lg object-cover" alt="">
                                <span>{{ $item['name'] }}</span>
                            </td>
                            <td class="px-4 py-3">${{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td class="px-4 py-3">{{ $item['quantity'] }}</td>
                            <td class="px-4 py-3 font-semibold">${{ number_format($subtotal, 0, ',', '.') }}</td>
                            <td class="px-4 py-3">
                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                    @csrf
                                    <button class="text-red-500 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="bg-gray-100 font-bold">
                        <td colspan="3" class="px-4 py-3 text-right">Total General:</td>
                        <td colspan="2" class="px-4 py-3">${{ number_format($totalGeneral, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif

</div>
@endsection
