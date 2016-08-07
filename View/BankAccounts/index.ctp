<?php $this->Html->addCrumb($this->Html->link(__('Banks'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-bank fa-fw']])); ?>
	<div class="toolbar toolbar-default">
		<?= $this->Element->btnToolbarAdd(); ?>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped small">
			<thead>
				<tr>
					<th><?= $this->Paginator->sort('bank_id'); ?></th>
					<th><?= $this->Paginator->sort('bank_account'); ?></th>
					<th><?= $this->Paginator->sort('IBAN'); ?></th>
					<th><?= $this->Paginator->sort('holdersaccount', __("Holders Account")); ?></th>
					<th class="text-center"><?= $this->Paginator->sort('business', __('Business Account')); ?></th>
					<th><?= __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($bankAccounts as $bankAccount) : ?>
					<tr>
						<td>
							<?= $this->Html->link($bankAccount['Bank']['name'],
								['controller' => 'banks', 'action' => 'view', $bankAccount['Bank']['id']]); ?>
						</td>
						<td><?= h($bankAccount['BankAccount']['bank_account']); ?>&nbsp;</td>
						<td><?= h($bankAccount['BankAccount']['IBAN']); ?>&nbsp;</td>
						<td><?= h($bankAccount['BankAccount']['holdersaccount']); ?>&nbsp;</td>
						<td class="text-center"><?= $this->Html->status($bankAccount['BankAccount']['business']); ?>
							&nbsp;</td>
						<td class="actions">
							<?= $this->Element->btnLinkView($bankAccount['BankAccount']['id']); ?>
							<?= $this->Element->btnLinkEdit($bankAccount['BankAccount']['id']); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
