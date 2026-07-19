<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\FeedbackModel;

class Home extends BaseController
{
    /**
     * Public homepage: list of published articles.
     */
    public function index()
    {
        $articleModel = new ArticleModel();

        $data = [
            'title'    => 'Beranda',
            'articles' => $articleModel->getPublished(),
        ];

        return view('public/home', $data);
    }

    /**
     * Public article detail page. Only published articles are visible.
     */
    public function detail($id = null)
    {
        $articleModel = new ArticleModel();
        $article      = $articleModel->find($id);

        if (! $article || $article['status'] !== 'published') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title'   => $article['title'],
            'article' => $article,
        ];

        return view('public/detail', $data);
    }

    /**
     * Show the public feedback form.
     */
    public function feedback()
    {
        $data = [
            'title' => 'Kirim Feedback',
        ];

        return view('public/feedback', $data);
    }

    /**
     * Validate and store feedback submitted by a visitor.
     */
    public function sendFeedback()
    {
        $feedbackModel = new FeedbackModel();

        $rules = [
            'name'    => 'required|min_length[3]|max_length[255]',
            'email'   => 'required|valid_email',
            'message' => 'required|min_length[10]',
        ];

        $messages = [
            'name' => [
                'required'   => 'Nama wajib diisi.',
                'min_length' => 'Nama minimal 3 karakter.',
            ],
            'email' => [
                'required'    => 'Email wajib diisi.',
                'valid_email' => 'Format email tidak valid.',
            ],
            'message' => [
                'required'   => 'Pesan wajib diisi.',
                'min_length' => 'Pesan minimal 10 karakter.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->to('/feedback')
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $feedbackModel->insert([
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'message' => $this->request->getPost('message'),
        ]);

        return redirect()->to('/feedback')
            ->with('success', 'Terima kasih! Feedback Anda berhasil dikirim.');
    }
}
