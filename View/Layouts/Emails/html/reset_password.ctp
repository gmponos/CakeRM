<?php

echo __('Hello %s,', $user['User']['username']);
echo "<br>";
echo __('To change your password, you must visit the URL below');
echo "<br>";
echo $this->Html->link([
	'admin' => false,
	'plugin' => false,
	'controller' => false,
	'action' => 'newPassword',
	$user['User']['id'],
	$user['User']['token_email'],
	'full_base' => true,
]);
