<?php $this->Html->addCrumb($this->Html->link(__('Repairs'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-gavel fa-fw']])); ?>
	<div class="toolbar toolbar-default">
		<?= $this->element('search'); ?>
		<?= $this->Element->btnToolbarAdd(); ?>
		<div class="btn-group">
			<?= $this->Html->button(__('Mail'), [
				'class' => 'btn btn-warning btn-sm',
				'data-toggle' => 'modal',
				'data-target' => '#modal-email-filters',
				'icon' => ['class' => 'fa fa-plus fa-fw'],
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
		<table class="table table-hover table-limited table-striped small">
			<thead>
				<tr>
					<th><?= $this->Paginator->sort('received'); ?></th>
					<th><?= __('Description'); ?></th>
					<th><?= $this->Paginator->sort('business_id'); ?></th>
					<th><?= $this->Paginator->sort('contact_id'); ?></th>
					<th><?= $this->Paginator->sort('repaired'); ?></th>
					<th><?= $this->Paginator->sort('repaired_user_id', __('Repaired From')); ?></th>
					<th><?= $this->Paginator->sort('sent'); ?></th>
					<th><?= $this->Paginator->sort('price'); ?></th>
					<th><?= __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($repairs as $repair) : ?>
					<tr>
						<td>
							<time><?= h($repair['Repair']['date_received']); ?>&nbsp;</time>
						</td>
						<td>
							<?php
							$options = [];
							$description = $this->Text->autoParagraph($repair['Repair']['description']);
							$short = $this->Text->truncate($description, 100);
							$options = [
								'data-toggle' => 'qtip-popover',
								'data-trigger' => 'mouseover',
								'data-placement' => 'left',
								'data-content' => $description,
							]; ?>
							<?= $this->Html->tag('div', $description, $options); ?>
						</td>
						<td>
							<?= $this->Html->link($repair['Business']['firm'],
								['controller' => 'businesses', 'action' => 'view', $repair['Business']['id']], [
									'class' => 'popover-remote',
									'data-remote' => $this->Html->url([
										'admin' => false,
										'controller' => 'businesses',
										'action' => 'popover_view',
										$repair['Business']['id'],
									]),
								]);
							?>
						</td>
						<td>
							<?= $this->Html->link($repair['Contact']['fullname'],
								['controller' => 'contacts', 'action' => 'view', $repair['Contact']['id']], [
									'class' => 'popover-remote',
									'data-remote' => $this->Html->url([
										'admin' => false,
										'controller' => 'contacts',
										'action' => 'popover_view',
										$repair['Contact']['id'],
									]),
								]);
							?>
						</td>
						<td>
							<time><?= h($repair['Repair']['date_repaired']); ?>&nbsp;</time>
						</td>
						<td><?= h($repair['RepairedUser']['lastname']); ?>&nbsp;</td>
						<td>
							<time><?= h($repair['Repair']['date_sent']); ?>&nbsp;</time>
						</td>
						<td>
							<time><?= h($repair['Repair']['price']); ?>&nbsp;</time>
						</td>
						<td class="actions">
							<?= $this->Element->btnLinkView($repair['Repair']['id']); ?>
							<?= $this->Element->btnLinkEdit($repair['Repair']['id']); ?>
							<?= $this->Element->btnLinkMail($repair['Repair']['id']); ?>
							<?= $this->Element->btnLinkDelete($repair['Repair']['id']); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
