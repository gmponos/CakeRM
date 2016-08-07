<div class="logins view">
    <h2><?php echo __('Login'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($login['Login']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link(
				$login['User']['fullname'],
				['controller' => 'users', 'action' => 'view', $login['User']['id']]
			); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Browser'); ?></dt>
		<dd>
			<?php echo h($login['Login']['browser']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IP'); ?></dt>
		<dd>
			<?php echo h($login['Login']['IP']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($login['Login']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>