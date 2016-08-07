<div class="offerTypes form">
<?php echo $this->Form->create('OfferType'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Offer Type'); ?></legend>
	<?php
		echo $this->Form->input('type');
		echo $this->Form->input('order');
		echo $this->Form->input('Offer');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>