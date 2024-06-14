<?php

/**
 * コマンド
 * php artisan make:migration 2024_06_11_000000_create_articles_table
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
        Schema::create('articles', function (Blueprint $table) {
            $table->id()->comment('id');
            $table->unsignedBigInteger('category_id')->nullable()->comment('カテゴリID');
            $table->string('title', 255)->collation('utf8mb4_general_ci')->comment('タイトル');
            $table->string('description',255)->collation('utf8mb4_general_ci')->nullable()->comment('概要');
            $table->text('content')->collation('utf8mb4_general_ci')->nullable()->comment('内容');
            $table->string('thumbnail_image', 255)->collation('utf8mb4_general_ci')->nullable()->comment('サムネイル');
            $table->string('image', 255)->collation('utf8mb4_general_ci')->nullable()->comment('画像');
            $table->unsignedTinyInteger('is_display')->default(0)->comment('表示フラグ(0=非表示/1=表示)');
            $table->unsignedBigInteger('sort_number')->comment('表示順');
            $table->timestamp('created_at')->useCurrent()->comment('登録時間');
            $table->timestamp('updated_at')->useCurrent()->comment('更新時間');

            // Adding the primary key
            $table->primary('id');

            // Adding indexes
            $table->index(['category_id', 'is_display', 'sort_number', 'id'], 'idx_category_is_display_sort_number_id');
            $table->index(['is_display', 'sort_number', 'id'], 'idx_is_display_sort_number_id');
        });

        // Setting the table comment
        DB::statement("ALTER TABLE `articles` COMMENT '記事'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
