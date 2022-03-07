<?php

use Vroom\Database\Schema;

class m001_initial
{
    public function up()
    {
        Schema::create('users', [
            'id' => [
                'type' => 'integer',
                'auto_increment' => true,
                'primary_key' => true
            ],
            'email' => [
                'type' => 'varchar',
            ],
            'firstname' => [
                'type' => 'varchar',
            ],
            'lastname' => [
                'type' => 'varchar',
            ],
            'status' => [
                'type' => 'tinyint',
                'nullable' => true,
            ],
            'created_at' => [
                'type' => 'timestamp',
                'default' => 'current_timestamp'
            ],
        ]);
    }

    public function down()
    {
        Schema::dropTable('users');
    }
}