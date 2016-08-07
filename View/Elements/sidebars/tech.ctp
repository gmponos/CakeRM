<ul class="nav sidebar-nav" role="tablist" id="navbar-top-collapse">
    <li><?php echo $this->Html->link(__('Tasks'),
			['admin' => false, 'plugin' => false, 'controller' => 'tasks', 'action' => 'index'],
			['icon' => ['class' => 'fa fa-tasks fa-fw']]); ?></li>
	<li><?php echo $this->Html->link(__('Projects'),
			['admin' => false, 'plugin' => false, 'controller' => 'projects', 'action' => 'index'],
			['icon' => ['class' => 'fa fa-list-ul fa-fw']]); ?></li>
	<li><?php echo $this->Html->link(__('Repairs'),
			['admin' => false, 'plugin' => false, 'controller' => 'repairs', 'action' => 'index'],
			['icon' => ['class' => 'fa fa-gavel fa-fw']]); ?></li>
	<li><?php echo $this->Html->link(__('Opportunities'),
			['admin' => false, 'plugin' => false, 'controller' => 'opportunities', 'action' => 'index'],
			['icon' => ['class' => 'fa fa-thumbs-o-up fa-fw']]); ?></li>
	<li><?php echo $this->Html->link(__('Contracts'),
			['admin' => false, 'plugin' => false, 'controller' => 'contracts', 'action' => 'index'],
			['icon' => ['class' => 'fa fa-file-text-o fa-fw']]); ?></li>
	<li><?php echo $this->Html->link(__('Businesses'),
			['admin' => false, 'plugin' => false, 'controller' => 'businesses', 'action' => 'index'],
			['icon' => ['class' => 'fa fa-building-o fa-fw']]); ?></li>
	<li><?php echo $this->Html->link(__('Contacts'),
			['admin' => false, 'plugin' => false, 'controller' => 'contacts', 'action' => 'index'],
			['icon' => ['class' => 'fa fa-book fa-fw']]); ?></li>
	<li><?php echo $this->Html->link(__('Day Offs'),
			['admin' => false, 'plugin' => false, 'controller' => 'day_offs', 'action' => 'index'],
			['icon' => ['class' => 'fa fa-sun-o fa-fw']]); ?></li>
	<li><?php echo $this->Html->link(__('Users'),
			['admin' => false, 'plugin' => false, 'controller' => 'users', 'action' => 'index'],
			['icon' => ['class' => 'fa fa-users fa-fw']]); ?></li>
</ul>