<?php
/**
 * PHP 5
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
	<head>
		<style>
			body {
				font-size: 14px;
				font-family: Verdana, Arial, Helvetica, sans-serif;
			}

			a {
				color: #004556;
				text-decoration: none;
				font-weight: bold;
			}

			a:hover {
				color: #367889;
				text-decoration: none;
			}

			time {
				font-size: 80%
			}

			table {
				border-right: 0;
				clear: both;
				color: #333;
				margin-bottom: 10px;
				width: 100%;
				line-height: 16px;
				border-collapse: collapse;
				border-spacing: 0;
			}

			th {
				border: 0;
				border-bottom: 2px solid #555;
				text-align: left;
				padding: 4px;
			}

			th a {
				display: block;
				padding: 2px 4px;
				text-decoration: none;
			}

			table tr td {
				padding: 6px;
				text-align: left;
				vertical-align: top;
				border-bottom: 1px solid #ddd;
				max-width: 350px;
			}

			table tr:nth-child(even) {
				background: #f9f9f9
			}

			table {
				font-size: 80%
			}

			table tr:not(first-child) + tr:hover {
				background-color: #ffff99;
			}

			table tr td {
				padding: 3px 5px;
			}

			table tr td div {
				display: block;
			}
		</style>
	</head>
	<body>
		<?php echo $this->fetch('content'); ?>
	</body>
</html>