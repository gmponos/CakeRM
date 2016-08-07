<dl class="dl-horizontal dl-popover small">
    <dt><?php echo __('Phones'); ?></dt>
	<dd>
		<?php echo h($business['Business']['phones']); ?>&nbsp;
	</dd>
	<?php if (!empty($business['Business']['email'])) : ?>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($business['Business']['email']); ?>&nbsp;
		</dd>
	<?php endif; ?>
	<?php if (!empty($business['Business']['website'])) : ?>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($business['Business']['website']); ?>&nbsp;
		</dd>
	<?php endif; ?>
	<?php if (!empty($business['BusinessType']['type'])) : ?>
		<dt><?php echo __('Business Type'); ?></dt>
		<dd>
			<?php echo $business['BusinessType']['type']; ?>&nbsp;
		</dd>
	<?php endif; ?>
	<dt><?php echo __('Afm'); ?></dt>
	<dd>
		<?php echo h($business['Business']['afm']); ?>&nbsp;
	</dd>
	<dt><?php echo __('Taxoffice'); ?></dt>
	<dd>
		<?php echo $business['Taxoffice']['name']; ?>&nbsp;
	</dd>
	<dt><?php echo __('State'); ?></dt>
	<dd>
		<?php echo $business['State']['name'] ?> &nbsp;
	</dd>
	<dt><?php echo __('City'); ?></dt>
	<dd>
		<?php echo $business['City']['name']; ?> &nbsp;
	</dd>
	<dt><?php echo __('Address'); ?></dt>
	<dd>
		<?php echo h($business['Business']['address']); ?>&nbsp;
	</dd>
</dl>