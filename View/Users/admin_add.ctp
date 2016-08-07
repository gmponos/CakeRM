<?php $this->Html->addCrumb($this->Html->link(__('Users'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-user fa-fw']])); ?>
<?php echo $this->Form->create('User'); ?>
	<ul class="nav nav-tabs" role="tablist">
		<li class="active">
			<?php echo $this->Html->link(__('User'), '#user',
				["data-toggle" => 'tab', 'role' => 'tab']); ?></li>
		<li><?php echo $this->Html->link(__('Misc.'), '#misc',
				["data-toggle" => 'tab', 'role' => 'tab']); ?></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="user">
			<?= $this->Form->input('username'); ?>
			<?= $this->Form->input('password'); ?>
			<?= $this->Form->chosen('group_id', ['empty' => false]); ?>
			<?= $this->Form->input('firstname'); ?>
			<?= $this->Form->input('lastname'); ?>
			<?= $this->Form->input('email'); ?>
		</div>
		<div class="tab-pane" id="misc">
			<?= $this->Form->input('comments', ['placeholder' => false, 'rows' => '7']); ?>
		</div>
	</div>
<?= $this->element('forms/buttons-bottom'); ?>
<?= $this->Form->end();
