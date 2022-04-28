<?php

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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('category');
            $table->string('picture')->nullable()->default(null);
            $table->string('bought_by');
            $table->date('date')->default(null)->nullable();
            $table->string('buyer_number');
            $table->double('price');
            $table->string('receipt_number')->nullable()->default(null);
            $table->string('receipt_picture')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
};
