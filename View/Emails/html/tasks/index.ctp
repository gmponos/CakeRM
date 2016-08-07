<div class="tasks index">
    <table>
        <tr>
            <th><?php echo __('Date'); ?></th>
			<th><?php echo __('Description'); ?></th>
			<th><?php echo __('Business'); ?></th>
			<th><?php echo __('Contact'); ?></th>
			<th><?php echo __('Type'); ?></th>
			<th><?php echo __('Status'); ?></th>
			<th><?php echo __('Duration'); ?></th>
			<th><?php echo __('Completed'); ?></th>
		</tr>
		<?php foreach ($tasks as $task) : ?>
			<tr>
				<td>
					<div><?php echo $task['CreatedUser']['lastname']; ?></div>
					<div>
						<time><?php echo h($task['Task']['date_created']) ?></time>
					</div>
				</td>
				<td><?php echo nl2br($task['Task']['title']); ?></td>
				<td>
					<div><?php echo $this->Html->link($task['Business']['firm'],
							['controller' => 'businesses', 'action' => 'view', $task['Business']['id']]); ?></div>
					<div><?php echo $task['Business']['business']; ?></div>
					<?php if (!empty($task['Business']['phones'])) : ?>
						<div>
							<strong><?php echo __('Tel:') ?></strong>
							<?php echo $task['Business']['phones'] ?>
						</div>
					<?php endif; ?>
				</td>
				<td>
					<?php echo $this->Html->link($task['Contact']['fullname'], [
						'controller' => 'contacts',
						'action' => 'view',
						$task['Contact']['id'],
						'full_base' => true,
					]); ?>
					<?php if (!empty($task['Contact']['phones'])) : ?>
						<div>
							<strong><?php echo __('Tel:') ?></strong>
							<?php echo $task['Contact']['phones'] ?>
						</div>
					<?php endif; ?>
				</td>
				<td><?php echo $task['TaskType']['type']; ?> &nbsp; </td>
				<td><?php echo $task['TaskStatus']['status']; ?> &nbsp; </td>
				<td>
					<time><?php echo $task['Task']['duration']; ?> &nbsp; </time>
				</td>
				<td>
					<div><?php echo $task['ResponsibleUser']['lastname']; ?></div>
					<div>
						<time><?php echo h($task['Task']['date_completed']) ?>&nbsp;</time>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>