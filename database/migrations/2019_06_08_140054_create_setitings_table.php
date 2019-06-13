<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetitingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setitings', function (Blueprint $table) {
            $table->increments('id');
            $table->string("app_name");
            $table->string("category_1")->nullable();
            $table->string("category_2")->nullable();
            $table->string("category_3")->nullable();
            $table->string("category_4")->nullable();
            $table->string("category_5")->nullable();
            $table->string("deskripsi")->default('KusukaBloging Adalah Sebuah website untuk anda membaca berbagai macam artikel,Blog,novel,dan karya tulis lain nya');
            $table->string('copyright')->default('©  2019 Made With  <i class="fab fa-laravel"></i> By Hajid Al Akhtar');
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
        Schema::dropIfExists('setitings');
    }
}
