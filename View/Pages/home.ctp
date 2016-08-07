<?php $this->layout = 'pages'; ?>
<div class="jumbotron">
	<h1>
		<?= $this->Html->icon('bar-chart-o', '', ['class' => 'fa-fw']); ?>
		<?= configure::read('Site.brand'); ?>
	</h1>
	<p><?= __('The easy way to manage your tickets'); ?></p>
</div>
<div class="row">
	<div class="col-sm-4">
		<div class="well">
			<div class="text-center">
				<?= $this->Html->icon('tasks', '', ['class' => 'fa-5x']); ?>
				<h3><?= __('Tasks'); ?></h3>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="well">
			<div class="text-center">
				<?= $this->Html->icon('users', '', ['class' => 'fa-5x']); ?>
				<h3><?= __('Customers'); ?></h3>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="well">
			<div class="text-center">
				<?= $this->Html->icon('file-text-o', '', ['class' => 'fa-5x']); ?>
				<h3><?= __('Contracts'); ?></h3>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="well">
			<div class="text-center">
				<?= $this->Html->icon('gavel', '', ['class' => 'fa-5x']); ?>
				<h3><?= __('Repairs'); ?></h3>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="well">
			<div class="text-center">
				<?= $this->Html->icon('sun-o', '', ['class' => 'fa-5x']); ?>
				<h3><?= __('Day Offs'); ?></h3>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="well">
			<div class="text-center">
				<?= $this->Html->icon('calendar', '', ['class' => 'fa-5x']); ?>
				<h3><?= __('Appointments'); ?></h3>
			</div>
		</div>
	</div>
</div>