<?php $this->Html->addCrumb($this->Html->link(__('Contracts'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-home fa-fw']])); ?>
<?php $this->Html->addCrumb(__('View')); ?>
<?php $this->Html->addCrumb($contract['Contract']['id']); ?>
<div class="toolbar toolbar-default">
	<?php echo $this->Element->btnToolbarReturn(); ?>
	<?php echo $this->Element->btnToolbarAdd(); ?>
	<?php echo $this->Element->btnToolbarEdit($contract['Contract']['id']); ?>
</div>
<div class="row">
	<div class="col-sm-9">
		<div class="row">
			<div class="col-sm-6">
				<?php echo $this->Html->pageHeader(__('Contract'), 'h4'); ?>
				<dl class="dl-table">
					<dt><?php echo __('Contract Type'); ?></dt>
					<dd>
						<?php echo $this->Html->link($contract['ContractType']['type'],
							['controller' => 'contract_types', 'action' => 'view', $contract['ContractType']['id']]); ?>
						&nbsp;
					</dd>
					<dt><?php echo __('Contract Start'); ?></dt>
					<dd>
						<?php echo h($contract['Contract']['start']); ?>
						&nbsp;
					</dd>
					<dt><?php echo __('Contract End'); ?></dt>
					<dd>
						<?php echo h($contract['Contract']['start']); ?>
						&nbsp;
					</dd>
					<dt><?php echo __('Comments'); ?></dt>
					<dd>
						<?php echo h($contract['Contract']['comments']); ?>
						&nbsp;
					</dd>
				</dl>
			</div>
			<div class="col-sm-6">
				<dl class="dl-table">
					<?php echo $this->Html->pageHeader(__('Business'), 'h4'); ?>
					<dt><?php echo __('Business'); ?></dt>
					<dd>
						<?php echo $this->Html->link($contract['Business']['business'],
							['controller' => 'businesses', 'action' => 'view', $contract['Business']['id']]); ?>&nbsp;
					</dd>
					<dt><?php echo __('Firm'); ?></dt>
					<dd>
						<?php echo $this->Html->link($contract['Business']['firm'],
							['controller' => 'businesses', 'action' => 'view', $contract['Business']['id']]); ?>&nbsp;
					</dd>
					<dt><?php echo __('Phones'); ?></dt>
					<dd>
						<?php echo $contract['Business']['phones']; ?>&nbsp;
					</dd>
					<dt><?php echo __('Email'); ?></dt>
					<dd>
						<?php echo $contract['Business']['email']; ?>&nbsp;
					</dd>
					<dt><?php echo __('website'); ?></dt>
					<dd>
						<?php echo $contract['Business']['website']; ?>&nbsp;
					</dd>
				</dl>
			</div>
		</div>
	</div>
</div>
