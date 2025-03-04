<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('title_news')->nullable();
            $table->integer('category_news')->nullable();
            $table->string('title_bottom')->nullable();
            $table->integer('category_bottom')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            // Xóa các cột vừa thêm
            $table->dropColumn(['title_news', 'category_news', 'title_bottom', 'category_bottom']);
        });
    }
};
