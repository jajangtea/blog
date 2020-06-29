<?php

namespace App\Database\Seeds;

class PostsSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'title'  => 'Contoh Titel',
            'content'      => 'Contoh Content',

        ];
        $this->db->table('posts')->insert($data);
    }
}
