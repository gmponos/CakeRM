<?php $this->layout = 'login'; ?>
<?php echo $this->Html->pageHeader(__('Set new password'), 'h4'); ?>
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
			<?= $this->Form->create('User', [
				'url' => [
					'admin' => false,
					'plugin' => false,
					'controller' => false,
					$id,
					$token,
				],
				'autocomplete' => 'off',
			]); ?>
			<?= $this->Form->input('password', ['default' => '', 'placeholder' => false]); ?>
			<?= $this->Form->btnSubmit(__('Change')); ?>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>