<div id="TasksRelated">
    <?php
	//	$this->Paginator->options(array(
	//		'url' => array_merge(array(
	//				'controller' => 'tasks',
	//				'action' => 'related'),
	//
	//			$this->request->params['named']
	//		),
	//		'update' => '#TasksRelated',
	//		'evalScripts' => true
	//	));
	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php echo $this->Html->link('', ['controller' => 'tasks', 'action' => 'add'],
				['class' => 'btn btn-success btn-xs', 'icon' => 'plus']); ?>
		</div>
		<div class="table-responsive">
			<table class="table table-hover table-limited table-striped small">
				<thead>
					<tr>
						<th></th>
						<th><?php echo __('Description') ?></th>
						<th><?php echo __('Business') ?></th>
						<th><?php echo __('Contact') ?></th>
						<th></th>
						<th><?php echo __('Duration') ?></th>
						<th><?php echo $this->Paginator->sort('Task.completed', __('Completed')) ?></th>
						<th><?php echo __('Actions') ?></th>
					</tr>
				</thead>
				<?php if (!empty($tasks)) : ?>
					<tbody>
						<?php foreach ($tasks as $task) : ?>
							<tr>
								<td class="text-center"><?php echo $this->Html->link('',
										['controller' => 'task_types', 'action' => 'view', $task['TaskType']['id']],
										['icon' => $task['TaskType']['icon']]); ?></td>
								<td><?php echo $task['Task']['description'] ?></td>
								<td><?php echo (empty($task['Business']['firm']) ? '' : $task['Business']['firm']) ?>
									&nbsp;</td>
								<td><?php echo (empty($task['Contact']['fullname']) ? '' : $task['Contact']['fullname']) ?>
									&nbsp;</td>
								<td class="text-center"><?php echo $this->Html->link('', [
										'controller' => 'task_statuses',
										'action' => 'view',
										$task['TaskStatus']['id'],
									], ['icon' => $task['TaskStatus']['icon']]); ?></td>
								<td>
									<time><?php echo $task['Task']['duration']; ?>&nbsp;</time>
								</td>
								<td>
									<div><?php echo $this->Html->link($task['ResponsibleUser']['lastname'], [
											'controller' => 'users',
											'plugin' => false,
											'action' => 'view',
											$task['ResponsibleUser']['id'],
										]); ?></div>
									<time><?php echo $task['Task']['completed']; ?>&nbsp;</time>
								</td>
								<td class="actions">
									<?php echo $this->Element->btnLinkView($task['Task']['id']); ?>
									<?php echo $this->Element->btnLinkEdit($task['Task']['id']); ?>
									<?php echo $this->Element->btnLinkMail($task['Task']['id']); ?>
									<?php echo $this->Element->btnLinkDelete($task['Task']['id']); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				<?php endif; ?>
			</table>
		</div>
	</div>
	<?php echo $this->element('pagination/pagination-related'); ?>
	<?php // echo $this->Js->writeBuffer();?>
</div>