<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HstList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hst_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phonenumber')->unique();
            $table->string('callagain');
            $table->string('hangup');
            $table->string('dontcall');
            $table->string('succes');
            $table->longText('optional'); 
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
        Schema::dropIfExists('hst_list');
    }
}
