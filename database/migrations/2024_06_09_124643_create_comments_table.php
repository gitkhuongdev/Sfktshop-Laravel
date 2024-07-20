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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idProduct');
            $table->unsignedBigInteger('idUser');
            $table->text('content');
            $table->text('title');
            $table->date('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('status')->default(1);
            $table->foreign('idProduct')->references('id')->on('products')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};