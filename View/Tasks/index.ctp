<?php $this->Html->addCrumb($this->Html->link(__('Tasks'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-tasks fa-fw']])); ?>
	<div class="toolbar toolbar-default">
		<?= $this->element('search'); ?>
		<?= $this->Html->link(__('Add'), ['action' => 'add'],
			['class' => 'btn btn-success btn-sm', 'icon' => ['class' => 'fa fa-plus fa-fw']]); ?>
		<div class="btn-group">
			<?= $this->Html->button(__('Filters'), [
				'class' => 'btn btn-primary btn-sm',
				'data-toggle' => 'modal',
				'data-target' => '#modal-search-filters',
				'icon' => ['class' => 'fa fa-filter fa-fw'],
			]); ?>
			<?= $this->Html->button('', [
				'class' => 'btn btn-primary btn-sm dropdown-toggle',
				'data-toggle' => 'dropdown',
				'icon' => 'caret-down',
			]); ?>
			<ul class="dropdown-menu">
				<li><?= $this->Html->link(__('All'), ['action' => 'index'],
						['icon' => ['class' => 'fa fa-tasks fa-fw']]); ?></li>
				<li><?= $this->Html->link(__('My'), ['action' => 'my'],
						['icon' => ['class' => 'fa fa-user fa-fw']]); ?></li>
				<li><?= $this->Html->link(__('Today'), ['action' => 'today'],
						['icon' => ['class' => 'fa fa-calendar fa-fw']]) ?></li>
				<li><?= $this->Html->link(__('Responsible'), ['admin' => false, 'action' => 'responsible'],
						['icon' => ['class' => 'fa fa-eye fa-fw']]) ?></li>
			</ul>
		</div>
		<div class="btn-group">
			<?= $this->Html->button(__('Mail'), [
				'class' => 'btn btn-warning btn-sm',
				'data-toggle' => 'modal',
				'data-target' => '#modal-email-filters',
				'icon' => ['class' => 'fa fa-envelope fa-fw'],
			]); ?>
			<?= $this->Html->button('', [
				'class' => 'btn btn-warning btn-sm dropdown-toggle',
				'icon' => 'caret-down',
				'data-toggle' => 'dropdown',
			]); ?>
			<ul class="dropdown-menu">
				<li>
					<?= $this->Html->link(__('Today'), ['admin' => false, 'action' => 'mailReport'],
						['data-toggle' => 'email', 'icon' => ['class' => 'fa fa-calendar fa-fw']]) ?>
				</li>
			</ul>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped table-limited small">
			<thead>
				<tr>
					<th><?= __('Properties') ?></th>
					<th><?= __('Description') ?></th>
					<th></th>
					<th><?= $this->Paginator->sort('Business.firm', __('Business')) ?></th>
					<th><?= $this->Paginator->sort('Contact.fullname', __('Contact')) ?></th>
					<th><?= $this->Paginator->sort('Task.completed', __('Responsible')) ?></th>
					<th><?= __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tasks as $id => $task) : ?>
					<tr>
						<td class="text-nowrap">
							<?php
							if (!empty($task['TaskType']['id'])) :
								$icon = $task['TaskType']['icon'];
								echo $this->Html->link('', [
									'controller' => 'task_types',
									'action' => 'view',
									$task['TaskType']['id'],
								], [
									'icon' => ['class' => "fa fa-$icon fa-fw"],
									'data-toggle' => 'qtip-tooltip',
									'title' => $task['TaskType']['type'],
								]);
							endif;
							?>
							<?php $icon = $task['TaskStatus']['icon']; ?>
							<?= $this->Html->link('', [
								'controller' => 'task_statuses',
								'action' => 'view',
								$task['TaskStatus']['id'],
							], [
								'icon' => ['class' => "fa fa-$icon fa-fw"],
								'data-toggle' => 'qtip-tooltip',
								'title' => $task['TaskStatus']['status'],
							])
							?>
						</td>
						<td>
							<?php
							$description = $this->Text->autoParagraph($task['Task']['description']);
							$short = $this->Text->truncate($description, 100);
							?>
							<?= $this->Html->tag('div', $short, [
								'data-toggle' => 'qtip-popover',
								'data-trigger' => 'mouseover',
								'data-placement' => 'left',
								'data-content' => $description,
							]); ?>
							<div class="visible-lg">
								<span class="text-muted small">
									<?php $updated = $this->Time->nice($task['Task']['date_updated'], null, '%b %d'); ?>
									<?= __('Updated by %s on %s', $task['UpdatedUser']['lastname'], $updated); ?>
								</span> &nbsp;
								<?php
								if (!empty($task['TaskPriority']['priority'])) :
									echo ($this->Html->label($task['TaskPriority']['priority'], 'danger'));
								endif;
								?>
							</div>
						</td>
						<td class="text-nowrap text-center">
							<?php
							if ($task['Task']['task_action_count'] != 0) :
								echo $this->Html->icon('comments', $task['Task']['task_action_count']);
							endif;
							?>
						</td>
						<td>
							<?= $this->Html->link($task['Business']['firm'],
								['controller' => 'businesses', 'action' => 'view', $task['Business']['id']], [
									'class' => 'popover-remote',
									'data-remote' => $this->Html->url([
										'admin' => false,
										'controller' => 'businesses',
										'action' => 'popover_view',
										$task['Business']['id'],
									]),
								]);
							?>
						</td>
						<td>
							<?= $this->Html->link($task['Contact']['fullname'],
								['controller' => 'contacts', 'action' => 'view', $task['Contact']['id']], [
									'class' => 'popover-remote',
									'data-remote' => $this->Html->url([
										'admin' => false,
										'controller' => 'contacts',
										'action' => 'popover_view',
										$task['Contact']['id'],
									]),
								]);
							?>
						</td>
						<td>
							<div>
								<?= $this->Html->link($task['ResponsibleUser']['lastname'], [
									'controller' => 'users',
									'plugin' => false,
									'action' => 'view',
									$task['ResponsibleUser']['id'],
								]); ?>
							</div>
							<time><?= $task['Task']['completed']; ?></time>
						</td>
						<td class="text-nowrap">
							<?= $this->Element->btnLinkView($task['Task']['id']); ?>
							<?= $this->Element->btnLinkEdit($task['Task']['id']); ?>
							<?= $this->Element->btnLinkMail($task['Task']['id'], '',
								(!$task['Task']['emailed'] ? [] : ['class' => 'btn btn-warning btn-xs']));
							?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');

echo $this->element('modals/tasks/email');
echo $this->element('modals/tasks/search');
echo $this->element('modals/tasks/export');
