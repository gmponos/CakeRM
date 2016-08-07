<div class="panel panel-default">
	<div class="panel-body">
		<?php echo $this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm', 'icon' => 'plus']);?>
	</div>
</div>
<h4><?php echo __('Offer Statuses');?></h4>
<div class="table-responsive">
	<table class="table table-hover table-striped small">
		<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo __('Actions');?></th>
		</tr>
		<?php foreach ($offerStatuses as $offerStatus) :?>
			<tr>
				<td><?php echo h($offerStatus['OfferStatus']['id']);?>&nbsp;</td>
				<td><?php echo h($offerStatus['OfferStatus']['status']);?>&nbsp;</td>
				<td><?php echo h($offerStatus['OfferStatus']['modified']);?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link(__('View'), ['action' => 'view', $offerStatus['OfferStatus']['id']]);?>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
