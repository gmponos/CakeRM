<?php $this->Html->addCrumb($this->Html->link(__('Businesses'), ['controller' => 'businesses', 'action' => 'index'], ['icon' => ['class' => 'fa fa-building-o fa-fw']]));?>
<?php $this->Html->addCrumb($this->Html->link(__('Tax Offices'), ['action' => 'index']));?>
<?php $this->Html->addCrumb(__('Edit'));?>
<?php $this->Html->addCrumb($this->request->data('Taxoffice.id')); ?>

<?php echo $this->Form->create('Taxoffice');?>
<div class="row">
	<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
		<div class="panel panel-default">
			<?php echo $this->Html->panelHeader(__('Edit Tax Office'));?>			
			<div class="panel-body">
				<?php echo $this->Form->input('id');?>
				<?php echo $this->Form->input('name');?>
			</div>
			<div class="panel-footer">
				<?php echo $this->Form->btnSubmit();?>
				<?php echo $this->Form->btnReset();?>
			</div>			
		</div>
	</div>
</div>
<?php echo $this->Form->end();