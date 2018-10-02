<?php
/*
*
* Junghoe(Peter) Hwang - 16242934
* Erdem Alpkaya        - 16226114
* Robert Harper        - 96066919
*
*/
use PHPRouter\RouteCollection;
use PHPRouter\Router;
use PHPRouter\Route;

/**
 * @package team/a2
 *
 * Code foundation by:
 * @author  Andrew Gilman <a.gilman@massey.ac.nz>
 *
 *
 * @author  Junghoe Hwang <after10y@gmail.com>
 * @author Erdem Alpkaya <erdemalpkaya@gmail.com>
 * @author  Robert Harper   <l.attitude37@gmail.com>
 *
 */

$collection = new RouteCollection();

// example of using a redirect to another route
$collection->attachRoute(
    new Route(
        '/',
        array(
            '_controller' => 'team\a2\controller\HomeController::indexAction',
            'methods' => 'GET',
            'name' => 'Home'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/account/',
        array(
        '_controller' => 'team\a2\controller\AccountController::indexAction',
        'methods' => 'GET',
        'name' => 'accountIndex'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/account/create/',
        array(
        '_controller' => 'team\a2\controller\AccountController::createAction',
        'methods' => 'GET',
        'name' => 'accountCreate'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/account/delete/:id',
        array(
        '_controller' => 'team\a2\controller\AccountController::deleteAction',
        'methods' => 'GET',
        'name' => 'accountDelete'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/account/update/:id',
        array(
        '_controller' => 'team\a2\controller\AccountController::updateAction',
        'methods' => 'GET',
        'name' => 'accountUpdate'
        )
    )
);
$collection->attachRoute(
    new Route(
        '/customer/',
        array(
            '_controller' => 'team\a2\controller\CustomerController::indexAction',
            'methods' => 'GET',
            'name' => 'customerIndex'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/customer/create/',
        array(
            '_controller' => 'team\a2\controller\CustomerController::createAction',
            'methods' => 'GET',
            'name' => 'customerCreate'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/customer/delete/:id',
        array(
            '_controller' => 'team\a2\controller\CustomerController::deleteAction',
            'methods' => 'GET',
            'name' => 'customerDelete'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/customer/update/:id',
        array(
            '_controller' => 'team\a2\controller\CustomerController::updateAction',
            'methods' => 'GET',
            'name' => 'customerUpdate'
        )
    )
);
$collection->attachRoute(
    new Route(
        '/login/',
        array(
            '_controller' => 'team\a2\controller\LoginController::indexAction',
            'methods' => 'GET',
            'name' => 'loginIndex'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/login/create/',
        array(
            '_controller' => 'team\a2\controller\LoginController::createAction',
            'methods' => 'GET',
            'name' => 'loginCreate'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/login/delete/:id',
        array(
            '_controller' => 'team\a2\controller\LoginController::deleteAction',
            'methods' => 'GET',
            'name' => 'loginDelete'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/login/update/:id',
        array(
            '_controller' => 'team\a2\controller\LoginController::updateAction',
            'methods' => 'GET',
            'name' => 'loginUpdate'
        )
    )
);
$collection->attachRoute(
    new Route(
        '/acc/',
        array(
            '_controller' => 'team\a2\controller\AccController::indexAction',
            'methods' => 'GET',
            'name' => 'accIndex'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/acc/create/',
        array(
            '_controller' => 'team\a2\controller\AccController::createAction',
            'methods' => 'GET',
            'name' => 'accCreate'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/acc/delete/:id',
        array(
            '_controller' => 'team\a2\controller\AccController::deleteAction',
            'methods' => 'GET',
            'name' => 'accDelete'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/acc/update/:id',
        array(
            '_controller' => 'team\a2\controller\AccController::updateAction',
            'methods' => 'GET',
            'name' => 'accUpdate'
        )
    )
);
$collection->attachRoute(
    new Route(
        '/customer_acc/',
        array(
            '_controller' => 'team\a2\controller\Customer_accController::indexAction',
            'methods' => 'GET',
            'name' => 'customer_accIndex'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/customer_acc/create/',
        array(
            '_controller' => 'team\a2\controller\Customer_accController::createAction',
            'methods' => 'GET',
            'name' => 'customer_accCreate'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/customer_acc/delete/:id',
        array(
            '_controller' => 'team\a2\controller\Customer_accController::deleteAction',
            'methods' => 'GET',
            'name' => 'customer_accDelete'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/customer_acc/update/:id',
        array(
            '_controller' => 'team\a2\controller\Customer_accController::updateAction',
            'methods' => 'GET',
            'name' => 'customer_accUpdate'
        )
    )
);


$router = new Router($collection);
$router->setBasePath('/');
