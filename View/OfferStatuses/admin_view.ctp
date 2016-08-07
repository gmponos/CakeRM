<div class="offerStatuses view">
<h2><?php echo __('Offer Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($offerStatus['OfferStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($offerStatus['OfferStatus']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($offerStatus['OfferStatus']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>