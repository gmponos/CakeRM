<div class="opportunityStatuses view">
    <h2><?php echo __('Opportunity Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($opportunityStatus['OpportunityStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($opportunityStatus['OpportunityStatus']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($opportunityStatus['OpportunityStatus']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>