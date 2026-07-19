<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Blog Artikel') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fafafa; }
        .navbar-brand { font-weight: 700; }
        .article-card { transition: box-shadow .15s ease; }
        .article-card:hover { box-shadow: 0 4px 14px rgba(0,0,0,.08); }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom mb-4">
    <div class="container">
        <a class="navbar-brand" href="<?= site_url('/') ?>">📰 Blog Artikel</a>
        <div>
            <a href="<?= site_url('/') ?>" class="btn btn-sm btn-outline-secondary me-2">Beranda</a>
            <a href="<?= site_url('feedback') ?>" class="btn btn-sm btn-outline-primary">Kirim Feedback</a>
        </div>
    </div>
</nav>
<div class="container pb-5">
