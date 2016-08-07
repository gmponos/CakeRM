<div id="modal-search-filters" class="modal" tabindex="-1" role="dialog" aria-hidden="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo $this->Form->create('Task', ['type' => 'get']); ?>
			<div class="modal-body">
				<?php echo $this->Form->chosen('responsible_user_id', ['required' => false]); ?>
				<div class="row">
					<div class="col-sm-4">
						<?php echo $this->Form->chosen('task_type_id', ['label' => __('Type')]); ?>
					</div>
					<div class="col-sm-4">
						<?php echo $this->Form->chosen('task_status_id', ['label' => __('Status')]); ?>
					</div>
					<div class="col-sm-4">
						<?php echo $this->Form->chosen('task_priority_id', ['label' => __('Priority')]); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6"><?php echo $this->Form->datepicker('date_start',
							['label' => __('From Date')]); ?></div>
					<div class="col-sm-6"><?php echo $this->Form->datepicker('date_end',
							['label' => __('To Date')]) ?></div>
				</div>
			</div>
			<div class="modal-footer">
				<?php echo $this->Form->btnSubmit(__('Search')); ?>
				<?php echo $this->Form->btnCancel(); ?>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>