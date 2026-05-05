<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Importo el modelo User para poder usarlo en el seeder
use Illuminate\Support\Facades\DB; // Importo DB para poder usarlo en el seeder
use Illuminate\Support\Facades\Hash; // Importo Hash para poder usarlo en el seeder

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        DB::table('users')->delete(); // Borramos usuarios actuales

        User::create([
            'name' => 'Usuario Prueba',
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'), // Encriptado en lugar de bcrypt para evitar problemas de compatibilidad con versiones de Laravel
        ]);
        
        User::create([
            'name' => 'Admin Videoclub',
            'email' => 'admin@videoclub.com',
            'password' => Hash::make('admin'),
        ]);
    }
    
}
//Ejecuto solamente este seeder con php artisan db:seed --class=UsersTableSeeder
// o podria ponerlo en el DatabaseSeeder para que se ejecute junto con el resto de seeders