<?php
// con "php artisan make:model Book -mf" hice la migracion, el modelo y el factory
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
        Schema::create('books', function (Blueprint $table) {
        // Agrego estos campos a la tabla
        $table->id();
        $table->string('title');
        $table->string('author');
        $table->integer('year');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
// ejecute "php artisan migrate" para hacer la tabla