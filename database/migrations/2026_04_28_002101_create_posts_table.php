<!-- 🐵 Clase 9 Act 1 -->
<!-- Se hace la migracion con php artisan make:migration create_posts_table -->
<?php

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
        Schema::create('posts', function (Blueprint $table) {
            // Defino los datos de la tabla posts
            $table->id(); // Autoincremental
            $table->string('title', 200); // String con máximo 200 caracteres
            $table->text('body'); // Texto largo (long text)
            $table->timestamp('published_at')->nullable(); // Timestamp que puede ser nulo
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
// Se ejecuta la migracion con php artisan migrate
// Se verifica en terminal Laragon con show tables; y describe posts;
// O con php artisan tinker con Schema::getColumnListing('posts'); para ver las columnas de la tabla posts.
// Con php artisan migrate:rollback se deshace la última migración ejecutada, es decir, se borra la tabla posts.
// Con php artisan migrate:refresh se deshacen todas las migraciones y se vuelven a ejecutar.