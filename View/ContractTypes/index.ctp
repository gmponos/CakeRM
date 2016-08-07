<?php $this->Html->addCrumb($this->Html->link(__('Contracts'), ['controller' => 'contracts', 'action' => 'index'], ['icon' => 'file-text-o']));?>
<?php $this->Html->addCrumb($this->Html->link(__('Contract Types'), ['action' => 'index']));?>
<div class="table-responsive">
	<table class="table table-hover table-striped small">
		<tr>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo __('Actions');?></th>
		</tr>
		<?php foreach ($contractTypes as $contractType) :?>
			<tr>
				<td><?php echo h($contractType['ContractType']['type']);?>&nbsp;</td>
				<td>
					<div class="btn-group-nowrap">
						<?php echo $this->Element->btnLinkView($contractType['ContractType']['id']);?>
					</div>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>