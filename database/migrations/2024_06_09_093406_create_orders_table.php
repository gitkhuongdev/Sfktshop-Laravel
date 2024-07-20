<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('user_fullname');
            $table->string('user_email');
            $table->string('user_phone');
            $table->string('user_address');
            $table->text('user_note')->nullable();
            $table->enum('status',['Pending','Prepare','Shipping','Success','Cancel'])->default('Pending');
            $table->double('total_money')->default(0);
            $table->integer('total_quantity')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};