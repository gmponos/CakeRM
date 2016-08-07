<?php $this->Html->addCrumb($this->Html->link(__('Users'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-user fa-fw']])); ?>
<?php $this->Html->addCrumb(__('Personal')); ?>
<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->input('id'); ?>
	<div class="row">
		<div class="col-md-9">
			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><?= $this->Html->link(
						__('General'),
						'#general',
						["data-toggle" => 'tab', 'role' => 'tab']
					); ?></li>
				<li><?= $this->Html->link(
						__('Misc.'),
						'#misc',
						["data-toggle" => 'tab', 'role' => 'tab']
					); ?></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="general">
					<?php echo $this->Form->input('username', ['disabled' => true]); ?>
					<?php echo $this->Form->input('email', ['disabled' => true]); ?>
					<div class="row">
						<div class="col-sm-6">
							<?php echo $this->Form->input('firstname'); ?>
						</div>
						<div class="col-sm-6">
							<?php echo $this->Form->input('lastname'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<?php echo $this->Form->input('phone'); ?>
						</div>
						<div class="col-sm-6">
							<?php echo $this->Form->input('cellphone'); ?>
						</div>
					</div>
					<?php echo $this->Form->chosen('bank_account_id'); ?>
				</div>
				<div class="tab-pane" id="misc">
					<?php echo $this->Form->input('comments', ['rows' => '7', 'placeholder' => false]); ?>
				</div>
			</div>
			<?php echo $this->element('forms/buttons-bottom'); ?>
		</div>
	</div>
<?php echo $this->Form->end();
