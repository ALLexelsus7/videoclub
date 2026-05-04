<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    // 🐵 Clase 10 Act 1 Definir las relaciones con Eloquent (sin joins SQL)
    // "Una categoría tiene muchos posts"
    public function posts()
    {
        return $this->hasMany(Post::class);
    }   
}
