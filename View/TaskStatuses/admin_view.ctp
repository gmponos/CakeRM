<?php $this->Html->addCrumb($this->Html->link(__('Tasks'), ['controller' => 'tasks', 'action' => 'index'], ['icon' => ['class' => 'fa fa-tasks fa-fw']]));?>
<?php $this->Html->addCrumb($this->Html->link(__('Tasks Status'), ['action' => 'index']));?>
<?php $this->Html->addCrumb(__('View'));?>
<?php $this->Html->addCrumb($taskStatus['TaskStatus']['id']);?>
<div class="row">
	<div class="col-sm-3 col-md-2">
		<div class="list-group">
			<?php echo $this->Element->listItemLinkReturn();?>
			<?php echo $this->Element->listItemLinkAdd();?>
			<?php echo $this->Element->listItemLinkEdit($taskStatus['TaskStatus']['id']);?>
		</div>
	</div>
	<div class="col-sm-9 col-md-10">
		<?php echo $this->Html->pageHeader(__('Task Status'), 'h4')?>
		<dl class="dl-horizontal">
			<dt><?php echo __('Id');?></dt>
			<dd>
				<?php echo h($taskStatus['TaskStatus']['id']);?>
			</dd>
			<dt><?php echo __('Status');?></dt>
			<dd>
				<?php echo h($taskStatus['TaskStatus']['status']);?>
			</dd>
			<dt><?php echo __('Icon');?></dt>
			<dd>
				<?php echo h($taskStatus['TaskStatus']['icon']);?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified');?></dt>
			<dd>
				<?php echo h($taskStatus['TaskStatus']['modified']);?>
			</dd>
		</dl>
		<ul class="nav nav-tabs nav-tabs-remote">
			<li class="active"><?php echo $this->Html->link(__('Tasks'), ['controller' => 'tasks', 'action' => 'related', 'task_status_id' => $taskStatus['TaskStatus']['id']], ['data-toggle' => 'tab', 'data-target' => '#tab-tasks-related']);?></li>
		</ul>
		<div class="tab-content">
			<div id="tab-tasks-related" class="tab-pane active"></div>
		</div>
	</div>
</div>