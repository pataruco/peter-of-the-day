<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('url')->nullable();
            $table->text('description')->nullable();
            $table->string('name')->nullable();
            $table->string('filename')->nullable();
            $table->enum('media_type', ['image', 'video'] );
            $table->integer('day_id')->unsigned();
        });

        Schema::table('files', function (Blueprint $table) {
            $table->foreign('day_id')->references('id')->on('days');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('files', function (Blueprint $table) {
            $table->dropForeign(['day_id']);
        });
        Schema::dropIfExists('files');
    }
}
