<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('/validate_credentials', 'Home::validate_credentials');
$routes->get('/inicio', 'Home::inicio');
$routes->get('/cooperativas', 'Home::frm_cooperativas');
$routes->get('/salir', 'Home::salir');

$routes->get('/cartera', 'Cartera::index');
$routes->post('/lista_cartera', 'Cartera::lista_cartera');
$routes->get('subir_excel', 'Cartera::frm_subir_excel');
$routes->post('/getExcel', 'Cartera::getExcel');

$routes->get('usuarios', 'Usuario::index');
$routes->get('nuevo_usuario', 'Usuario::nuevo_usuario');
$routes->post('/recibe_nuevo_usuario', 'Usuario::recibe_nuevo_usuario');

$routes->get('cobros', 'Pago::index');
$routes->get('/form_visita/(:num)', 'Pago::form_visita/$1');
$routes->get('/form_pago/(:num)', 'Pago::form_pago/$1');
$routes->post('/insertPago', 'Pago::insertPago');
$routes->post('/insert_visita', 'Pago::insert_visita');
$routes->get('subir_pagos', 'Pago::frm_subir_excel_pagos');
$routes->post('/getExcelPagos', 'Pago::getExcelPagos');

$routes->get('/reportes', 'Reportes::index');
$routes->get('/form_reporte_cobro/(:num)', 'Reportes::form_reporte_cobro/$1');
$routes->post('/reporteCobrosUsuarioFechas', 'Reportes::reporteCobrosUsuarioFechas');
$routes->get('frm_reporte_cobros_cooperativa', 'Reportes::frm_reporte_cobros_cooperativa');
$routes->post('/get_reporte_cobros_cooperativa', 'Reportes::get_reporte_cobros_cooperativa');
$routes->get('frm_reporte_cobros_total', 'Reportes::frm_reporte_cobros_total');
$routes->post('/get_reporte_cobros_total', 'Reportes::get_reporte_cobros_total');

$routes->get('cliente_resumen/(:num)', 'Cliente::resumen/$1');
$routes->get('reporte_cobros/(:num)', 'Reportes::reporte_cobros_pdf/$1');
$routes->get('reporte_seguimiento/(:num)', 'Reportes::reporte_seguimiento_pdf/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
