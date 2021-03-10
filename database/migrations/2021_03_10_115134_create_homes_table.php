<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('img_1')->nullable();
            $table->string('img_2')->nullable();
            $table->string('heading')->nullable();
            $table->text('pragraph_1')->nullable();
            $table->text('pragraph_2')->nullable();
            $table->string('video')->nullable();
            $table->string('section')->default(0);
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
        Schema::dropIfExists('homes');
    }
}
