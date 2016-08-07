<?php $this->Html->addCrumb($this->Html->link(__('Bank'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-bank fa-fw']])); ?>
<?php $this->Html->addCrumb(__('Edit')); ?>
<?php $this->Html->addCrumb($this->request->data('Bank.id')); ?>
<div class="row">
	<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
		<div class="well">
			<?php echo $this->Form->create('Bank'); ?>
			<?php echo $this->Form->input('id'); ?>
			<?php echo $this->Form->input('name', ['placeholder' => false]); ?>
			<?php echo $this->Form->btnSubmit(); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>