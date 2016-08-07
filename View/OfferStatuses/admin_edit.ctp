<div class="offerStatuses form">
<?php echo $this->Form->create('OfferStatus'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Offer Status'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>