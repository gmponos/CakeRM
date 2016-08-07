<div id="modal-index-filters" class="modal" tabindex="-1" role="dialog" aria-hidden="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <?php echo $this->Form->create('Business', ['action' => 'index', 'type' => 'get']); ?>
				<?php echo $this->Form->chosen('business_type_id'); ?>
				<div class="row">
					<div class="col-sm-6">
						<?php echo $this->Form->chosen('taxoffice_id'); ?>
					</div>
					<div class="col-sm-6">
						<?php echo $this->Form->input('afm'); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<?php echo $this->Form->chosen('state_id'); ?>
					</div>
					<div class="col-sm-6">
						<?php echo $this->Form->chosen('city_id'); ?>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<?php echo $this->Form->btnSubmit(__('Search')); ?>
				<?php echo $this->Form->btnReset(); ?>
				<?php echo $this->Form->btnCancel(__('Cancel'), ['data-dismiss' => 'modal']); ?>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>