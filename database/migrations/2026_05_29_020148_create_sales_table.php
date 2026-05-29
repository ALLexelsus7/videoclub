<?php
// con "php artisan make:model Sale -mf" para el modelo, migracion y factory
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Agrego los sig. campos
        Schema::create('sales', function (Blueprint $table) {
        $table->id();
        $table->string('product');
        $table->integer('quantity');
        $table->decimal('price', 8, 2); // 8 dígitos en total, 2 decimales (ej: 999999.99)
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
// ejecuto "php artisan migrate"