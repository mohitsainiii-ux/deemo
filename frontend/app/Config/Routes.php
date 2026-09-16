<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Student::index');
$routes->get('/students', 'Student::index');
$routes->post('/students/create', 'Student::create');