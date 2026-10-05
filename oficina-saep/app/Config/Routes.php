<?php
//Rotas Públicas
// Rotas Login
$routes->get('/', 'LoginController::index');
$routes->get('login', 'LoginController::index');
$routes->post('login/autenticar', 'LoginController::autenticar');
$routes->get('logout', 'LoginController::logout');

//Rotas Protegidas
$routes->group('', ['filter' => 'auth'], function($routes){
    // Rota Inicio
    $routes->get('inicio', 'InicioController::index');

    // Rotas Clientes
    $routes->match(['get', 'post'], 'clientes',  'ClientesController::index');
    $routes->get('clientes/novo',                'ClientesController::novo');
    $routes->post('clientes/inserir',            'ClientesController::inserir');
    $routes->get('clientes/editar/(:num)',       'ClientesController::editar/$1');
    $routes->post('clientes/atualizar/(:num)',   'ClientesController::atualizar/$1');
    $routes->get('clientes/excluir/(:num)',      'ClientesController::excluir/$1');

    // Rotas Veiculos
    $routes->match(['get', 'post'], 'veiculos',  'VeiculosController::index');
    $routes->get('veiculos/novo',                'VeiculosController::novo');
    $routes->post('veiculos/inserir',            'VeiculosController::inserir');
    $routes->get('veiculos/editar/(:num)',       'VeiculosController::editar/$1');
    $routes->post('veiculos/atualizar/(:num)',   'VeiculosController::atualizar/$1');
    $routes->get('veiculos/excluir/(:num)',      'VeiculosController::excluir/$1');

    // Rotas Agendamentos
    $routes->match(['get', 'post'], 'agendamentos',     'AgendamentosController::index');
    $routes->get('agendamentos/novo',                   'AgendamentosController::novo');
    $routes->post('agendamentos/inserir',               'AgendamentosController::inserir');
    $routes->get('agendamentos/editar/(:num)',          'AgendamentosController::editar/$1');
    $routes->post('agendamentos/atualizar/(:num)',      'AgendamentosController::atualizar/$1');
    $routes->get('agendamentos/excluir/(:num)',         'AgendamentosController::excluir/$1');
});