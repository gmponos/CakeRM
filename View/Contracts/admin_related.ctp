<div class="table-responsive">
	<table class="table table-hover table-striped table-limited small">
		<tr>
			<th><?php echo __('id');?></th>
			<th><?php echo __('contract_type_id');?></th>
			<th><?php echo __('start');?></th>
			<th><?php echo __('end');?></th>
			<th><?php echo __('duration');?></th>
			<th><?php echo __('Actions');?></th>
		</tr>
		<?php foreach ($contracts as $contract) :?>
			<tr>
				<td><?php echo $this->Html->link($contract['Business']['firm'], ['controller' => 'businesses', 'action' => 'view', $contract['Business']['id']]);?></td>
				<td>
					<?php echo $this->Html->link($contract['ContractType']['type'], ['controller' => 'contract_types', 'action' => 'view', $contract['ContractType']['id']]);?>
				</td>
				<td><?php echo h($contract['Contract']['start']);?>&nbsp;</td>
				<td><?php echo h($contract['Contract']['end']);?>&nbsp;</td>
				<td><?php echo $this->Html->label(__('%s Days', $contract['Contract']['duration']), 'primary');?>&nbsp;</td>
				<td>
					<div class="btn-group-nowrap">
						<?php echo $this->Element->btnLinkView($contract['Contract']['id']);?>
						<?php echo $this->Element->btnLinkEdit($contract['Contract']['id']);?>
					</div>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>