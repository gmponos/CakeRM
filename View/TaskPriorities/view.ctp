<?php $this->Html->addCrumb($this->Html->link(__('Tasks'), ['controller' => 'tasks', 'action' => 'index'], ['icon' => ['class' => 'fa fa-tasks fa-fw']]));?>
<?php $this->Html->addCrumb($this->Html->link(__('Task Priorities'), ['action' => 'index']));?>
<?php $this->Html->addCrumb(__('View'));?>
<?php $this->Html->addCrumb($taskPriority['TaskPriority']['priority']);?>
<div class="row">
	<div class="col-sm-3 col-md-2">
		<?php echo $this->Element->listItemLinkReturn();?>
	</div>
	<div class="col-sm-9 col-md-10">
		<h2><?php echo __('Task Priority');?></h2>
		<dl class="dl-horizontal">
			<dt><?php echo __('Priority');?></dt>
			<dd>
				<?php echo h($taskPriority['TaskPriority']['priority']);?>
			</dd>
		</dl>
		<ul class="nav nav-tabs nav-tabs-remote">
			<li class="active"><?php echo $this->Html->link(__('Tasks'), ['controller' => 'tasks', 'action' => 'related', 'task_priority_id' => $taskPriority['TaskPriority']['id']], ['data-toggle' => 'tab', 'data-target' => '#tab-tasks-related']);?></li>
		</ul>
		<div class="tab-content">
			<div id="tab-tasks-related" class="tab-pane active"></div>
		</div>
	</div>
</div>

