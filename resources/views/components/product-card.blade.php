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
      
      <form action="{{ route('cart.add', $product['id']) }}" method="POST" class="add-to-cart-form">
          @csrf
          <button type="submit" class="px-4 py-2 bg-primary text-white rounded-xl">
              Agregar
          </button>
      </form>
    </div>
  </div>

  {{-- Script para añadir al carrito en tiempo real --}}
  <script>
  document.addEventListener("DOMContentLoaded", () => {
      const forms = document.querySelectorAll(".add-to-cart-form");
      const cartCount = document.getElementById("cart-count");

      forms.forEach(form => {
          form.addEventListener("submit", function(e) {
              e.preventDefault(); // no recargar página

              fetch(this.action, {
                  method: "POST",
                  body: new FormData(this),
                  headers: {
                      "X-Requested-With": "XMLHttpRequest",
                      "X-CSRF-TOKEN": this.querySelector('input[name="_token"]').value
                  }
              })
              .then(res => res.json())
              .then(data => {
                  if (data.success) {
                      // actualizar contador
                      cartCount.textContent = data.cart_count;

                      // mostrar alerta flotante
                      let alertBox = document.createElement("div");
                      alertBox.textContent = data.message;
                      alertBox.className = "fixed top-5 right-5 bg-green-600 text-white px-4 py-2 rounded shadow animate-bounce z-50";
                      document.body.appendChild(alertBox);

                      setTimeout(() => alertBox.remove(), 3000);
                  }
              })
              .catch(err => console.error(err));
          });
      });
  });
  </script>
</article>
