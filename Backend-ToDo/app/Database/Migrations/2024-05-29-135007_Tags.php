<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tags extends Migration
{
    public function up()
    {
        $this->db->query("CREATE TABLE `categories`
        (
            `id` INT(11) UNSIGNED AUTO_INCREMENT,
            `name` VARCHAR(255),
            PRIMARY KEY (`id`)
            );
        ");
    }

    public function down()
    {
        //
    }
}
