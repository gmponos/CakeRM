<div class="page-title">
    <h3><?= __('Description'); ?></h3>
</div>
<p><?= $this->Text->autoParagraph($task['Task']['description']); ?></p>
<br/>

<div class="row">
    <div class="col-sm-6">
        <h5 class="page-header"><?= __('Business Details'); ?></h5>
        <dl class="dl-horizontal">
            <dt><?= __('Business'); ?></dt>
            <dd>
                <?= $this->Html->link($task['Business']['business'],
                    ['controller' => 'businesses', 'action' => 'view', $task['Business']['id']]); ?>&nbsp;
            </dd>
            <dt><?= __('Firm'); ?></dt>
            <dd>
                <?= $task['Business']['firm']; ?>&nbsp;
            </dd>
            <dt><?= __('Phones'); ?></dt>
            <dd>
                <?= $task['Business']['phones']; ?>&nbsp;
            </dd>
            <dt><?= __('Email'); ?></dt>
            <dd>
                <?= $task['Business']['email']; ?>&nbsp;
            </dd>
            <dt><?= __('website'); ?></dt>
            <dd>
                <?= $task['Business']['website']; ?>&nbsp;
            </dd>
        </dl>
    </div>
    <div class="col-sm-6">
        <h5 class="page-header"><?= __('Contact Details'); ?></h5>
        <dl class="dl-horizontal">
            <dt><?= __('Contact'); ?></dt>
            <dd>
                <?= $this->Html->link($task['Contact']['fullname'],
                    ['controller' => 'contacts', 'action' => 'view', $task['Contact']['id']]); ?>&nbsp;
            </dd>
            <dt><?= __('Phones'); ?></dt>
            <dd>
                <?= $task['Contact']['phones']; ?>&nbsp;
            </dd>
            <dt><?= __('Email'); ?></dt>
            <dd>
                <?= $task['Contact']['email']; ?>&nbsp;
            </dd>
        </dl>
    </div>
</div>
<h5 class="page-header"><?= __('Properties'); ?></h5>

<div class="row">
    <div class="col-sm-4">
        <dl class="dl-horizontal">
            <dt><?= __('Type'); ?></dt>
            <dd>
                <?= $task['TaskType']['type']; ?>
                &nbsp;
            </dd>
            <dt><?= __('Status'); ?></dt>
            <dd>
                <?= $task['TaskStatus']['status']; ?>
                &nbsp;
            </dd>
            <dt><?= __('Priority'); ?></dt>
            <dd>
                <?php $task['TaskPriority']['priority']; ?>&nbsp;
			</dd>
		</dl>
	</div>
	<div class="col-sm-4">
		<dl class="dl-horizontal">
			<dt><?= __('Duration'); ?></dt>
			<dd>
				<?= $task['Task']['duration']; ?>&nbsp;
			</dd>
			<dt><?= __('Scheduled to end'); ?></dt>
			<dd>
				<?= $task['Task']['date_target']; ?>&nbsp;
			</dd>
			<dt><?= __('From'); ?></dt>
			<dd>
				<?= $task['ResponsibleUser']['fullname']; ?>&nbsp;
			</dd>
			<dt><?= __('Completed on'); ?></dt>
			<dd>
				<time><?= $task['Task']['date_completed']; ?>&nbsp;</time>
			</dd>
		</dl>
	</div>
	<div class="col-sm-4">
		<dl class="dl-horizontal">
			<dt><?= __('Created'); ?></dt>
			<dd>
				<time><?= $task['Task']['created']; ?></time>
			</dd>
			<dt><?= __('From'); ?></dt>
			<dd>
				<?= $task['CreatedUser']['fullname']; ?>
			</dd>
			<dt><?= __('Updated'); ?></dt>
			<dd>
				<time><?= $task['Task']['updated']; ?></time>
			</dd>
			<dt><?= __('From'); ?></dt>
			<dd>
				<?= $task['UpdatedUser']['fullname']; ?>
			</dd>
		</dl>
	</div>
</div>
