<?php $uri = service('uri')->getSegment(2) ?? ''; ?>
<nav class="sidebar d-flex flex-column">
    <div class="brand">
        <i class="bi bi-journal-richtext"></i> Admin Artikel
    </div>
    <a href="<?= site_url('admin/dashboard') ?>" class="<?= $uri === 'dashboard' || $uri === '' ? 'active' : '' ?>">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>
    <a href="<?= site_url('admin/artikel') ?>" class="<?= $uri === 'artikel' ? 'active' : '' ?>">
        <i class="bi bi-file-earmark-text"></i> Artikel
    </a>
    <a href="<?= site_url('admin/feedback') ?>" class="<?= $uri === 'feedback' ? 'active' : '' ?>">
        <i class="bi bi-chat-left-text"></i> Feedback
    </a>
    <a href="<?= site_url('/') ?>" target="_blank">
        <i class="bi bi-box-arrow-up-right"></i> Lihat Situs
    </a>
</nav>
<main class="main-content">
