<?php $this->Html->addCrumb($this->Html->link(__('Contracts'), ['controller' => 'contracts', 'action' => 'index'], ['icon' => 'file-text-o']));?>
<?php $this->Html->addCrumb($this->Html->link(__('Contract Types'), ['action' => 'index']));?>
<?php $this->Html->addCrumb(__('Edit'));?>
<?php $this->Html->addCrumb($this->request->data('ContractType.id'));?>
<div class="row">
	<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
		<div class="well">
			<?php echo $this->Form->create('ContractType');?>
			<?php echo $this->Form->input('id');?>
			<?php echo $this->Form->input('type');?>
			<?php echo $this->Form->btnSubmit();?>
			<?php echo $this->Form->btnReset();?>
			<?php echo $this->Form->end();?>
		</div>
	</div>
</div>