<?php
// Con php artisan make:model Movie -m creamos el modelo y la migración para la tabla movies
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
        Schema::create('movies', function (Blueprint $table) {
            // Agrego estos campos a la tabla movies para guardar la información de cada película
            $table->id();
            $table->string('title');
            $table->string('year', 8); //con longitud de 8 para poder guardar años con formato "YYYY-MM-DD"
            $table->string('director', 64);
            $table->string('poster');
            $table->boolean('rented')->default(false);
            $table->text('synopsis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Borro la tabla movies si quiero revertir la migración
        Schema::dropIfExists('movies');
    }
};

/* Con php artisan migrate ejecutamos la migración para crear la tabla movies 
    en la base de datos con los campos definidos en el método up()
    
    En la terminal de laragon, con mysql -u root -p;, use videoclub;, show tables; 
    y describe movies; podemos verificar que la tabla se ha creado correctamente 
    con los campos definidos.
    */