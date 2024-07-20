<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->boolean('numericalOrder')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->unsignedBigInteger('idCategory');
            $table->double('price')->default(0);
            $table->string('slug',200)->nullable();
            $table->integer('sale')->default(0);
            $table->string('image_1', 255)->nullable();
            $table->string('image_2', 255)->nullable();
            $table->string('image_3', 255)->nullable();
            $table->date('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('hot')->default(0);
            $table->integer('see')->default(0);
            $table->boolean('status')->default(1);
            $table->boolean('properties')->default(0);
            $table->string('color',50)->nullable();
            $table->integer('quantity');
            $table->text('description')->nullable();
            $table->foreign('idCategory')->references('id')->on('categories')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('properties');
        Schema::dropIfExists('products');
    }
};