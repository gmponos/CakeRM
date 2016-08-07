<?php $this->Html->addCrumb($this->Html->link(__('Contacts'), ['controller' => 'contact_types', 'action' => 'index'], ['icon' => ['class' => 'fa fa-book fa-fw']]));?>
<?php $this->Html->addCrumb($this->Html->link(__('Contacts Types'), ['action' => 'index']));?>
<?php $this->Html->addCrumb(__('Edit'));?>
<?php $this->Html->addCrumb($this->request->data('ContactType.id'));?>
<?php echo $this->Form->create('ContactType');?>
<div class="row">
	<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
		<div class="well">
			<?php echo $this->Form->input('id');?>
			<?php echo $this->Form->input('type', ['placeholder' => false]);?>
			<?php echo $this->Form->btnSubmit();?>
			<?php echo $this->Form->btnReset();?>
		</div>
	</div>
</div>
<?php echo $this->Form->end();