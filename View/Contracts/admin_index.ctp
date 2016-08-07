<?php $this->Html->addCrumb($this->Html->link(__('Contracts'), ['action' => 'index'], ['icon' => 'file-text-o'])); ?>
	<div class="toolbar toolbar-default">
		<?= $this->element('search'); ?>
		<?= $this->Element->btnToolbarAdd(); ?>
		<div class="btn-group">
			<?= $this->Html->button(__('Filters'), [
				'class' => 'btn btn-primary btn-sm',
				'data-toggle' => 'modal',
				'data-target' => '#modal-index-filters',
				'icon' => 'filter',
			]); ?>
			<?= $this->Html->button('', [
				'class' => 'btn btn-primary btn-sm dropdown-toggle',
				'data-toggle' => 'dropdown',
				'icon' => 'caret-down',
			]); ?>
			<ul class="dropdown-menu">
				<li><?= $this->Html->link(__('Expired'), ['action' => 'expired'],
						['icon' => ['class' => 'fa fa-ban fa-fw']]) ?></li>
				<li><?= $this->Html->link(__('Active'), ['action' => 'active'],
						['icon' => ['class' => 'fa fa-check-circle fa-fw']]) ?></li>
			</ul>
		</div>
		<div class="btn-group">
			<?= $this->Html->link(__('Export'), ['action' => 'export', 'admin' => false],
				['class' => 'btn btn-primary btn-sm', 'icon' => 'bolt']); ?>
			<?= $this->Html->button('', [
				'class' => 'btn btn-primary btn-sm dropdown-toggle',
				'data-toggle' => 'dropdown',
				'icon' => 'caret-down',
			]); ?>
			<ul class="dropdown-menu">
				<li><?= $this->Html->link(__('Expired'), ['action' => 'exportExpired', 'admin' => false],
						['icon' => ['class' => 'fa fa-ban fa-fw']]) ?></li>
				<li><?= $this->Html->link(__('Active'), ['action' => 'exportActive', 'admin' => false],
						['icon' => ['class' => 'fa fa-check-circle fa-fw']]) ?></li>
			</ul>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped table-limited small">
			<thead>
				<tr>
					<th><?= $this->Paginator->sort('business_id'); ?></th>
					<th><?= $this->Paginator->sort('contract_type_id'); ?></th>
					<th><?= $this->Paginator->sort('start'); ?></th>
					<th><?= $this->Paginator->sort('end'); ?></th>
					<th><?= $this->Paginator->sort('duration'); ?></th>
					<th><?= __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($contracts as $contract) : ?>
					<tr>
						<td><?= $this->Html->link($contract['Business']['firm'], [
								'controller' => 'businesses',
								'action' => 'view',
								$contract['Business']['id'],
							]); ?>
						</td>
						<td>
							<?= $this->Html->link($contract['ContractType']['type'], [
								'controller' => 'contract_types',
								'action' => 'view',
								$contract['ContractType']['id'],
							]); ?>
						</td>
						<td><?= h($contract['Contract']['start']); ?>&nbsp;</td>
						<td><?= h($contract['Contract']['end']); ?>&nbsp;</td>
						<td><?= $this->Html->label(__('%s Days', $contract['Contract']['duration']), 'primary'); ?>
							&nbsp;</td>
						<td class="actions">
							<?= $this->Element->btnLinkView($contract['Contract']['id']); ?>
							<?= $this->Element->btnLinkEdit($contract['Contract']['id']); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
