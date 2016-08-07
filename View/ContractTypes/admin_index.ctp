<?php $this->Html->addCrumb($this->Html->link(__('Contracts'), ['controller' => 'contracts', 'action' => 'index'], ['icon' => 'file-text-o']));?>
<?php $this->Html->addCrumb($this->Html->link(__('Contract Types'), ['action' => 'index']));?>
<div class="toolbar toolbar-default">
	<?php echo $this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm', 'icon' => 'plus']);?>
</div>
<div class="table-responsive">
	<table class="table table-hover table-striped small">
		<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo __('Actions');?></th>
		</tr>
		<?php foreach ($contractTypes as $contractType) :?>
			<tr>
				<td><?php echo h($contractType['ContractType']['id']);?>&nbsp;</td>
				<td><?php echo h($contractType['ContractType']['type']);?>&nbsp;</td>
				<td><?php echo h($contractType['ContractType']['modified']);?>&nbsp;</td>
				<td>
					<div class="btn-group-nowrap">
						<?php echo $this->Element->btnLinkView($contractType['ContractType']['id']);?>
						<?php echo $this->Element->btnLinkEdit($contractType['ContractType']['id']);?>
						<?php echo $this->Element->btnLinkDelete($contractType['ContractType']['id']);?>
					</div>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>