<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FeedbackModel;

class Feedback extends BaseController
{
    protected FeedbackModel $feedbackModel;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
    }

    /**
     * List all feedback submitted by visitors.
     */
    public function index()
    {
        $data = [
            'title'         => 'Feedback Pengguna',
            'feedbackList'  => $this->feedbackModel->getAll(),
        ];

        return view('admin/feedback/index', $data);
    }

    /**
     * Delete a feedback entry. Confirmed client-side with SweetAlert2.
     */
    public function delete($id = null)
    {
        $feedback = $this->feedbackModel->find($id);

        if (! $feedback) {
            return redirect()->to('/admin/feedback')
                ->with('error', 'Feedback tidak ditemukan.');
        }

        $this->feedbackModel->delete($id);

        return redirect()->to('/admin/feedback')
            ->with('success', 'Feedback berhasil dihapus.');
    }
}
