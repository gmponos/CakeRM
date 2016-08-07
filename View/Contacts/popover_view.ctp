<dl class="dl-horizontal dl-popover small">
    <dt><?php echo __('Contact Type'); ?></dt>
	<dd>
		<?php echo h($contact['ContactType']['type']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Phones'); ?></dt>
	<dd>
		<?php echo h($contact['Contact']['phones']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Email'); ?></dt>
	<dd>
		<?php echo h($contact['Contact']['email']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('State'); ?></dt>
	<dd>
		<?php echo h($contact['State']['name']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('City'); ?></dt>
	<dd>
		<?php echo $contact['City']['name']; ?>
		&nbsp;
	</dd>
</dl>