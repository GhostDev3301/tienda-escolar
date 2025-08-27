<?php

namespace App\Http\Controllers;

class MenuController extends Controller
{
    public function index()
    {
        // Menú semanal típico de tienda escolar (datos de ejemplo)
        $menu = [
            'Lunes' => [
                ['name' => 'Sandwich de Jamón y Queso', 'price' => 5000, 'image' => 'https://placehold.co/600x400?text=Sandwich'],
                ['name' => 'Jugo de Mora 300ml', 'price' => 2500, 'image' => 'https://placehold.co/600x400?text=Jugo+Mora'],
            ],
            'Martes' => [
                ['name' => 'Arepa con Queso', 'price' => 4000, 'image' => 'https://placehold.co/600x400?text=Arepa+Queso'],
                ['name' => 'Limonada Natural', 'price' => 2000, 'image' => 'https://placehold.co/600x400?text=Limonada'],
            ],
            'Miércoles' => [
                ['name' => 'Perro Caliente', 'price' => 6000, 'image' => 'https://placehold.co/600x400?text=Perro+Caliente'],
                ['name' => 'Gaseosa 250ml', 'price' => 2500, 'image' => 'https://placehold.co/600x400?text=Gaseosa'],
            ],
            'Jueves' => [
                ['name' => 'Empanadas (3 unidades)', 'price' => 4500, 'image' => 'https://placehold.co/600x400?text=Empanadas'],
                ['name' => 'Jugo de Mango', 'price' => 2500, 'image' => 'https://placehold.co/600x400?text=Jugo+Mango'],
            ],
            'Viernes' => [
                ['name' => 'Hamburguesa Escolar', 'price' => 7000, 'image' => 'https://placehold.co/600x400?text=Hamburguesa'],
                ['name' => 'Malteada de Vainilla', 'price' => 4000, 'image' => 'https://placehold.co/600x400?text=Malteada'],
            ],
        ];

        return view('pages.menu', [
            'menu' => $menu,
        ]);
    }
}