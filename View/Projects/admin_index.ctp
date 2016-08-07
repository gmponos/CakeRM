<?php $this->Html->addCrumb($this->Html->link(__('Projects'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-folder-open-o fa-fw']])); ?>
	<div class="toolbar toolbar-default">
		<?= $this->Element->btnToolbarAdd(); ?>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped table-limited small">
			<thead>
				<tr>
					<th><?= $this->Paginator->sort('title'); ?></th>
					<th><?= $this->Paginator->sort('supervisor_id'); ?></th>
					<th><?= $this->Paginator->sort('ProjectActions.id', __('Actions')); ?></th>
					<th class="text-center"><?= $this->Paginator->sort('active'); ?></th>
					<th><?= $this->Paginator->sort('created'); ?></th>
					<th><?= $this->Paginator->sort('updated'); ?></th>
					<th><?= __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($projects as $project) : ?>
					<tr>
						<td><?= h($project['Project']['title']); ?>&nbsp;</td>
						<td>
							<?= $this->Html->link($project['Supervisor']['fullname'], [
								'controller' => 'users',
								'plugin' => false,
								'action' => 'view',
								$project['Supervisor']['id'],
							]); ?>
						</td>
						<td>
							<?= $this->Html->label(__('Actions #%s', $project['Project']['project_action_count']),
								'primary'); ?>
						</td>
						<td class="text-center">
							<?= $this->Html->status($project['Project']['active']); ?>
						</td>
						<td>
							<time><?= h($project['Project']['created']); ?></time>
						</td>
						<td>
							<time><?= h($project['Project']['updated']); ?></time>
						</td>
						<td>
							<?= $this->Element->btnLinkView($project['Project']['id']); ?>
							<?= $this->Element->btnLinkEdit($project['Project']['id']); ?>
							<?= $this->Element->btnLinkDelete($project['Project']['id']); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
