<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    private array $products;

    public function __construct()
    {
        // Copiamos los productos desde HomeController para este demo
        $this->products = [
            1 => [
                'id' => 1, 'name' => 'Chocobarra Clásica', 'price' => 3500,
                'category' => 'dulces', 'image' => 'https://placehold.co/600x400?text=Chocobarra', 'badge' => 'Nuevo'
            ],
            2 => [
                'id' => 2, 'name' => 'Gomitas Frutales', 'price' => 2000,
                'category' => 'confites', 'image' => 'https://placehold.co/600x400?text=Gomitas', 'badge' => 'Top ventas'
            ],
            3 => [
                'id' => 3, 'name' => 'Papitas Onduladas', 'price' => 2800,
                'category' => 'snacks', 'image' => 'https://placehold.co/600x400?text=Papitas', 'badge' => null
            ],
            4 => [
                'id' => 4, 'name' => 'Jugo Tropical 300ml', 'price' => 2500,
                'category' => 'bebidas', 'image' => 'https://placehold.co/600x400?text=Jugo+Tropical', 'badge' => 'Fresco'
            ],
            5 => [
                'id' => 5, 'name' => 'Galletas de Vainilla', 'price' => 2200,
                'category' => 'snacks', 'image' => 'https://placehold.co/600x400?text=Galletas', 'badge' => null
            ],
            6 => [
                'id' => 6, 'name' => 'Caramelos de Leche', 'price' => 1500,
                'category' => 'confites', 'image' => 'https://placehold.co/600x400?text=Caramelos', 'badge' => null
            ],
        ];
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('pages.cart', compact('cart'));
    }

// CartController.php
public function add(Request $request, $id)
{
    $product = [
        'id' => $id,
        'name' => $request->input('name'),
        'price' => $request->input('price'),
        'image' => $request->input('image'),
        'quantity' => 1,
    ];

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = $product;
    }

    session()->put('cart', $cart);

    return response()->json([
        'count' => count($cart),
        'cart' => $cart
    ]);
}



    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito.');
    }
}
