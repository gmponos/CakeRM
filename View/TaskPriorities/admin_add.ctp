<?php $this->Html->addCrumb($this->Html->link(__('Tasks'), ['action' => 'index'], ['icon' => ['class' => 'fa fa-tasks fa-fw']])); ?>
<?php $this->Html->addCrumb($this->Html->link(__('Task Priorities'), ['action' => 'index'])); ?>
<?php $this->Html->addCrumb(__('Create')); ?>
<?php echo $this->Form->create('TaskPriority'); ?>
	<div class="row">
		<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
			<div class="panel panel-default">
				<?php echo $this->Html->panelHeader(__('Add Task Priority')); ?>
				<div class="panel-body">
					<?php echo $this->Form->input('priority'); ?>
					<?php echo $this->Form->input('icon'); ?>
					<?php echo $this->Form->input('order'); ?>
				</div>
				<div class="panel-footer">
					<?php echo $this->Form->btnSubmit(); ?>
					<?php echo $this->Form->btnReset(); ?>
				</div>
			</div>
		</div>
	</div>
<?php
echo $this->Form->end();
