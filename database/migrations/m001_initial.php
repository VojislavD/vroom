<?php

use Vroom\Database\Blueprint;
use Vroom\Database\Schema;

class m001_initial
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->foreignId('id');
            $table->string('name')->nullable();
            $table->tinyInt('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropTable('users');
    }
}