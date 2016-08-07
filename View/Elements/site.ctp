<nav class="navbar navbar-blue-light" id="navbar-site">
    <div class="container">
        <?= $this->element('site/logo'); ?>
        <?php
		if ($this->Auth->isLoggedIn()) :
			?>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<?= $this->Html->link($this->Auth->user('fullname'), '#',
						['icon' => 'angle-down', 'class' => "dropdown-toggle", "data-toggle" => "dropdown"]); ?>
					<ul class="dropdown-menu">
						<li>
							<?= $this->Html->link(__('Personal'), [
								'admin' => false,
								'controller' => 'users',
								'action' => 'personal',
							], ['icon' => ['class' => 'fa fa-user fa-fw']]); ?>
						</li>
						<li>E
							<?= $this->Html->link(__('Change Password'), [
								'admin' => false,
								'controller' => 'users',
								'action' => 'changePassword',
								$this->Auth->user('id'),
							], ['icon' => ['class' => 'fa fa-key fa-fw']]); ?>
						</li>
						<?php if ($this->Auth->group('id') == 1) : ?>
							<li class="divider hidden-xs"></li>
							<li>
								<?= $this->Html->link('info', '/php_info',
									['icon' => ['class' => 'fa fa-info fa-fw']]) ?>
							</li>
						<?php endif; ?>
						<li class="divider hidden-xs"></li>
						<li><?= $this->Html->link(__('Logout'), [
								'admin' => false,
								'controller' => 'users',
								'action' => 'logout',
							], ['icon' => ['class' => 'fa fa-sign-out fa-fw']]); ?>
						</li>
					</ul>
				</li>
			</ul>
		<?php else : ?>
			<?= $this->element('site/login'); ?>
		<?php endif; ?>
	</div>
</nav>