<?php $this->Html->addCrumb($this->Html->link(
	__('Groups'),
	['action' => 'index'],
	['icon' => ['class' => 'icon icon-users icon-fw']]
)); ?>
	<div class="toolbar toolbar-default">
		<?php echo $this->Html->link(
			__('Add'),
			['action' => 'add'],
			['class' => 'btn btn-success btn-sm', 'icon' => 'plus']
		); ?>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped small">
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th><?php echo $this->Paginator->sort('created'); ?></th>
				<th><?php echo $this->Paginator->sort('updated'); ?></th>
				<th><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($groups as $group) : ?>
				<tr>
					<td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
					<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
					<td><?php echo h($group['Group']['created']); ?>&nbsp;</td>
					<td><?php echo h($group['Group']['updated']); ?>&nbsp;</td>
					<td>
						<div class="btn-group-nowrap">
							<?php echo $this->Element->btnLinkView($group['Group']['id']); ?>
							<?php echo $this->Element->btnLinkEdit($group['Group']['id']); ?>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');