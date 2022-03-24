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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commitee_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('file')->nullable();
            $table->string('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('commitee_id')
            ->references('id')
            ->on('commitees')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
