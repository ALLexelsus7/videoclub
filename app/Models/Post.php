<?php
// 🐵 Clase 9 Act 2
// Creo el modelo con php artisan make:model Post
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Proteccion contra asignacion masiva (para evitar que se puedan llenar campos no deseados)
    protected $fillable = ['title', 'body', 'published_at', 'category_id'];    
    // 🐵 Clase 10 Act 1 Definir las relaciones con Eloquent (sin joins SQL)
    // "Un post pertenece a una categoría"
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}