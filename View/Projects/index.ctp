<?php $this->Html->addCrumb($this->Html->link(__('Projects'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-folder-open-o fa-fw']])); ?>
	<div class="toolbar toolbar-default">
		<?= $this->Element->btnToolbarAdd(); ?>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped table-limited small">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('title'); ?></th>
					<th><?php echo $this->Paginator->sort('supervisor_id'); ?></th>
					<th><?php echo $this->Paginator->sort('tasks'); ?></th>
					<th class="text-center"><?php echo $this->Paginator->sort('active'); ?></th>
					<th><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($projects as $project) : ?>
					<tr>
						<td><?php echo h($project['Project']['title']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($project['Supervisor']['fullname'], [
								'controller' => 'users',
								'plugin' => false,
								'action' => 'view',
								$project['Supervisor']['id'],
							]); ?>
						</td>
						<td>
							<?= $this->Html->label(
								__('Actions #%s', $project['Project']['project_action_count']),
								'primary'); ?>
						</td>
						<td class="text-center">
							<?php echo $this->Html->status($project['Project']['active']); ?>
						</td>
						<td>
							<div class="btn-group-nowrap">
								<?php echo $this->Element->btnLinkView($project['Project']['id']); ?>
								<?php echo $this->Element->btnLinkEdit($project['Project']['id']); ?>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
