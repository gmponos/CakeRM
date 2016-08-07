<?php $this->Html->addCrumb($this->Html->link(__('Bank'), ['controller' => 'banks', 'action' => 'index'], ['icon' => ['class' => 'fa fa-bank fa-fw']]));?>
<?php $this->Html->addCrumb($this->Html->link(__('Bank Account'), ['action' => 'index']));?>
<?php $this->Html->addCrumb(__('Edit'));?>
<?php $this->Html->addCrumb($this->request->data('BankAccount.id'));?>
<div class="row">
	<div class="col-sm-offset-3 col-sm-6">
		<div class="well">
			<?php echo $this->Form->create('BankAccount');?>
			<?php
			echo $this->Form->input('id');
			echo $this->Form->chosen('bank_id', ['empty' => false]);
			echo $this->Form->input('bank_account');
			echo $this->Form->input('IBAN');
			echo $this->Form->input('holdersaccount', ['Holders Account']);
			?>
			<div class="form-group">
				<?php echo $this->Form->checkbox('business');?>
				<?php echo $this->Form->label(__('Is Business Account'));?>
			</div>
			<?php echo $this->Form->btnSubmit();?>
			<?php echo $this->Form->btnReset();?>
			<?php echo $this->Form->end();?>
		</div>
	</div>
</div>