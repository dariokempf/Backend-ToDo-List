<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Todo extends Migration
{
    public function up()
    {
        $this->db->query("CREATE TABLE todo
        (
            id INT(11) UNSIGNED AUTO_INCREMENT,
            user_id INT(11),
            titel VARCHAR(255),
            content VARCHAR(255),
            tag TEXT,
            done BOOLEAN,
            created_at DATETIME,
            updated_at DATETIME,
            deleted_at DATETIME,
            PRIMARY KEY (id),
            FOREIGN KEY (user_id)
            );
        ");
    }

    public function down()
    {
        //
    }
}
