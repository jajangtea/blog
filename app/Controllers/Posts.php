<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PostsModel;

class Posts extends Controller
{

    protected $postModel;
    public function __construct()
    {
        $this->postModel = new PostsModel();
        helper('form');
    }

    public function index()
    {
        $posts = $this->postModel->findAll();
        $data = [
            'headerTitle' => 'Daftar Post',
            'posts' => $posts,
        ];
        echo view('posts/index', $data);
    }

    public function add()
    {
        if ($this->request->getMethod() === 'post') {
            $data = $this->request->getPost();
            if ($this->postModel->save($data)) {
                $session = session();
                $session->setFlashdata('status', 'Artikel baru telah ditambahkan.');
                return redirect()->to(base_url('posts'));
            }
            $errors = $this->postModel->errors();
            return view('posts/add', [
                'errors' =>  $errors,
                'headerTitle' => 'Tambah Posts',
            ]);
        }

        return view('posts/add', ['headerTitle' => 'Tambah Posts',]);
    }
    public function edit($id)
    {
        $model = $this->postModel->find($id);
        if ($this->request->getMethod() === 'post') {
            $data = $this->request->getPost();
            $data['id']     = $data['id'] ?? '';
            $data['title']  = $data['title'] ?? '';
            $data['content'] = $data['content'] ?? '';
            if ($this->postModel->save($data)) {
                $session = session();
                $session->setFlashdata('status', 'Artikel baru telah diubah');
                return redirect()->to(base_url('posts'));
            }
        }
        $errors = $this->postModel->errors();
        return view('posts/edit', [
            'headerTitle' => 'Edit Artikel',
            'errors' =>  $errors,
            'posts' => $model
        ]);
    }

    public function delete($id)
    {
        $delete = $this->postModel->delete($id);
        if ($delete == true) {
            $session = session();
            $session->setFlashdata('status', 'artikel telah dihapus');
            return redirect()->to(base_url('posts'));
        }
    }
}
