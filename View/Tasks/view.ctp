<?php $this->Html->addCrumb($this->Html->link(__('Tasks'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-tasks fa-fw']])); ?>
<?php $this->Html->addCrumb(__('View')); ?>
<?php $this->Html->addCrumb($task['Task']['id']); ?>
<nav class="toolbar toolbar-default" role="navigation">
	<?= $this->Element->btnLinkEdit($task['Task']['id'], __('Edit'), ['class' => "btn btn-success btn-sm"]); ?>
	<?= $this->Element->btnLinkMail($task['Task']['id'], __('Mail'), ['class' => "btn btn-success btn-sm"]); ?>
</nav>
<h3><?= __('Task Overview') ?></h3>
<hr>
<div class="row">
	<div class="col-md-6 col-lg-8">
		<div class="panel panel-default">
			<div class="panel-body">
				<?= $this->Text->autoParagraph($task['Task']['description']); ?>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-4">
		<ul class="list-unstyled text-muted">
			<li>
				<i class="fa fa-calendar fa-fw"></i>
				<?php $updated = $this->Time->nice($task['Task']['date_updated'], null, '%d %b %Y'); ?>
				<?= __('Updated by %s on %s', $task['UpdatedUser']['fullname'], $updated); ?>
			</li>
		</ul>
		<ul class="list-unstyled text-muted">
			<li>
				<i class="fa fa-thumbs-o-up fa-fw"></i>
				<?= __('Responsible to complete'); ?>
				<?= $task['ResponsibleUser']['fullname']; ?>
			</li>
			<li>
				<i class="fa fa-clock-o fa-fw"></i>
				<?= __('Duration'); ?>
				<?= $task['Task']['duration']; ?>
			</li>
			<li>
				<i class="fa fa-crosshairs fa-fw"></i>
				<?= __('Due date'); ?>
				<?= $task['Task']['target']; ?>&nbsp
			</li>
			<li>
				<i class="fa fa-check-circle-o fa-fw"></i>
				<?= __('Completed on'); ?>
				<?= $task['Task']['completed']; ?>&nbsp
			</li>
			<li>
				<i class="fa fa-tags fa-fw"></i>
				<?= $this->Html->label($task['TaskType']['type'], 'info'); ?>
				<?= $this->Html->label($task['TaskStatus']['status'], 'info'); ?>
				<?php
				if (!empty($task['TaskPriority']['priority'])) :
					echo ($this->Html->label($task['TaskPriority']['priority'], 'danger'));
				endif;
				?>
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-lg-8">
		<ul class="nav nav-tabs">
			<li class="active"><?= $this->Html->link(__('Business'),
					['controller' => 'task_actions', 'action' => 'related', $task['Task']['id']],
					['data-toggle' => 'tab', 'data-target' => '#task-business-related']) ?></li>
			<li><?= $this->Html->link(__('Contact'),
					['controller' => 'task_actions', 'action' => 'related', $task['Task']['id']],
					['data-toggle' => 'tab', 'data-target' => '#task-contact-related']) ?></li>
		</ul>
		<div class="tab-content">
			<div id="task-business-related" class="tab-pane active">
				<?= $this->element('Businesses/related_single', ['business' => $task['Business']]); ?>
			</div>
			<div id="task-contact-related" class="tab-pane">
				<?= $this->element('Contacts/related_single', ['contact' => $task['Contact']]); ?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-lg-8">
		<ul class="nav nav-tabs nav-tabs-remote">
			<li class="active"><?php echo $this->Html->link(__('Actions'),
					['admin' => false, 'controller' => 'task_actions', 'action' => 'related', $task['Task']['id']],
					['data-toggle' => 'tab', 'data-target' => '#task-action-tab-related']) ?></li>
		</ul>
		<div class="tab-content active">
			<div id="task-action-tab-related" class="tab-pane active"></div>
		</div>
	</div>
</div>