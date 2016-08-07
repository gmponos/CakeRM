<?php $this->Html->addCrumb($this->Html->link(__('Users'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-user fa-fw']])); ?>
<?php $this->Html->addCrumb(__('Edit')); ?>
<?php $this->Html->addCrumb($this->request->data('User.fullname')); ?>
<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->input('id'); ?>
	<div class="row">
		<div class="col-md-9 col-lg-9">
			<?php echo $this->Form->input('username'); ?>
			<?php echo $this->Form->input('email'); ?>
			<?php echo $this->Form->chosen('group_id', ['empty' => false]); ?>
			<ul class="nav nav-tabs" role="tablist">
				<li class="active">
					<?php echo $this->Html->link(
						__('General'),
						'#general',
						["data-toggle" => 'tab', 'role' => 'tab']
					); ?></li>
				<li><?php echo $this->Html->link(
						__('Calendar'),
						'#calendar',
						["data-toggle" => 'tab', 'role' => 'tab']
					); ?></li>
				<li><?php echo $this->Html->link(
						__('Misc.'),
						'#misc',
						["data-toggle" => 'tab', 'role' => 'tab']
					); ?></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="general">
					<?php echo $this->Form->input('firstname'); ?>
					<?php echo $this->Form->input('lastname'); ?>
					<?php echo $this->Form->input('phone'); ?>
					<?php echo $this->Form->input('cellphone'); ?>
					<?php echo $this->Form->chosen('bank_account_id'); ?>
					<div class="form-group">
						<?php echo $this->Form->checkbox('active'); ?>
						<?php echo $this->Form->label(__('Active')); ?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->checkbox('verified'); ?>
						<?php echo $this->Form->label(__('Verified')); ?>
					</div>
				</div>
				<div class="tab-pane" id="calendar">
					<?php echo $this->Form->input(
						'calendar_background_color',
						['label' => __('Background Color')]
					); ?>
					<?php echo $this->Form->input('calendar_font_color', ['label' => __('Font Color')]); ?>
				</div>
				<div class="tab-pane" id="misc">
					<?php echo $this->Form->input('comments', ['rows' => '7', 'placeholder' => false]); ?>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-lg-3">
			<?php echo $this->element('forms/buttons-bottom'); ?>
		</div>
	</div>
<?php echo $this->Form->end();
