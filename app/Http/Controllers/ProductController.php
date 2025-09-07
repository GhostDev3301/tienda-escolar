<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Mismo array de categorías que tenías en HomeController
    private array $categories = [
        ['slug' => 'confites', 'name' => 'Confites', 'desc' => 'Chicles, caramelos y gomitas irresistibles.', 'icon' => '🍬'],
        ['slug' => 'dulces',   'name' => 'Dulces',   'desc' => 'Chocolates, panelitas y más.',               'icon' => '🍫'],
        ['slug' => 'snacks',   'name' => 'Snacks',   'desc' => 'Papitas, galletas, paquetes y pasabocas.',  'icon' => '🥨'],
        ['slug' => 'bebidas',  'name' => 'Bebidas',  'desc' => 'Jugos, malteadas y refrescos.',             'icon' => '🥤'],
    ];

    public function index(Request $request)
    {
        $category = $request->get('categoria'); // slug de categoría
        $q = $request->get('q');

        $query = Product::query();

        if ($category) {
            $query->where('category', $category);
        }

        if ($q) {
            $query->where('name', 'like', "%{$q}%");
        }

        $products = $query->get();

        return view('pages.catalog', [
            'categories'     => $this->categories,
            'products'       => $products,
            'activeCategory' => $category,   // <- importante
            'q'              => $q,
        ]);
    }
}
