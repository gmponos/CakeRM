<?php $this->Html->addCrumb($this->Html->link(__('Tasks'), ['controller' => 'tasks', 'action' => 'index'],
	['icon' => ['class' => 'fa fa-tasks fa-fw']])); ?>
<?php $this->Html->addCrumb($this->Html->link(__('Task Priorities'), ['action' => 'index'])); ?>
<div class="table-responsive">
	<table class="table table-hover table-striped small">
		<tr>
			<th><?php echo __('Priority') ?></th>
			<th><?php echo __('Actions') ?></th>
		</tr>
		<?php foreach ($taskPriorities as $taskPriority) : ?>
			<tr>
				<td><?php echo h($taskPriority['TaskPriority']['priority']); ?>&nbsp;</td>
				<td class="text-nowrap">
					<?php echo $this->Element->btnLinkView($taskPriority['TaskPriority']['id']); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
