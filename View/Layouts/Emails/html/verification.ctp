<?php

/**
 * Copyright 2010 - 2013, Cake Development Corporation (http://cakedc.com)
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2013, Cake Development Corporation (http://cakedc.com)
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
echo __d('users', 'Hello %s,', $user['User']['username']);
echo "<br>";
echo __d('users', 'To validate your account, you must visit the URL below within 24 hours');
echo "<br>";
echo $this->Html->link([
	'admin' => false,
	'plugin' => false,
	'controller' => 'users',
	'action' => 'verify',
	$user['User']['id'],
	$user['User']['email_token'],
	'full_base' => true,
]);
