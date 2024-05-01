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
            titel VARCHAR(255),
            content VARCHAR(255),
            tag TEXT,
            done BOOLEAN,
            created_at DATETIME,
            updated_at DATETIME,
            deleted_at DATETIME,
            user_id INT(11),
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
