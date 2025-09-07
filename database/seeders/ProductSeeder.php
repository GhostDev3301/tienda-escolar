<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Bon Bon Bum',
                'price' => 500,
                'category' => 'dulces',
                'image' => 'https://amartesuite.store/cdn/shop/products/Bombombum.jpg?v=1621517304',
                'badge' => 'Clásico',
            ],
            [
                'name' => 'chocolatina Jet',
                'price' => 1200,
                'category' => 'dulces',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVC8iapv4JdggGI4tvoJueWhAlSRliQlnBDQ&s',
                'badge' => 'Top ventas',
            ],
            [
                'name' => 'Papas Margarita Natural',
                'price' => 2500,
                'category' => 'snacks',
                'image' => 'https://colanta.vtexassets.com/arquivos/ids/158855-800-450?v=638618329334370000&width=800&height=450&aspect=true',
                'badge' => null,
            ],
            [
                'name' => 'Postobón Manzana 400ml',
                'price' => 3000,
                'category' => 'bebidas',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtFL4hztKMTZhJrX0joq5t6pB-W-jUd_mx2w&s',
                'badge' => 'Refrescante',
            ],
            [
                'name' => 'Galletas Festival Fresa',
                'price' => 1800,
                'category' => 'snacks',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvGwG4Xk6zTfX9MeI4qQ2PiNYnES02iT0Kbw&s',
                'badge' => null,
            ],
            [
                'name' => 'Chocoramo',
                'price' => 2500,
                'category' => 'snacks',
                'image' => 'https://olimpica.vtexassets.com/arquivos/ids/946532/7702914596787.png?v=638042216463930000',
                'badge' => 'Favorito',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
