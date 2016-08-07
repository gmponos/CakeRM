<?php $this->Html->addCrumb($this->Html->link(__('Tasks'), ['controller' => 'tasks', 'action' => 'index'],
	['icon' => ['class' => 'fa fa-tasks fa-fw']])); ?>
<?php $this->Html->addCrumb($this->Html->link(__('Task Types'), ['action' => 'index'])); ?>
<?php $this->Html->addCrumb(__('Create')); ?>
<?php echo $this->Form->create('TaskType'); ?>
	<div class="row">
		<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
			<div class="panel panel-default">
				<?php echo $this->Html->panelHeader(__('Task Type')); ?>
				<div class="panel-body">
					<?php echo $this->Form->input('type') ?>
					<?php echo $this->Form->input('order') ?>
					<?php echo $this->Form->input('icon') ?>
				</div>
				<div class="panel-footer">
					<?php echo $this->Form->btnSubmit(); ?>
					<?php echo $this->Form->btnReset(); ?>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->Form->end();
