<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Todo extends Seeder
{
    public function run()
    {
        $example_data = [
            [
                'user_id' => 1,
                'titel' => 'Gaming',
                'content' => 'Play Fortnite for 10 hours strate',
                'tag' => 'FreeTime',
                'done' => false,
                'created_at' => ['created_at' => date('Y-m-d H:i:s')],
                'updated_at' => ['updated_at' => date('Y-m-d H:i:s')],
            ]
            ];

            $TodoModel = new \App\Models\Todo();

            foreach ($example_data as $entry_id => $data) {
                if ($TodoModel->insert($data) === false) {
                    echo "Errors on entry_id ${entry_id}:\n";
                    print_r($TodoModel->errors());

           }
        }
    }
}