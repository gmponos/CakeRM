<?php $this->Html->addCrumb($this->Html->link(__('Tasks'), ['controller' => 'tasks', 'action' => 'index'], ['icon' => ['class' => 'fa fa-tasks fa-fw']]));?>
<?php $this->Html->addCrumb($this->Html->link(__('Tasks Statuses'), ['action' => 'index']));?>
<?php $this->Html->addCrumb(__('Create'));?>
<?php echo $this->Form->create('TaskStatus', ['horizontal' => true]);?>
<div class="row">
	<div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<div class="panel panel-default">
			<?php echo $this->Html->panelHeader(__('Add Task State'));?>
			<div class="panel-body">
				<?php echo $this->Form->input('status')?>
				<?php echo $this->Form->input('order')?>
				<?php echo $this->Form->input('icon')?>
			</div>
			<div class="panel-footer">
				<?php echo $this->Form->btnSubmit();?>
				<?php echo $this->Form->btnReset();?>
			</div>
		</div>
	</div>
</div>
<?php echo $this->Form->end();