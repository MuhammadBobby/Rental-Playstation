<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::login');
$routes->post('/login', 'Auth::Ceklogin');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Home::index');

// inventaris
$routes->get('/inventaris', 'Inventaris::index');
$routes->get('/inventaris/create', 'Inventaris::create');
$routes->post('/inventaris/save', 'Inventaris::save');
$routes->get('/inventaris/edit/(:num)', 'Inventaris::edit/$1');
$routes->post('/inventaris/update/(:num)', 'Inventaris::update/$1');
$routes->get('/inventaris/delete/(:num)', 'Inventaris::delete/$1');

// member
$routes->get('/member', 'Member::index');
$routes->get('/member/create', 'Member::create');
$routes->post('/member/save', 'Member::save');
$routes->get('/member/edit/(:num)', 'Member::edit/$1');
$routes->post('/member/update/(:num)', 'Member::update/$1');
$routes->get('/member/delete/(:num)', 'Member::delete/$1');

// staff
$routes->get('/staff', 'Staff::index');
$routes->get('/staff/create', 'Staff::create');
$routes->post('/staff/save', 'Staff::save');
$routes->get('/staff/edit/(:num)', 'Staff::edit/$1');
$routes->post('/staff/update/(:num)', 'Staff::update/$1');
$routes->get('/staff/delete/(:num)', 'Staff::delete/$1');

// transaksi
$routes->get('/booking', 'Booking::index');
$routes->get('/booking/create', 'Booking::create');
$routes->post('/booking/save', 'Booking::save');
$routes->get('/booking/delete/(:num)', 'Booking::delete/$1');
$routes->get('/booking/show/(:num)', 'Booking::show/$1');
$routes->get('/booking/finish/(:num)/(:num)', 'Booking::finish/$1/$2');
$routes->get('/booking/reportID//(:num)', 'Booking::reportID/$1');

// report
$routes->get('/report/booking', 'Report::booking');
$routes->get('/report/inventaris', 'Report::inventaris');
$routes->get('/report/member', 'Report::member');
$routes->get('/report/staff', 'Report::staff');
$routes->get('/report/reportExcel//()', 'Report::reportExcel');



$routes->setAutoRoute(true);
