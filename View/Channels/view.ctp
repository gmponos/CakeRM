<div class="channels view">
    <h2><?php echo __('Channel'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($channel['Channel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Channel'); ?></dt>
		<dd>
			<?php echo h($channel['Channel']['channel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($channel['Channel']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>