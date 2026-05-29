<?php
// con "php artisan make:model Book -mf" hice la migracion, el modelo y el factory
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Tambien se puede agregar el fillable aca, agregando el use correspondiente
class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    // Agrego esta proteccion contra asignacion masiva (para evitar que se puedan llenar campos no deseados)
    protected $fillable = ['title', 'author', 'year'];
}
