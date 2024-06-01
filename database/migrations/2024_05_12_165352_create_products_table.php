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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('p_name',256);
            $table->string('p_code');
            $table->unsignedBigInteger('p_category');
            $table->integer('p_price');
            $table->integer('p_height');
            $table->string('p_des',256);
            $table->string('p_picture',256);
            $table->integer('del_flg')->default(0);
            $table->timestamps();
            $table->foreign('p_category')
            ->references('id')
            ->on('p_categories')
            ->onUpdate('cascade')
            ->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
