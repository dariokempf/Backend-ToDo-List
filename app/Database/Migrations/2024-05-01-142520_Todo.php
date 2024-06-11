<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Todo extends Migration
{
    public function up()
    {
        $this->db->query("CREATE TABLE `todo`
        (
            `id` INT(11) UNSIGNED AUTO_INCREMENT,
            `user_id` INT(11),
            `titel` VARCHAR(255),
            `content` VARCHAR(255),
            `tag` TEXT,
            `done` BOOLEAN,
            `created_at` DATETIME,
            `updated_at` DATETIME,
            `deleted_at` DATETIME,
            PRIMARY KEY (`id`)
            );
        ");
        // $this->forge->addField([
        //     "id"=> [
        //         "type"=> "INT",
        //         "auto_increment"=> true
        //     ],
        //     "user_id"=> [
        //         "type"=> "INT",
        //     ],
        //     "title"=> [
        //         "type"=> "VARCHAR",
        //         "constraint"=> "255"
        //     ],
        //     "content"=> [
        //         "type"=> "VARCHAR",
        //         "constraint"=> "255"
        //     ],
        //     "tag"=> [
        //         "type"=> "TEXT",
        //     ],
        //     "done"=> [
        //         "type"=> "BOOLEAN",
        //     ],
        //     'created_at datetime default current_timestamp',
        //     'updated_at datetime default current_timestamp on update current_timestamp',
        // ]);
        // $this->forge->addKey("id", true);
        // $this->forge->createTable("todos");
    }

    public function down()
    {
        $this->forge->dropTable("todo");
    }
}
