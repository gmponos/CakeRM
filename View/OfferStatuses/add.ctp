<div class="offerStatuses form">
<?php echo $this->BootstrapForm->create('OfferStatus'); ?>
		<legend><?php echo __('Add Offer Status'); ?></legend>
	<?php
		echo $this->Form->input('status');
	?>
<?php echo $this->Form->end(__('Submit')); ?>
</div>