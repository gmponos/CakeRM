<?php $this->Html->addCrumb($this->Html->link(__('Businesses'), ['controller' => 'businesses', 'action' => 'index'],
	['icon' => ['class' => 'fa fa-building-o fa-fw']])); ?>
<?php $this->Html->addCrumb($this->Html->link(__('Tax Offices'), ['action' => 'index'])); ?>

	<div class="toolbar toolbar-default">
		<?php echo $this->Html->link(__('Add'), ['action' => 'add'],
			['class' => 'btn btn-success btn-sm', 'icon' => 'plus']); ?>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped small">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($taxoffices as $taxoffice) : ?>
					<tr>
						<td><?php echo h($taxoffice['Taxoffice']['name']) ?>&nbsp;</td>
						<td class="text-nowrap">
							<?php echo $this->Element->btnLinkView($taxoffice['Taxoffice']['id']); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php
echo $this->element('pagination/pagination');
