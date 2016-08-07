<?php $this->Html->addCrumb($this->Html->link(__('Contracts'), ['controller' => 'contracts', 'action' => 'index'],
	['icon' => 'file-text-o'])); ?>
<?php $this->Html->addCrumb($this->Html->link(__('Contract Types'), ['action' => 'index'])); ?>
<?php $this->Html->addCrumb(__('View')); ?>
<?php $this->Html->addCrumb($contractType['ContractType']['id']); ?>
<div class="toolbar toolbar-default">
	<?php echo $this->Element->btnToolbarAdd(); ?>
	<?php echo $this->Element->btnToolbarEdit($contractType['ContractType']['id']); ?>
</div>
<?php echo $this->Html->pageHeader(__('Contract Type'), 'h4'); ?>
<div class="row">
	<div class="col-sm-9 col-md-10">
		<dl class="dl-table">
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($contractType['ContractType']['id']); ?>
			</dd>
			<dt><?php echo __('Type'); ?></dt>
			<dd>
				<?php echo h($contractType['ContractType']['type']); ?>
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($contractType['ContractType']['modified']); ?>
			</dd>
		</dl>
		<ul class="nav nav-tabs nav-tabs-remote">
			<li class="active"><?php echo $this->Html->link(__('Contracts'), [
					'controller' => 'contracts',
					'action' => 'related',
					'contract_type_id' => $contractType['ContractType']['id'],
				], ['data-toggle' => 'tab', 'data-target' => '#tab-contracts-related']); ?></li>
		</ul>
		<div class="tab-content">
			<div id="tab-contracts-related" class="tab-pane active"></div>
		</div>
	</div>
</div>
