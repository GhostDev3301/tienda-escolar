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
                'name' => 'Chocobarra Clásica',
                'price' => 3500,
                'category' => 'dulces',
                'image' => 'https://placehold.co/600x400?text=Chocobarra',
                'badge' => 'Nuevo',
            ],
            [
                'name' => 'Gomitas Frutales',
                'price' => 2000,
                'category' => 'confites',
                'image' => 'https://placehold.co/600x400?text=Gomitas',
                'badge' => 'Top ventas',
            ],
            [
                'name' => 'Papitas Onduladas',
                'price' => 2800,
                'category' => 'snacks',
                'image' => 'https://placehold.co/600x400?text=Papitas',
                'badge' => null,
            ],
            [
                'name' => 'Jugo Tropical 300ml',
                'price' => 2500,
                'category' => 'bebidas',
                'image' => 'https://placehold.co/600x400?text=Jugo+Tropical',
                'badge' => 'Fresco',
            ],
            [
                'name' => 'Galletas de Vainilla',
                'price' => 2200,
                'category' => 'snacks',
                'image' => 'https://placehold.co/600x400?text=Galletas',
                'badge' => null,
            ],
            [
                'name' => 'Caramelos de Leche',
                'price' => 1500,
                'category' => 'confites',
                'image' => 'https://placehold.co/600x400?text=Caramelos',
                'badge' => null,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
