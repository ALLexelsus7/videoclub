<!-- 🐵 Clase 10 Act 1 -->
<!-- php artisan make:migration add_category_id_to_posts_table --table=posts -->
<!-- Agrego esta migracion con una modificacion para no borrar los datos existentes -->
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
        Schema::table('posts', function (Blueprint $table) {
            // Agrego la columna y su relacion con categories
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};

// Ejecuto php artisan migrate