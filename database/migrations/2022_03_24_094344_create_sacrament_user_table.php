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
        Schema::create('sacrament_user', function (Blueprint $table) {
            //
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
              ->references('id')
              ->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('sacrament_id');
            $table->foreign('sacrament_id')
              ->references('id')
              ->on('sacraments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sacrament_user', function (Blueprint $table) {
            //
        });
    }
};
