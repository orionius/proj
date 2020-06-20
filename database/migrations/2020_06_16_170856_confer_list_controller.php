<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConferListController extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conference_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('conference_name')->nullable();
            $table->date('dates')->nullable();
            $table->string('venue')->nullable();
            $table->text('photo_link')->nullable();
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
        Schema::dropIfExists('conference_list');
    }
}
