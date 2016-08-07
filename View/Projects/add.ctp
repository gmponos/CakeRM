<?php $this->Html->addCrumb($this->Html->link(__('Projects'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-folder-open-o fa-fw']])); ?>
<?php $this->Html->addCrumb(__('Create')); ?>

<?php echo $this->Form->create('Project'); ?>
	<div class="row">
		<div class="col-sm-7">
			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><?php echo $this->Html->link(__('Project'), '#project',
						["data-toggle" => 'tab', 'role' => 'tab']); ?></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="project">
					<?php
					echo $this->Form->input('title');
					echo $this->Form->input('description', ['rows' => 7, 'placeholder' => false]);
					?>
					<div class="form-group">
						<?php echo $this->Form->checkbox('active'); ?>
						<?php echo $this->Form->label(__('Active')); ?>
					</div>
					<?php echo $this->Form->chosen('supervisor_id', ['empty' => false]); ?>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->element('forms/buttons-bottom'); ?>
<?php echo $this->Form->end();
