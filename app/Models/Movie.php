<?php
// Con php artisan make:model Movie -m creamos el modelo y la migración para la tabla movies
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//#[Fillable(['name', 'email' ])] es mas moderno y va encima de la clase
class Movie extends Model
{
    
    //protected $fillable = ['name', 'email']; es la forma clasica y va dentro de la clase
    //Esto permite la asignacion masiva
    protected $fillable = ['title', 'year', 'director', 'poster', 'synopsis', 'rented'];
}
