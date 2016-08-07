<?php $this->layout = 'login'; ?>
<h3 class="page-header"><?= __('Reset Password'); ?></h3>
<div class="row">
	<div class="col-sm-4">
		<div class="list-group">
			<?= $this->Html->link(__('Login'), '/login', ['class' => 'list-group-item']); ?>
			<?= $this->Html->link(__('Register'), '/register', ['class' => 'list-group-item']); ?>
			<?= $this->Html->link(__('Resend confirmation'), '/confirmResend', ['class' => 'list-group-item']); ?>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="well">
			<?= $this->Form->create('User', ['autocomplete' => 'off']); ?>
			<?= $this->Form->input('email', ['placeholder' => false]); ?>
			<?= $this->Form->btnSubmit(__('Send')); ?>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
