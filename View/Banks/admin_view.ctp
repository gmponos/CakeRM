<?= $this->Html->pageHeader(__('Bank'), 'h4'); ?>
<div class="row">
	<div class="col-sm-9">
		<dl class="dl-table">
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($bank['Bank']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Name'); ?></dt>
			<dd>
				<?php echo h($bank['Bank']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($bank['Bank']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
</div>