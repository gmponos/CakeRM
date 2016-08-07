<?php $this->Html->addCrumb($this->Html->link(__('Tasks'), ['controller' => 'tasks', 'action' => 'index'], ['icon' => ['class' => 'fa fa-tasks fa-fw']]));?>
<?php $this->Html->addCrumb($this->Html->link(__('Task Priorities'), ['action' => 'index']));?>
<div class="table-responsive">
	<table class="table table-hover table-striped small">
		<tr>
			<th><?php echo __('Id')?></th>
			<th><?php echo __('Order')?></th>
			<th><?php echo __('Priority')?></th>
			<th><?php echo __('Icon')?></th>
			<th><?php echo __('Modified')?></th>
			<th><?php echo __('Actions')?></th>
		</tr>
		<?php foreach ($taskPriorities as $taskPriority) :?>
			<tr>
				<td><?php echo h($taskPriority['TaskPriority']['id']);?>&nbsp;</td>
				<td><?php echo h($taskPriority['TaskPriority']['order']);?>&nbsp;</td>
				<td><?php echo h($taskPriority['TaskPriority']['priority']);?>&nbsp;</td>
				<td><?php echo $this->Html->Icon($taskPriority['TaskPriority']['icon']);?>&nbsp;</td>
				<td><time><?php echo h($taskPriority['TaskPriority']['modified']);?></time></td>
				<td class="actions">
						<?php echo $this->Element->btnLinkView($taskPriority['TaskPriority']['id']);?>
						<?php echo $this->Element->btnLinkEdit($taskPriority['TaskPriority']['id']);?>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>
