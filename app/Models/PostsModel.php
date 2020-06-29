<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
    protected $table = "posts";
    protected $allowedFields = ['title', 'content'];
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'title'       => 'required|alpha_numeric_space|min_length[3]max_length[255]',
        'content'        => 'required|min_length[3]|max_length[255]',
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'tidak boleh kosong',
            'alpha_numeric_space' => 'tidak boleh berisi karakter',
            'min_length' => 'minimal tiga karakter',
        ],
        'content' => [
            'required' => 'tidak boleh kosong',
            'min_length' => 'minimal tiga karakter',
        ],
    ];
}
