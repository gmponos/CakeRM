<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
Router::parseExtensions('csv');

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::connect('/', ['controller' => 'pages', 'action' => 'display', 'home']);
Router::connect('/dashboard', ['controller' => 'pages', 'action' => 'display', 'dashboard']);
Router::connect('/about', ['controller' => 'pages', 'action' => 'display', 'about']);
Router::connect('/php_info', ['controller' => 'pages', 'action' => 'display', 'php_info']);

/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
Router::connect('/pages/*', ['controller' => 'pages', 'action' => 'display']);

Router::connect('/admin/cities/viewByStateIdForSelect/*', [
	'plugin' => false,
	'admin' => false,
	'controller' => 'cities',
	'action' => 'viewByStateIdForSelect',
]);

Router::connect("/modal/:controller", [
	'action' => 'index',
	'prefix' => 'modal',
	'modal' => true,
]);
Router::connect("/modal/:controller/:action/*", [
	'prefix' => 'modal',
	'modal' => true,
]);

/**
 * User routes configuration
 */
Router::connect('/login', [
	'controller' => 'users',
	'action' => 'login',
]);
Router::connect('/logout', [
	'controller' => 'users',
	'action' => 'logout',
]);
Router::connect('/register', [
	'controller' => 'users',
	'action' => 'register',
]);
Router::connect('/confirmResend', [
	'controller' => 'users',
	'action' => 'confirmResend',
]);
Router::connect('/resetPassword', [
	'controller' => 'users',
	'action' => 'resetPassword',
]);
Router::connect('/changePassword', [
	'admin' => false,
	'controller' => 'users',
	'action' => 'changePassword',
]);
Router::connect('/newPassword/:id/:token', [
	'admin' => false,
	'controller' => 'users',
	'action' => 'newPassword',
], [
	'pass' => ['id', 'token'],
]);

Router::connect('/users/:action/*', [
	'controller' => 'users',
	'admin' => false,
	'prefix' => null,
]);
;

Router::connect('/logins/:action/*', [
	'controller' => 'logins',
	'admin' => false,
	'prefix' => null,
]);

Router::connect('/groups/:action/*', [
	'controller' => 'groups',
	'admin' => false,
	'prefix' => null,
]);

Router::connect('/admin/users/:action/*', [
	'controller' => 'users',
	'admin' => true,
	'prefix' => 'admin',
]);

Router::connect('/admin/logins/:action/*', [
	'controller' => 'logins',
	'admin' => true,
	'prefix' => 'admin',
]);

Router::connect('/admin/groups/:action/*', [
	'controller' => 'groups',
	'admin' => true,
	'prefix' => 'admin',
]);

CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
