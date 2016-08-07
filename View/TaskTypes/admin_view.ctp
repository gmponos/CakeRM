<?php $this->Html->addCrumb($this->Html->link(__('Tasks'), ['controller' => 'tasks', 'action' => 'index'],
	['icon' => ['class' => 'fa fa-tasks fa-fw']])); ?>
<?php $this->Html->addCrumb($this->Html->link(__('Task Types'), ['action' => 'index'])); ?>
<?php $this->Html->addCrumb(__('View')); ?>
<?php $this->Html->addCrumb($taskType['TaskType']['id']); ?>
<div class="row">
	<div class="col-sm-9 col-md-10">
		<div class="toolbar toolbar-default">
			<?php echo $this->Element->btnToolbarReturn(); ?>
			<?php echo $this->Element->btnToolbarAdd(); ?>
			<?php echo $this->Element->btnToolbarEdit($taskType['TaskType']['id']); ?>
		</div>
		<?php echo $this->Html->pageHeader(__('Task Type'), 'h4') ?>
		<dl class="dl-table">
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($taskType['TaskType']['id']); ?>
			</dd>
			<dt><?php echo __('Type'); ?></dt>
			<dd>
				<?php echo h($taskType['TaskType']['type']); ?>
			</dd>
			<dt><?php echo __('Icon'); ?></dt>
			<dd>
				<?php echo $this->Html->icon($taskType['TaskType']['icon']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified') ?></dt>
			<dd>
				<time><?php echo h($taskType['TaskType']['modified']); ?></time>
			</dd>
		</dl>
	</div>
</div>
<ul class="nav nav-tabs nav-tabs-remote">
	<li class="active"><?php echo $this->Html->link(__('Tasks'),
			['controller' => 'tasks', 'action' => 'related', 'task_type_id' => $taskType['TaskType']['id']],
			['data-toggle' => 'tab', 'data-target' => '#tab-tasks-related']); ?></li>
</ul>
<div class="tab-content">
	<div id="tab-tasks-related" class="tab-pane active"></div>
</div>
