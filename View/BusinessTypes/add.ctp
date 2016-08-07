<?php $this->Html->addCrumb($this->Html->link(__('Businesses'), ['controller' => 'businesses', 'action' => 'index'],
	['icon' => ['class' => 'fa fa-building-o fa-fw']])); ?>
<?php $this->Html->addCrumb($this->Html->link(__('Business Types'), ['action' => 'index'])); ?>
<?php $this->Html->addCrumb(__('Create')); ?>
<?php echo $this->Form->create('BusinessType'); ?>
	<div class="row">
		<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
			<div class="panel panel-default">
				<?php echo $this->Html->panelHeader(__('Create Business Type')); ?>
				<div class="panel-body">
					<?php echo $this->Form->input('type', ['placeholder' => false]); ?>
				</div>
				<div class="panel-footer">
					<?php echo $this->Form->btnSubmit(); ?>
					<?php echo $this->Form->btnReset(); ?>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->Form->end();
