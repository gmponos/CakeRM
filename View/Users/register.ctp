<?php $this->layout = 'login'; ?>
<?= $this->Html->pageHeader(__('Register'), 'h3') ?>
<div class="row">
	<div class="col-sm-4">
		<div class="list-group">
			<?= $this->Html->link(__('Login'), '/login', ['class' => 'list-group-item']); ?>
			<?= $this->Html->link(__('Reset password'), '/resetPassword', ['class' => 'list-group-item']); ?>
			<?= $this->Html->link(__('Resend confirmation'), '/confirmResend', ['class' => 'list-group-item']); ?>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="well">
			<?= $this->Form->create('User', ['autocomplete' => 'off']); ?>
			<?= $this->Form->input('username', ['placeholder' => false]); ?>
			<?= $this->Form->input('email', ['placeholder' => false]); ?>
			<?= $this->Form->input('password', ['placeholder' => false]); ?>
			<?= $this->Form->input('firstname', ['placeholder' => false]); ?>
			<?= $this->Form->input('lastname', ['placeholder' => false]); ?>
			<?= $this->Form->input('phone', ['placeholder' => false]); ?>
			<?= $this->Form->input('cellphone', ['placeholder' => false]); ?>
			<?= $this->Form->btnSubmit(__('Register')); ?>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>