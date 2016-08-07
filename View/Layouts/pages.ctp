<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
		<title>
			<?= configure::read('Site.brand'); ?>:
			<?= $title_for_layout; ?>
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Roboto&subset=latin,greek-ext,greek" type="text/css" rel="stylesheet">
		<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('CakeBootstrap.bootstrap');
		echo $this->Html->css('CakeBootstrap.font-awesome');
		echo $this->Html->css('CakeBootstrap.chosen');
		echo $this->Html->css('CakeBootstrap.datepicker');
		echo $this->Html->css('core/qtip');
		echo $this->Html->css('style');
		echo $this->Html->css('elements');
		echo $this->Html->css('theme');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		?>
	</head>
	<body>
		<?php echo $this->element('site/login'); ?>
		<div class="container" id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
			<?php echo $this->element('footer'); ?>
		</div>
	</body>
	<?php
	echo $this->Html->script('core/jquery', ['once' => true]);
	echo $this->Html->script('core/jquery-ui', ['once' => true]);
	echo $this->Html->script('core/qtip', ['once' => true]);
	echo $this->Html->script('CakeBootstrap.chosen', ['once' => true]);
	echo $this->Html->script('CakeBootstrap.datepicker', ['once' => true]);

	echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=true', false);
	echo $this->fetch('script');

	?>
</html>
