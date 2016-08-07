<div class="table-responsive">
	<table class="table table-hover table-striped small">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('order'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($offerTypes as $offerType) : ?>
	<tr>
		<td><?php echo h($offerType['OfferType']['id']); ?>&nbsp;</td>
		<td><?php echo h($offerType['OfferType']['type']); ?>&nbsp;</td>
		<td><?php echo h($offerType['OfferType']['order']); ?>&nbsp;</td>
		<td><?php echo h($offerType['OfferType']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $offerType['OfferType']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $offerType['OfferType']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $offerType['OfferType']['id']], null, __('Are you sure you want to delete # %s?', $offerType['OfferType']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');