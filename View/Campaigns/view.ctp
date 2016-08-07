<div class="campaigns view">
    <h2><?php echo __('Campaign'); ?></h2>
	<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Campaign'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['campaign']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>