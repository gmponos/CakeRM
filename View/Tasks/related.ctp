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
			<?= $this->Html->link('', ['controller' => 'tasks', 'action' => 'add'],
				['class' => 'btn btn-success btn-xs', 'icon' => 'plus']); ?>
		</div>
		<div class="table-responsive">
			<table class="table table-hover table-limited table-striped small">
				<thead>
					<tr>
						<th></th>
						<th><?= __('Description') ?></th>
						<th><?= __('Business') ?></th>
						<th><?= __('Contact') ?></th>
						<th></th>
						<th><?= __('Duration') ?></th>
						<th><?= __('Completed') ?></th>
						<th><?= __('Actions') ?></th>
					</tr>
				</thead>
				<?php if (!empty($tasks)) : ?>
					<tbody>
						<?php foreach ($tasks as $task) : ?>
							<tr>
								<td class="text-center"><?= $this->Html->link('',
										['controller' => 'task_types', 'action' => 'view', $task['TaskType']['id']],
										['icon' => $task['TaskType']['icon']]); ?></td>
								<td><?= $task['Task']['description'] ?></td>
								<td><?= (empty($task['Business']['firm']) ? '' : $task['Business']['firm']) ?>
									&nbsp;</td>
								<td><?= (empty($task['Contact']['fullname']) ? '' : $task['Contact']['fullname']) ?>
									&nbsp;</td>
								<td class="text-center"><?= $this->Html->link('', [
										'controller' => 'task_statuses',
										'action' => 'view',
										$task['TaskStatus']['id'],
									], ['icon' => $task['TaskStatus']['icon']]); ?></td>
								<td>
									<time><?= $task['Task']['duration']; ?>&nbsp;</time>
								</td>
								<td>
									<div><?= $this->Html->link($task['ResponsibleUser']['lastname'], [
											'controller' => 'users',
											'plugin' => false,
											'action' => 'view',
											$task['ResponsibleUser']['id'],
										]); ?></div>
									<time><?= $task['Task']['completed']; ?>&nbsp;</time>
								</td>
								<td class="actions">
									<?= $this->Element->btnLinkView($task['Task']['id']); ?>
									<?= $this->Element->btnLinkEdit($task['Task']['id']); ?>
									<?= $this->Element->btnLinkMail($task['Task']['id']); ?>
									<?= $this->Element->btnLinkDelete($task['Task']['id']); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				<?php endif; ?>
			</table>
		</div>
	</div>
	<?php //$this->element('pagination/pagination');  ?>
	<?php // echo $this->Js->writeBuffer();?>
</div>