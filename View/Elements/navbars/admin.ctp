<div class="navbar-header">
    <?= $this->Html->link(configure::read('Site.brand'), '/dashboard',
        ['class' => 'navbar-brand', 'icon' => ['class' => 'fa fa-bar-chart-o']]); ?>
</div>
<ul class="nav navbar-nav">
    <li><?= $this->Html->button('', ['icon' => 'bars', 'id' => 'sidebar-toggle']); ?></li>
    <li><?= $this->Html->link('', '/dashboard', ['icon' => 'th-large']); ?></li>
    <li class="dropdown">
        <?= $this->Html->link('', '#',
            ['icon' => ['class' => 'fa fa-plus fa-fw'], 'class' => "dropdown-toggle", "data-toggle" => "dropdown"]); ?>
        <ul class="dropdown-menu">
            <li><?= $this->Html->link(__('New Task'),
                    ['admin' => true, 'controller' => 'tasks', 'action' => 'add', 'plugin' => false],
                    ['icon' => ['class' => 'fa fa-tasks fa-fw']]); ?></li>
            <li><?= $this->Html->link(__('New Repair'),
                    ['admin' => true, 'controller' => 'repairs', 'action' => 'add', 'plugin' => false],
                    ['icon' => ['class' => 'fa fa-wrench fa-fw']]); ?></li>
        </ul>
    </li>
</ul>
<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <?= $this->Html->link('', '#',
            ['icon' => 'wrench', 'class' => "dropdown-toggle", "data-toggle" => "dropdown"]); ?>
        <ul class="dropdown-menu">
            <li><?= $this->Html->link(__('Bank Accounts'),
                    ['admin' => true, 'controller' => 'bank_accounts', 'action' => 'index', 'plugin' => false],
                    ['icon' => ['class' => 'fa fa-bank fa-fw']]); ?></li>
            <li class="divider hidden-xs"></li>
            <li><?= $this->Html->link(__('Taxoffices'),
                    ['admin' => true, 'plugin' => false, 'controller' => 'taxoffices', 'action' => 'index'],
                    ['icon' => ['class' => 'fa fa-building-o fa-fw']]); ?></li>
            <li class="divider hidden-xs"></li>
            <li><?= $this->Html->link(__('Cities'),
                    ['admin' => true, 'controller' => 'cities', 'action' => 'index', 'plugin' => false],
                    ['icon' => ['class' => 'fa fa-home fa-fw']]); ?></li>
            <li><?= $this->Html->link(__('States'),
                    ['admin' => true, 'controller' => 'states', 'action' => 'index', 'plugin' => false],
                    ['icon' => ['class' => 'fa fa-home fa-fw']]); ?></li>
            <li class="divider hidden-xs"></li>
            <li><?= $this->Html->link(__('Day Offs'),
                    ['admin' => true, 'plugin' => false, 'controller' => 'day_offs', 'action' => 'index'],
                    ['icon' => ['class' => 'fa fa-sun-o fa-fw']]); ?></li>
        </ul>
    </li>
    <li class="dropdown">
        <?= $this->Html->link('', '#',
            ['icon' => 'cog', 'class' => "dropdown-toggle", "data-toggle" => "dropdown"]); ?>
        <ul class="dropdown-menu">
            <li class="dropdown-header"><?= __('Tasks') ?></li>
            <li><?= $this->Html->link(__('Types'),
                    ['admin' => true, 'plugin' => false, 'controller' => 'task_types', 'action' => 'index'],
                    ['icon' => ['class' => 'fa fa-filter fa-fw']]); ?></li>
            <li><?= $this->Html->link(__('Status'),
                    ['admin' => true, 'plugin' => false, 'controller' => 'task_statuses', 'action' => 'index'],
                    ['icon' => ['class' => 'fa fa-flag fa-fw']]); ?></li>
            <li><?= $this->Html->link(__('Priorities'),
                    ['admin' => true, 'plugin' => false, 'controller' => 'task_priorities', 'action' => 'index'],
                    ['icon' => ['class' => 'fa fa-sort fa-fw']]); ?></li>
            <li class="divider hidden-xs"></li>
            <li class="dropdown-header"><?= __('Businesses') ?></li>
            <li><?= $this->Html->link(__('Business Types'),
                    ['admin' => true, 'plugin' => false, 'controller' => 'business_types', 'action' => 'index'],
                    ['icon' => ['class' => 'fa fa-filter fa-fw']]); ?></li>
            <li class="divider hidden-xs"></li>
            <li class="dropdown-header"><?= __('Contacts') ?></li>
            <li><?= $this->Html->link(__('Contact Types'),
                    ['admin' => true, 'plugin' => false, 'controller' => 'contact_types', 'action' => 'index'],
                    ['icon' => ['class' => 'fa fa-filter fa-fw']]) ?></li>
            <li><?= $this->Html->link(__('Departments'),
                    ['admin' => true, 'plugin' => false, 'controller' => 'departments', 'action' => 'index'],
                    ['icon' => ['class' => 'fa fa-building-o fa-fw']]) ?></li>
            <li class="divider hidden-xs"></li>
            <li class="dropdown-header"><?= __('Opportunities') ?></li>
            <li><?= $this->Html->link(__('Campaigns'),
                    ['admin' => true, 'plugin' => false, 'controller' => 'opportunity_campaigns', 'action' => 'index'],
                    ['icon' => ['class' => 'fa fa-crosshairs fa-fw']]) ?></li>
            <li><?= $this->Html->link(__('Status'),
                    ['admin' => true, 'plugin' => false, 'controller' => 'opportunity_statuses', 'action' => 'index'],
                    ['icon' => ['class' => 'fa fa-flag fa-fw']]) ?></li>
            <li><?= $this->Html->link(__('Channel'),
                    ['admin' => true, 'plugin' => false, 'controller' => 'opportunity_channels', 'action' => 'index'],
                    ['icon' => ['class' => 'fa fa-bullhorn fa-fw']]) ?></li>
            <li class="divider hidden-xs"></li>
            <li class="dropdown-header"><?= __('Contract Types') ?></li>
            <li><?= $this->Html->link(__('Contract Types'),
                    ['admin' => true, 'plugin' => false, 'controller' => 'contract_types', 'action' => 'index'],
                    ['icon' => ['class' => 'fa fa-filter fa-fw']]) ?></li>
            <li class="divider hidden-xs"></li>
            <li class="dropdown-header"><?= __('General') ?></li>
            <li><?= $this->Html->link(__('Groups'),
                    ['admin' => true, 'plugin' => false, 'controller' => 'groups', 'action' => 'index'],
                    ['icon' => ['class' => 'fa fa-users fa-fw']]); ?></li>
            <li><?= $this->Html->link(__('Day Off Types'),
                    ['admin' => true, 'plugin' => false, 'controller' => 'day_off_types', 'action' => 'index'],
                    ['icon' => ['class' => 'fa fa-sun-o fa-fw']]); ?></li>
            <li><?= $this->Html->link(__('Banks'),
                    ['admin' => true, 'plugin' => false, 'controller' => 'banks', 'action' => 'index'],
                    ['icon' => ['class' => 'fa fa-bank fa-fw']]); ?></li>
        </ul>
    </li>
    <li>
        <?= $this->Html->link('', '#',
            ['icon' => 'check-circle-o', 'class' => "dropdown-toggle", "data-toggle" => "dropdown"]); ?>
        <ul class="dropdown-menu">
            <li><?= $this->Html->link(__('Permissions'),
                    ['controller' => 'acl', 'action' => 'permissions', 'plugin' => false],
                    ['icon' => 'filter']); ?></li>
            <li class="divider"></li>
            <li><?= $this->Html->link(__('Update ACOs'),
                    ['admin' => false, 'plugin' => 'acl_manager', 'controller' => 'acl', 'action' => 'update_acos'],
                    ['icon' => 'refresh']); ?></li>
            <li><?= $this->Html->link(__('Update AROs'),
                    ['admin' => false, 'plugin' => 'acl_manager', 'controller' => 'acl', 'action' => 'update_aros'],
                    ['icon' => 'refresh']); ?></li>
            <li class="divider"></li>
            <li><?= $this->Html->link(__('Logins'),
                    ['admin' => true, 'plugin' => false, 'controller' => 'logins', 'action' => 'index'],
                    ['icon' => 'sign-in']); ?></li>
        </ul>
    </li>
    <li><?= $this->Html->link('',
            ['plugin' => 'calendar', 'admin' => true, 'action' => 'index', 'controller' => 'calendar'],
            ['icon' => 'calendar']); ?></li>
    <li><?= $this->Html->link('', '#', ['icon' => 'bell']); ?></li>
    <li class="dropdown">
        <?= $this->Html->link($this->Auth->user('email'), '#',
            ['icon' => 'angle-down', 'class' => "dropdown-toggle", "data-toggle" => "dropdown"]); ?>
        <ul class="dropdown-menu">
            <li><?= $this->Html->link(__('Personal'),
                    ['admin' => false, 'controller' => 'users', 'plugin' => false, 'action' => 'personal'],
                    ['icon' => ['class' => 'fa fa-user fa-fw']]); ?></li>
            <li><?= $this->Html->link(__('Change Password'), [
                    'admin' => false,
                    'plugin' => false,
                    'controller' => 'users',
                    'action' => 'changePassword',
                    $this->Auth->user('id'),
                ], ['icon' => ['class' => 'fa fa-key fa-fw']]); ?></li>
            <?php if ($this->Auth->group('id') == 1) : ?>
				<li class="divider hidden-xs"></li>
				<li><?= $this->Html->link('info', '/php_info',
						['icon' => ['class' => 'fa fa-info fa-fw']]) ?></li>
			<?php endif; ?>
			<li class="divider hidden-xs"></li>
			<li><?= $this->Html->link(__('Logout'),
					['admin' => false, 'plugin' => false, 'controller' => 'users', 'action' => 'logout'],
					['icon' => ['class' => 'fa fa-sign-out fa-fw']]); ?></li>
		</ul>
	</li>
</ul>