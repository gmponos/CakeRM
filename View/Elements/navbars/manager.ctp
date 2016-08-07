<div class="navbar-header">
    <?php echo $this->Html->link(configure::read('Site.brand'), '/dashboard',
		['class' => 'navbar-brand', 'icon' => ['class' => 'fa fa-bar-chart-o']]); ?>
</div>
<ul class="nav navbar-nav">
	<li><?php echo $this->Html->button('', ['icon' => 'bars', 'id' => 'sidebar-toggle']); ?></li>
	<li><?php echo $this->Html->link('', '/dashboard', ['icon' => 'th-large']); ?></li>
	<li class="dropdown">
		<?php echo $this->Html->link('', '#',
			['icon' => ['class' => 'fa fa-plus fa-fw'], 'class' => "dropdown-toggle", "data-toggle" => "dropdown"]); ?>
		<ul class="dropdown-menu">
			<li><?php echo $this->Html->link(__('New Task'),
					['admin' => false, 'controller' => 'tasks', 'action' => 'add', 'plugin' => false],
					['icon' => ['class' => 'fa fa-tasks fa-fw']]); ?></li>
			<li><?php echo $this->Html->link(__('New Repair'),
					['admin' => false, 'controller' => 'repairs', 'action' => 'add', 'plugin' => false],
					['icon' => ['class' => 'fa fa-wrench fa-fw']]); ?></li>
		</ul>
	</li>
</ul>
<ul class="nav navbar-nav navbar-right">
	<li class="dropdown">
		<?php echo $this->Html->link('', '#',
			['icon' => 'wrench', 'class' => "dropdown-toggle", "data-toggle" => "dropdown"]); ?>
		<ul class="dropdown-menu">
			<li><?php echo $this->Html->link(__('Bank Accounts'),
					['admin' => false, 'controller' => 'bank_accounts', 'action' => 'index', 'plugin' => false],
					['icon' => ['class' => 'fa fa-bank fa-fw']]); ?></li>
			<li class="divider hidden-xs"></li>
			<li><?php echo $this->Html->link(__('Taxoffices'),
					['admin' => false, 'plugin' => false, 'controller' => 'taxoffices', 'action' => 'index'],
					['icon' => ['class' => 'fa fa-building-o fa-fw']]); ?></li>
			<li class="divider hidden-xs"></li>
			<li><?php echo $this->Html->link(__('Cities'),
					['admin' => false, 'controller' => 'cities', 'action' => 'index', 'plugin' => false],
					['icon' => ['class' => 'fa fa-home fa-fw']]); ?></li>
			<li><?php echo $this->Html->link(__('States'),
					['admin' => false, 'controller' => 'states', 'action' => 'index', 'plugin' => false],
					['icon' => ['class' => 'fa fa-home fa-fw']]); ?></li>
			<li class="divider hidden-xs"></li>
			<li><?php echo $this->Html->link(__('Day Offs'),
					['admin' => false, 'plugin' => false, 'controller' => 'day_offs', 'action' => 'index'],
					['icon' => ['class' => 'fa fa-sun-o fa-fw']]); ?></li>
		</ul>
	</li>
	<li><?php echo $this->Html->link('',
			['plugin' => 'calendar', 'admin' => false, 'action' => 'index', 'controller' => 'calendar'],
			['icon' => 'calendar']); ?></li>
	<li class="dropdown">
		<?php echo $this->Html->link($this->Auth->user('email'), '#',
			['icon' => 'angle-down', 'class' => "dropdown-toggle", "data-toggle" => "dropdown"]); ?>
		<ul class="dropdown-menu">
			<li><?php echo $this->Html->link(__('Personal'), [
					'admin' => false,
					'controller' => 'users',
					'plugin' => false,
					'action' => 'personal',
					'plugin' => false,
				], ['icon' => ['class' => 'fa fa-user fa-fw']]); ?></li>
			<li><?php echo $this->Html->link(__('Change Password'), [
					'admin' => false,
					'controller' => 'users',
					'plugin' => false,
					'action' => 'changePassword',
					$this->Auth->user('id'),
				], ['icon' => ['class' => 'fa fa-key fa-fw']]); ?></li>
			<li class="divider hidden-xs"></li>
			<li><?php echo $this->Html->link(__('Logout'),
					['admin' => false, 'controller' => 'users', 'action' => 'logout', 'plugin' => false],
					['icon' => ['class' => 'fa fa-sign-out fa-fw']]); ?></li>
		</ul>
	</li>
</ul>