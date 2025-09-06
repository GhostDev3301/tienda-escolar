<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Master',
            'email' => 'admin@tienda.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Padre
        $padre = User::create([
            'name' => 'Carlos Padre',
            'email' => 'padre@tienda.com',
            'password' => Hash::make('padre123'),
            'role' => 'padre',
        ]);

        // Hijo asociado al padre
        User::create([
            'name' => 'Juan Hijo',
            'email' => 'hijo@tienda.com',
            'password' => Hash::make('hijo123'),
            'role' => 'hijo',
            'parent_id' => $padre->id,
        ]);
    }
}
