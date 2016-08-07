<?php $this->Html->addCrumb($this->Html->link(__('Businesses'), ['controller' => 'businesses', 'action' => 'index'],
	['icon' => ['class' => 'fa fa-building-o fa-fw']])); ?>
<?php $this->Html->addCrumb($this->Html->link(__('Business Types'), ['action' => 'index'])); ?>
	<div class="toolbar toolbar-default">
		<?php echo $this->element('search'); ?>
		<?= $this->Element->btnToolbarAdd(); ?>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped small">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('type'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($businessTypes as $businessType) : ?>
					<tr>
						<td><?php echo h($businessType['BusinessType']['type']) ?></td>
						<td class="actions">
							<?php echo $this->Element->btnLinkView($businessType['BusinessType']['id']); ?>
							<?php echo $this->Element->btnLinkEdit($businessType['BusinessType']['id']); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
