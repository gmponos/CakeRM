<div id="contact-add-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<?php echo $this->Html->modalHeader(__('Create New Contact'));?>
			<div class="modal-body">
				<?php echo $this->Form->create('Contact', ['url' => $action, 'data-toggle' => 'modal-form', 'data-update' => $update, 'data-hide' => '#contact-add-modal'])?>
				<div class="row">
					<div class="col-sm-6">
						<?php echo $this->Form->input('lastname');?>
					</div>
					<div class="col-sm-6">
						<?php echo $this->Form->input('firstname');?>
					</div>
				</div>
				<?php echo $this->Form->chosen('Business', ['selected' => false]);?>
				<ul class="nav nav-tabs">
					<li class="active"><?php echo $this->Html->link(__('Communication'), '#contact-communication', ['data-toggle' => 'tab']);?></li>
					<li><?php echo $this->Html->link(__('Details'), '#contact-details', ['data-toggle' => 'tab']);?></li>
					<li><?php echo $this->Html->link(__('Address'), '#contact-address', ['data-toggle' => 'tab']);?></li>
					<li><?php echo $this->Html->link(__('Misc.'), '#contact-misc', ['data-toggle' => 'tab']);?></li>
				</ul>
				<div class="tab-content">
					<div id="contact-communication" class="tab-pane active">
						<div class="row">
							<div class="col-sm-5">
								<?php echo $this->Form->input('phone')?>
								<?php echo $this->Form->input('cellphone')?>
								<?php echo $this->Form->input('email', ['placeholder' => __('Email')])?>
							</div>
						</div>						
					</div>
					<div id="contact-details" class="tab-pane">
						<div class="row">
							<div class="col-sm-6">
								<?php echo $this->Form->chosen('department_id', ['selected' => false]);?>
								<?php echo $this->Form->chosen('contact_type_id', ['selected' => false]);?>
							</div>
						</div>						
					</div>
					<div id="contact-address" class="tab-pane">
						<div class="row">
							<div class="col-sm-6">
								<?php echo $this->Form->chosen('state_id', ['selected' => false, 'data-toggle' => 'operate', 'data-operate' => '#ContactCityId', 'data-remote' => $this->Html->url(['controller' => 'cities', 'action' => 'viewByStateIdForSelect'])]);?>
								<div class="form-group">
									<?php echo $this->Form->label('city_id', __('City'))?>
									<div class="input-group">
										<?php echo $this->Form->chosen('city_id', ['selected' => false, 'label' => false, 'div' => false]);?>
										<div class="input-group-btn">
											<?php echo $this->Html->button('', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#city-add-modal', 'icon' => 'plus']);?>
										</div>
									</div>
								</div>
							</div>
						</div>						
					</div>
					<div id="contact-misc" class="tab-pane">
						<?php echo $this->Form->input('comments', ['rows' => '5', 'placeholder' => false]);?>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<?php echo $this->Form->btnSubmit();?>
				<?php echo $this->Form->btnReset();?>
				<?php echo $this->Form->btnCancel();?>
				<?php echo $this->Form->end();?>
			</div>
		</div>
	</div>
</div>