<?php $this->Html->addCrumb($this->Html->link(__('Banks'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-bank fa-fw']])); ?>
<div class="toolbar toolbar-default">
	<?= $this->Element->btnToolbarAdd(); ?>
</div>
<?= $this->Html->pageHeader('Bank Account', 'h4'); ?>
<div class="row">
	<div class="col-lg-9">
		<dl class="dl-table">
			<dt><?php echo __('Bank'); ?></dt>
			<dd>
				<?php echo $this->Html->link($bankAccount['Bank']['name'],
					['controller' => 'banks', 'action' => 'view', $bankAccount['Bank']['id']]); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Bank Account'); ?></dt>
			<dd>
				<?php echo h($bankAccount['BankAccount']['bank_account']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('IBAN'); ?></dt>
			<dd>
				<?php echo h($bankAccount['BankAccount']['IBAN']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Holdersaccount'); ?></dt>
			<dd>
				<?php echo h($bankAccount['BankAccount']['holdersaccount']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Business'); ?></dt>
			<dd>
				<?php echo h($bankAccount['BankAccount']['business']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
</div>