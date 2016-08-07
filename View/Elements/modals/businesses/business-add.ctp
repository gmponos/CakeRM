<div id="business-add-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php echo $this->Html->modalHeader(__('Create New Business')); ?>
			<div class="modal-body">
				<?php echo $this->Form->create('Business', [
					'url' => $action,
					'data-toggle' => 'modal-form',
					'data-update' => $update,
					'data-hide' => '#business-add-modal',
				]); ?>
				<?php echo $this->Form->input('business', ['type' => 'text']) ?>
				<?php echo $this->Form->input('firm') ?>
				<?php echo $this->Form->chosen('Contact', ['empty' => true, 'selected' => false]) ?>
				<ul class="nav nav-tabs">
					<?php echo $this->Html->tab(__('Communication'), '#business-communication', ['li' => ['class' => 'active']]); ?>
					<?php echo $this->Html->tab(__('Logistics'), '#business-logistics'); ?>
					<?php echo $this->Html->tab(__('Address'), '#business-address'); ?>
					<?php echo $this->Html->tab(__('Misc.'), '#business-misc'); ?>
				</ul>
				<div class="tab-content">
					<div id="business-communication" class="tab-pane active">
						<div class="row">
							<div class="col-sm-4">
								<?php echo $this->Form->input('phone_one', ['placeholder' => __('Phone')]) ?>
								<?php echo $this->Form->input('phone_two', ['placeholder' => __('Phone')]) ?>
								<?php echo $this->Form->input('fax') ?>
							</div>
							<div class="col-sm-8">
								<?php echo $this->Form->input('email'); ?>
								<?php echo $this->Form->input('website', ['placeholder' => 'www.example.com']); ?>
							</div>
						</div>
					</div>
					<div id="business-logistics" class="tab-pane">
						<div class="row">
							<div class="col-sm-8 col-lg-6">
								<div class="form-group">
									<?php echo $this->Form->label('business_type_id', __('Business Type')) ?>
									<div class="input-group">
										<?php echo $this->Form->chosen('business_type_id', [
											'empty' => true,
											'selected' => false,
											'label' => false,
											'div' => false,
										]); ?>
										<div class="input-group-btn">
											<?php echo $this->Html->button('', [
												'class' => 'btn btn-primary',
												'data-toggle' => 'modal',
												'data-target' => '#business-type-add-modal',
												'icon' => 'plus',
											]); ?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<?php echo $this->Form->label('taxoffice_id') ?>
									<div class="input-group">
										<?php echo $this->Form->chosen('taxoffice_id', [
											'empty' => true,
											'selected' => false,
											'label' => false,
											'div' => false,
										]); ?>
										<div class="input-group-btn">
											<?php echo $this->Html->button('', [
												'class' => 'btn btn-primary',
												'data-toggle' => 'modal',
												'data-target' => '#taxoffice-add-modal',
												'icon' => 'plus',
											]); ?>
										</div>
									</div>
								</div>
								<?php echo $this->Form->input('afm'); ?>
							</div>
						</div>
					</div>
					<div id="business-address" class="tab-pane">
						<div class="row">
							<div class="col-sm-6">
								<?php echo $this->Form->chosen('state_id', [
									'selected' => false,
									'empty' => true,
									'data-toggle' => 'operate',
									'data-operate' => '#BusinessCityId',
									'data-remote' => $this->Html->url([
										'controller' => 'cities',
										'action' => 'viewByStateIdForSelect',
									]),
								]); ?>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<?php echo $this->Form->label('city_id', __('City')) ?>
									<div class="input-group">
										<?php echo $this->Form->chosen('city_id', [
											'empty' => true,
											'selected' => false,
											'label' => false,
											'div' => false,
										]); ?>
										<div class="input-group-btn">
											<?php echo $this->Html->button('', [
												'class' => 'btn btn-primary',
												'data-toggle' => 'modal',
												'data-target' => '#city-add-modal',
												'icon' => 'plus',
											]); ?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-9">
								<?php echo $this->Form->input('address'); ?>
							</div>
							<div class="col-sm-3">
								<?php echo $this->Form->input('tk', ['placeholder' => __('Postal Code')]); ?>
							</div>
						</div>
					</div>
					<div id="business-misc" class="tab-pane">
						<?php echo $this->Form->input('comments', ['rows' => '5', 'placeholder' => false]); ?>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<?php echo $this->Form->btnSubmit(); ?>
				<?php echo $this->Form->btnReset(); ?>
				<?php echo $this->Form->btnCancel(); ?>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>