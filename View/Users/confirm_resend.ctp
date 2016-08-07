<?php $this->layout = 'login'; ?>
<?= $this->Html->pageHeader(__('Resend Confirmation Email'), 'h3'); ?>
<div class="row">
	<div class="col-sm-4">
		<div class="list-group">
			<?= $this->Html->link(__('Login'), '/login', ['class' => 'list-group-item']); ?>
			<?= $this->Html->link(__('Register'), '/register', ['class' => 'list-group-item']); ?>
			<?= $this->Html->link(__('Reset password'), '/resetPassword', ['class' => 'list-group-item']); ?>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="well">
			<?= $this->Form->create('User'); ?>
			<?= $this->Form->input('email', ['placeholder' => false]); ?>
			<?= $this->Form->btnSubmit(__('Send')); ?>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
