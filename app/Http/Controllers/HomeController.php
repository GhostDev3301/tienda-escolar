<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

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

    public function index()
    {
        $user = Auth::user();

        // Traer productos de la BD
        $products = Product::all();

        // Productos destacados (primeros 4)
        $featured = $products->take(4);

        if ($user && $user->role === 'admin') {
            return view('pages.home', [
                'categories' => $this->categories,
                'featured' => $featured,
            ]);
        } elseif ($user && $user->role === 'padre') {
            return view('pages.home', [
                'categories' => $this->categories,
                'featured' => $featured,
                'hijos' => $user->hijos // asegúrate de tener definida esta relación en el modelo User
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

        // Construir query filtrada
        $query = Product::query();

        if ($category) {
            $query->where('category', $category);
        }

        if ($q) {
            $query->where('name', 'like', "%$q%");
        }

        $products = $query->get();

        return view('pages.catalog', [
            'categories' => $this->categories,
            'products' => $products,
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

    public function dashboardPadre()
    {
        $user = Auth::user();

        // Verificamos que sea padre
        if ($user->role !== 'padre') {
            abort(403, 'No tienes permisos para acceder a esta sección');
        }

        /** @var \App\Models\User $padre */
        $padre = User::find(Auth::id());

        // Traer todos los hijos de este padre (según la relación definida en User)
        $hijos = $padre ? $padre->hijos()->with('consumos.producto')->get() : collect();

        // Armar estadísticas de consumo por hijo
        $consumosData = [];
        foreach ($hijos as $hijo) {
            $resumen = [];

            foreach ($hijo->consumos as $consumo) {
                $productoId = $consumo->product_id;
                if (!isset($resumen[$productoId])) {
                    $resumen[$productoId] = [
                        'producto' => $consumo->producto->name,
                        'cantidad' => 0,
                    ];
                }
                $resumen[$productoId]['cantidad'] += $consumo->cantidad;
            }

            $consumosData[$hijo->id] = [
                'hijo' => $hijo->name,
                'consumos' => $resumen,
            ];
        }

        return view('dashboard.padre', compact('consumosData'));
    }
}
