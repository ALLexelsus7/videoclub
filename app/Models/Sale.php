<?php
// con "php artisan make:model Sale -mf" para el modelo, migracion y factory

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /** @use HasFactory<\Database\Factories\SaleFactory> */
    use HasFactory;

    // Agrego esto
    protected $fillable = ['product', 'quantity', 'price'];
}
