<?php

/**
 * コマンド
 * php artisan make:migration 2024_06_11_000000_create_categories_table
 */

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id()->comment('id'); 
            $table->string('name', 255)->collation('utf8mb4_general_ci')->comment('カテゴリ名');
            $table->unsignedInteger('sort_number')->comment('表示順');
            $table->unsignedTinyInteger('is_display')->default(0)->comment('表示フラグ(0=非表示/1=表示)');
            $table->timestamp('created_at')->useCurrent()->comment('登録時間');
            $table->timestamp('updated_at')->useCurrent()->comment('更新時間');

            // Adding the primary key
            $table->primary('id');

            // Adding indexes
            $table->index(['sort_number', 'is_display', 'id'], 'idx_sort_number_is_display_id');
        });

        // Setting the table comment
        DB::statement("ALTER TABLE `categories` COMMENT 'カテゴリ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }

};
