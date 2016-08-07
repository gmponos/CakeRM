<?php $this->Html->addCrumb($this->Html->link(__('Projects'), ['action' => 'index'], ['icon' => ['class' => 'fa fa-folder-open-o fa-fw']]));?>
<?php $this->Html->addCrumb(__('View'));?>
<?php $this->Html->addCrumb($project['Project']['id']);?>
<div class="row">
	<div class="col-sm-3">
		<div class="well">
			<h5><?= __('Project');?></h5>
			<dl class="dl-auto">
				<dt><?= __('Title');?></dt>
				<dd><?= $project['Project']['title'];?></dd>
				<dt><?= __('Description');?></dt>
				<dd><?= h($project['Project']['description']);?>&nbsp;</dd>
				<dt><?= __('Supervisor');?></dt>
				<dd><?= $this->Html->link($project['Supervisor']['fullname'], ['controller' => 'users', 'plugin' => false, 'action' => 'view', $project['Supervisor']['id']]);?>&nbsp;</dd>
				<dt><?= __('Active');?></dt>
				<dd><?= $this->Html->status($project['Project']['active']);?>&nbsp;</dd>
				<dt><?= __('Created');?></dt>
				<dd><time><?= h($project['Project']['created']);?></time></dd>
				<dt><?= __('Updated');?></dt>
				<dd><time><?= h($project['Project']['updated']);?></time></dd>
			</dl>
		</div>
	</div>
	<div class="col-sm-9">
		<ul class="nav nav-tabs" role="tablist">
			<li class="active"><?= $this->Html->link(__('Tasks'), '#task', ["data-toggle" => 'tab', 'role' => 'tab']);?></li>
		</ul>
		<table class="table table-hover">
			<thead>
				<tr>
					<th></th>
					<th><?= __('Description')?></th>
					<th><?= __('Business')?></th>
					<th><?= __('Contact')?></th>
					<th><?= __('Duration')?></th>
					<th><?= __('Completed');?></th>
					<th><?= __('Actions')?></th>
				</tr>
			</thead>
			<?php if (!empty($tasks)) :?>
				<tbody>
					<?php foreach ($tasks as $task) :?>
						<tr>
							<td class="text-nowrap">
								<?= $this->Html->link('', ['controller' => 'task_types', 'action' => 'view', $task['TaskType']['id']], ['icon' => ['class' => 'fa fa-fw icon-' . $task['TaskType']['icon']]]);?>
								<?= $this->Html->link('', ['controller' => 'task_statuses', 'action' => 'view', $task['TaskStatus']['id']], ['icon' => ['class' => 'fa fa-fw icon-' . $task['TaskStatus']['icon']]]);?>
							</td>
							<td><?= $this->Text->autoParagraph($task['Task']['description']) ?></td>
							<td><?= (empty($task['Business']['firm']) ? '' : $task['Business']['firm'])?>&nbsp;</td>
							<td><?= (empty($task['Contact']['fullname']) ? '' : $task['Contact']['fullname'])?>&nbsp;</td>
							<td><time><?= $task['Task']['duration'];?>&nbsp;</time></td>
							<td>
								<div><?= $this->Html->link($task['ResponsibleUser']['lastname'], ['controller' => 'users',  'plugin' => false, 'action' => 'view', $task['ResponsibleUser']['id']]);?></div>
								<time><?= $task['Task']['date_completed'];?>&nbsp;</time>
							</td>
							<td class="actions">
								<?= $this->Element->btnLinkView(['controller' => 'tasks', 'action' => 'view', $task['Task']['id']]);?>
								<?= $this->Element->btnLinkEdit(['controller' => 'tasks', 'action' => 'edit', $task['Task']['id']]);?>
							</td>
						</tr>
					<?php endforeach;?>
				</tbody>
			<?php endif;?>
		</table>
	</div>
</div>
<?php
// echo $this->Js->writeBuffer();