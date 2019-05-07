<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('photos', function (Blueprint $table) {
          $table->bigIncrements('id')->unique();
          $table->string('name',128);
          $table->string('description',128);
          $table->unsignedBigInteger('album_id')->unsigned();
          $table->foreign('album_id')->references('id')->on('albums')->unisigned()->onDelete('cascade');
          $table->string('img_path',128);
          $table->softDeletes();
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
        Schema::dropIfExists('photos');
        Schema::enableForeignKeyConstraints();

    }
}
