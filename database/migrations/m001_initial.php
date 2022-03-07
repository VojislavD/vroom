<?php

use Vroom\Database\Blueprint;
use Vroom\Database\Schema;

class m001_initial
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->foreignId('id');
            $table->string('name');
            $table->tinyInt('status');
            $table->timestamp('created_at');
        });
    }

    public function down()
    {
        Schema::dropTable('users');
    }
}