<?php $this->layout = 'login'; ?>
<?= $this->Html->pageHeader(__('Login'), 'h3'); ?>
<div class="row">
	<div class="col-sm-4">
		<div class="list-group">
			<?= $this->Html->link(__('Register'), '/register', ['class' => 'list-group-item']); ?>
			<?= $this->Html->link(__('Reset password'), '/resetPassword', ['class' => 'list-group-item']); ?>
			<?= $this->Html->link(__('Resend confirmation'), '/confirmResend', ['class' => 'list-group-item']); ?>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="well well-lg">
			<?= $this->Form->create('User'); ?>
			<?= $this->Form->input('username', ['placeholder' => false, 'icon' => 'user']); ?>
			<?= $this->Form->input('password', ['placeholder' => false, 'icon' => 'key']); ?>
			<?= $this->Form->btnSubmit(__('Login')); ?>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>