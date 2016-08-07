<?php $this->Html->addCrumb($this->Html->link(__('Tasks'), ['controller' => 'tasks', 'action' => 'index'],
	['icon' => ['class' => 'fa fa-tasks fa-fw']])); ?>
<?php $this->Html->addCrumb($this->Html->link(__('Tasks Types'), ['action' => 'index'])); ?>
<div class="toolbar toolbar-default">
	<?= $this->Element->btnToolbarAdd(); ?>
</div>
<div class="table-responsive">
	<table class="table table-hover table-striped small">
		<thead>
			<tr>
				<th><?php echo __('id'); ?></th>
				<th class="hidden-xs"><?php echo __('Order'); ?></th>
				<th><?php echo __('Type'); ?></th>
				<th class="hidden-xs"><?php echo __('Icon'); ?></th>
				<th><?php echo __('Modified'); ?></th>
				<th><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($taskTypes as $taskType) : ?>
				<tr>
					<td><?php echo h($taskType['TaskType']['id']); ?>&nbsp;</td>
					<td class="hidden-xs"><?php echo h($taskType['TaskType']['order']); ?>&nbsp;</td>
					<td><?php echo h($taskType['TaskType']['type']); ?>&nbsp;</td>
					<td class="hidden-xs"><?php echo h($taskType['TaskType']['icon']); ?>&nbsp;</td>
					<td>
						<time><?php echo h($taskType['TaskType']['modified']); ?></time>
					</td>
					<td class="actions">
						<?php echo $this->Element->btnLinkView($taskType['TaskType']['id']); ?>
						<?php echo $this->Element->btnLinkEdit($taskType['TaskType']['id']); ?>
						<?php echo $this->Element->btnLinkDelete($taskType['TaskType']['id']); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
