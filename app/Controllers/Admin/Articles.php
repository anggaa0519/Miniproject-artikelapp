<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArticleModel;

class Articles extends BaseController
{
    protected ArticleModel $articleModel;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
    }

    /**
     * Article list page.
     */
    public function index()
    {
        $data = [
            'title'    => 'Daftar Artikel',
            'articles' => $this->articleModel->getAll(),
        ];

        return view('admin/articles/index', $data);
    }

    /**
     * Show the "add article" form.
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Artikel',
        ];

        return view('admin/articles/create', $data);
    }

    /**
     * Validate and store a new article.
     */
    public function store()
    {
        $rules = [
            'title'   => 'required|min_length[5]|max_length[255]',
            'status'  => 'required|in_list[draft,published]',
            'content' => 'permit_empty',
        ];

        $messages = [
            'title' => [
                'required'   => 'Judul artikel wajib diisi.',
                'min_length' => 'Judul artikel minimal 5 karakter.',
                'max_length' => 'Judul artikel maksimal 255 karakter.',
            ],
            'status' => [
                'required' => 'Status artikel wajib dipilih.',
                'in_list'  => 'Status artikel harus draft atau published.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');

        $this->articleModel->insert([
            'title'   => $title,
            'slug'    => $this->articleModel->makeSlug($title),
            'content' => $this->request->getPost('content'),
            'status'  => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/artikel')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Show the "edit article" form.
     */
    public function edit($id = null)
    {
        $article = $this->articleModel->find($id);

        if (! $article) {
            return redirect()->to('/admin/artikel')
                ->with('error', 'Artikel tidak ditemukan.');
        }

        $data = [
            'title'   => 'Edit Artikel',
            'article' => $article,
        ];

        return view('admin/articles/edit', $data);
    }

    /**
     * Validate and update an existing article.
     */
    public function update($id = null)
    {
        $article = $this->articleModel->find($id);

        if (! $article) {
            return redirect()->to('/admin/artikel')
                ->with('error', 'Artikel tidak ditemukan.');
        }

        $rules = [
            'title'   => 'required|min_length[5]|max_length[255]',
            'status'  => 'required|in_list[draft,published]',
            'content' => 'permit_empty',
        ];

        $messages = [
            'title' => [
                'required'   => 'Judul artikel wajib diisi.',
                'min_length' => 'Judul artikel minimal 5 karakter.',
                'max_length' => 'Judul artikel maksimal 255 karakter.',
            ],
            'status' => [
                'required' => 'Status artikel wajib dipilih.',
                'in_list'  => 'Status artikel harus draft atau published.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $slug  = $article['slug'];

        // Only rebuild the slug if the title actually changed.
        if ($title !== $article['title']) {
            $slug = $this->articleModel->makeSlug($title, (int) $id);
        }

        $this->articleModel->update($id, [
            'title'   => $title,
            'slug'    => $slug,
            'content' => $this->request->getPost('content'),
            'status'  => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/artikel')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Delete an article. Confirmed client-side with SweetAlert2.
     */
    public function delete($id = null)
    {
        $article = $this->articleModel->find($id);

        if (! $article) {
            return redirect()->to('/admin/artikel')
                ->with('error', 'Artikel tidak ditemukan.');
        }

        $this->articleModel->delete($id);

        return redirect()->to('/admin/artikel')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}
