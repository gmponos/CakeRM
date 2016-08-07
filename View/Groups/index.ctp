<?php $this->Html->addCrumb($this->Html->link(
	__('Groups'),
	['action' => 'index'],
	['icon' => ['class' => 'icon icon-users icon-fw']]
)); ?>
	<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped small">
			<tr>
				<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($groups as $group) : ?>
				<tr>
					<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
					<td>
						<?php echo $this->Element->btnLinkView($group['Group']['id']); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');