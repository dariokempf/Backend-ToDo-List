<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Todo extends Seeder
{
    public function run()
    {
        $example_data = [
            [
                'user_id' => 69,
                'titel' => 'Do homework',
                'content' => 'work on CodeIgniter Project for Wednesday',
                'tag' => 'School',
                'done' => true,
                'created_at' => ['created_at' => date('Y-m-d H:i:s')],
                'updated_at' => ['updated_at' => date('Y-m-d H:i:s')],
            ]
            ];

            $TodoModel = new \App\Models\Todo();

    }
}
