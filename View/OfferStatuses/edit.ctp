<div class="offerStatuses form">
<?php echo $this->Form->create('OfferStatus'); ?>
	<fieldset>
		<legend><?php echo __('Edit Offer Status'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $this->Form->value('OfferStatus.id')], null, __('Are you sure you want to delete # %s?', $this->Form->value('OfferStatus.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Offer Statuses'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Offers'), ['controller' => 'offers', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Offer'), ['controller' => 'offers', 'action' => 'add']); ?> </li>
	</ul>
</div>
