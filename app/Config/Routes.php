<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// ------------------------------------------------------------------
// Public site
// ------------------------------------------------------------------
$routes->get('/', 'Home::index');
$routes->get('artikel/(:num)', 'Home::detail/$1');
$routes->get('feedback', 'Home::feedback');
$routes->post('feedback', 'Home::sendFeedback');

// ------------------------------------------------------------------
// Admin panel
// ------------------------------------------------------------------
$routes->group('admin', function ($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // Articles CRUD
    $routes->get('artikel', 'Admin\Articles::index');
    $routes->get('artikel/tambah', 'Admin\Articles::create');
    $routes->post('artikel/tambah', 'Admin\Articles::store');
    $routes->get('artikel/edit/(:num)', 'Admin\Articles::edit/$1');
    $routes->post('artikel/edit/(:num)', 'Admin\Articles::update/$1');
    $routes->post('artikel/hapus/(:num)', 'Admin\Articles::delete/$1');

    // Feedback (read + delete only, admin doesn't create feedback)
    $routes->get('feedback', 'Admin\Feedback::index');
    $routes->post('feedback/hapus/(:num)', 'Admin\Feedback::delete/$1');
});
