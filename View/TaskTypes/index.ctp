<?php $this->Html->addCrumb($this->Html->link(__('Tasks'), ['controller' => 'tasks', 'action' => 'index'],
	['icon' => ['class' => 'fa fa-tasks fa-fw']])); ?>
<?php $this->Html->addCrumb($this->Html->link(__('Tasks Types'), ['action' => 'index'])); ?>
<div class="table-responsive">
	<table class="table table-hover table-striped small">
		<thead>
			<tr>
				<th><?php echo __('Type'); ?></th>
				<th><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($taskTypes as $taskType) : ?>
				<tr>
					<td><?php echo h($taskType['TaskType']['type']); ?></td>
					<td>
						<?php echo $this->Element->btnLinkView($taskType['TaskType']['id']); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>