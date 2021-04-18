<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;


/** @var \Cake\Routing\RouteBuilder $routes */
$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    $builder->connect('/', ['controller' => 'Shops', 'action' => 'index']);

    $builder->connect('/{keyword}', ['controller' => 'Shops', 'action' => 'index'])
        ->setPass(['keyword']);

    $builder->connect('/cart', ['controller' => 'Shops', 'action' => 'cart']);

    $builder->connect('/cart/add/{id}', ['controller' => 'Shops', 'action' => 'addCart'])
        ->setPatterns(['id' => '\d+'])
        ->setPass(['id']);

    $builder->connect('/cart/remove/{id}', ['controller' => 'Shops', 'action' => 'removeCart'])
        ->setPatterns(['id' => '\d+'])
        ->setPass(['id']);

    $builder->connect('/mod/{id}', ['controller' => 'Mods', 'action' => 'index'])
        ->setPatterns(['id' => '\d+'])
        ->setPass(['id']);

    $builder->connect('/admin', ['controller' => 'Admins', 'action' => 'index']);

    $builder->connect('/admin/{page}', ['controller' => 'Admins', 'action' => 'index'])
        ->setPatterns(['page' => '\d+'])
        ->setPass(['page']);

    $builder->connect('/add', ['controller' => 'Admins', 'action' => 'add']);

    $builder->connect('/api/get/mods', ['controller' => 'Mods', 'action' => 'api']);

    $builder->connect('/pages/*', 'Pages::display');

    $builder->fallbacks();
});
