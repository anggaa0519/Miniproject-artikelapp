<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin') ?> &mdash; Admin Artikel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }
        .sidebar {
            min-height: 100vh;
            width: 240px;
            background-color: #1e2a3a;
            color: #fff;
        }
        .sidebar .brand {
            font-weight: 600;
            font-size: 1.1rem;
            padding: 1.25rem 1rem;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }
        .sidebar a {
            color: #c9d3e0;
            text-decoration: none;
            display: block;
            padding: .65rem 1.25rem;
            border-left: 3px solid transparent;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background-color: rgba(255,255,255,.06);
            color: #fff;
            border-left-color: #4f8cff;
        }
        .sidebar a i {
            width: 1.4rem;
            display: inline-block;
        }
        .main-content {
            flex: 1;
            padding: 2rem;
        }
        .card {
            border: none;
            box-shadow: 0 1px 3px rgba(0,0,0,.08);
        }
        .stat-card .display-6 {
            font-weight: 700;
        }
    </style>
</head>
<body>
<div class="d-flex">
