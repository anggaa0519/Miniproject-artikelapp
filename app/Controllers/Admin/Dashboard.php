<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArticleModel;
use App\Models\FeedbackModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $articleModel  = new ArticleModel();
        $feedbackModel = new FeedbackModel();

        $data = [
            'title'            => 'Dashboard',
            'totalArticles'    => $articleModel->countAll(),
            'draftArticles'    => $articleModel->where('status', 'draft')->countAllResults(),
            'publishedArticles'=> $articleModel->where('status', 'published')->countAllResults(),
            'totalFeedback'    => $feedbackModel->countAll(),
            'latestArticles'   => $articleModel->orderBy('created_at', 'DESC')->findAll(5),
            'latestFeedback'   => $feedbackModel->orderBy('created_at', 'DESC')->findAll(5),
        ];

        return view('admin/dashboard', $data);
    }
}
