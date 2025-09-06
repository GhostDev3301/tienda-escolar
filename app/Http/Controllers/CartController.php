<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Consumo;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('pages.cart', compact('cart'));
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['cantidad']++;
        } else {
            $cart[$id] = [
                'name'     => $product->name,
                'price'    => $product->price,
                'imagen'   => $product->image ?? 'https://via.placeholder.com/150', // 👈 guarda imagen
                'cantidad' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito.');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito.');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (!$cart || empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'El carrito está vacío.');
        }

        $user = Auth::user();

        // Solo los hijos registran consumos
        if ($user->role === 'hijo') {
            foreach ($cart as $id => $item) {
                Consumo::create([
                    'user_id'    => $user->id,
                    'product_id' => $id,
                    'cantidad'   => $item['cantidad'], // 👈 corregido (antes estaba quantity)
                ]);
            }
        }

        // Vaciar carrito después de comprar
        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Compra realizada con éxito.');
    }
}
