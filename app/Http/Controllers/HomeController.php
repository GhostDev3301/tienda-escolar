<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private array $categories = [
        [
            'slug' => 'confites',
            'name' => 'Confites',
            'desc' => 'Chicles, caramelos y gomitas irresistibles.',
            'icon' => '🍬',
        ],
        [
            'slug' => 'dulces',
            'name' => 'Dulces',
            'desc' => 'Chocolates, panelitas y más.',
            'icon' => '🍫',
        ],
        [
            'slug' => 'snacks',
            'name' => 'Snacks',
            'desc' => 'Papitas, galletas, paquetes y pasabocas.',
            'icon' => '🥨',
        ],
        [
            'slug' => 'bebidas',
            'name' => 'Bebidas',
            'desc' => 'Jugos, malteadas y refrescos.',
            'icon' => '🥤',
        ],
    ];

    private array $products = [
        [
            'id' => 1,
            'name' => 'Chocobarra Clásica',
            'price' => 3500,
            'category' => 'dulces',
            'image' => 'https://placehold.co/600x400?text=Chocobarra',
            'badge' => 'Nuevo',
        ],
        [
            'id' => 2,
            'name' => 'Gomitas Frutales',
            'price' => 2000,
            'category' => 'confites',
            'image' => 'https://placehold.co/600x400?text=Gomitas',
            'badge' => 'Top ventas',
        ],
        [
            'id' => 3,
            'name' => 'Papitas Onduladas',
            'price' => 2800,
            'category' => 'snacks',
            'image' => 'https://placehold.co/600x400?text=Papitas',
            'badge' => null,
        ],
        [
            'id' => 4,
            'name' => 'Jugo Tropical 300ml',
            'price' => 2500,
            'category' => 'bebidas',
            'image' => 'https://placehold.co/600x400?text=Jugo+Tropical',
            'badge' => 'Fresco',
        ],
        [
            'id' => 5,
            'name' => 'Galletas de Vainilla',
            'price' => 2200,
            'category' => 'snacks',
            'image' => 'https://placehold.co/600x400?text=Galletas',
            'badge' => null,
        ],
        [
            'id' => 6,
            'name' => 'Caramelos de Leche',
            'price' => 1500,
            'category' => 'confites',
            'image' => 'https://placehold.co/600x400?text=Caramelos',
            'badge' => null,
        ],
    ];

    public function index()
    {
        $user = Auth::user();

        // Productos destacados (primeros 4)
        $featured = array_slice($this->products, 0, 4);

        if ($user && $user->role === 'admin') {
            return view('pages.home', [
                'categories' => $this->categories,
                'featured' => $featured,
            ]);
        } elseif ($user && $user->role === 'padre') {
            return view('pages.home', [
                'categories' => $this->categories,
                'featured' => $featured,
                'hijos' => $user->hijos
            ]);
        } else {
            return view('pages.home', [
                'categories' => $this->categories,
                'featured' => $featured,
            ]);
        }
    }

    public function catalog(Request $request)
    {
        $category = $request->get('categoria');
        $q = $request->get('q');

        $filtered = array_filter($this->products, function ($p) use ($category, $q) {
            $ok = true;
            if ($category) {
                $ok = $ok && $p['category'] === $category;
            }
            if ($q) {
                $ok = $ok && str_contains(mb_strtolower($p['name']), mb_strtolower($q));
            }
            return $ok;
        });

        return view('pages.catalog', [
            'categories' => $this->categories,
            'products' => $filtered,
            'activeCategory' => $category,
            'q' => $q,
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}