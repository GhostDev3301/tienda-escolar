@props(['product'])

<article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
  <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-44 object-cover" />
  <div class="p-4">
    <div class="flex items-start justify-between gap-3">
      <h3 class="font-semibold leading-tight">{{ $product['name'] }}</h3>
      @if(!empty($product['badge']))
        <span class="text-xs bg-amber-100 text-amber-700 px-2 py-1 rounded-full">{{ $product['badge'] }}</span>
      @endif
    </div>
    <div class="mt-2 flex items-center justify-between">
      <span class="text-lg font-bold text-primary">$ {{ number_format($product['price'], 0, ',', '.') }}</span>
      
    <button 
      onclick="addToCart({{ $product['id'] }}, '{{ $product['name'] }}', {{ $product['price'] }}, '{{ $product['image'] }}')"
      class="text-sm px-3 py-1.5 rounded-lg bg-primary text-white hover:bg-green-700">
      Agregar
    </button>

    </div>
  </div>
  <script>
  function addToCart(id, name, price, image) {
    fetch(`/cart/add/${id}`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify({ name, price, image })
    })
    .then(res => res.json())
    .then(data => {
      document.getElementById("cart-count").innerText = data.count;
    });
  }
  </script>
</article>
