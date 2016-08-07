<?php $this->Html->addCrumb($this->Html->link(__('Tasks'), ['controller' => 'tasks', 'action' => 'index'],
	['icon' => ['class' => 'fa fa-tasks fa-fw']])); ?>
<?php $this->Html->addCrumb($this->Html->link(__('Tasks Statuses'), ['action' => 'index'])); ?>
<div class="toolbar toolbar-default">
	<?php echo $this->Html->link(__('Add'), ['action' => 'add'],
		['class' => 'btn btn-success btn-sm', 'icon' => 'plus']); ?>
</div>
<div class="table-responsive">
	<table class="table table-hover table-striped small">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('order'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('icon', __('Icon')); ?></th>
			<th><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
			<th><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($taskStatuses as $taskStatus) : ?>
			<tr>
				<td><?php echo h($taskStatus['TaskStatus']['id']); ?>&nbsp;</td>
				<td><?php echo h($taskStatus['TaskStatus']['order']); ?>&nbsp;</td>
				<td><?php echo h($taskStatus['TaskStatus']['status']); ?>&nbsp;</td>
				<td class="text-center"><?php echo $this->Html->icon($taskStatus['TaskStatus']['icon']); ?>&nbsp;</td>
				<td>
					<time><?php echo h($taskStatus['TaskStatus']['modified']) ?></time>
				</td>
				<td>
					<?php echo $this->Element->btnLinkView($taskStatus['TaskStatus']['id']); ?>
					<?php echo $this->Element->btnLinkEdit($taskStatus['TaskStatus']['id']); ?>
					<?php echo $this->Element->btnLinkDelete($taskStatus['TaskStatus']['id']); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>