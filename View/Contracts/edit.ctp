<?php $this->Html->addCrumb($this->Html->link(__('Contracts'), ['action' => 'index'], ['icon' => 'file-text-o']));?>
<?php $this->Html->addCrumb(__('Edit'));?>
<?php $this->Html->addCrumb($this->request->data('Contract.id'));?>
<?php echo $this->Form->create('Contract');?>
<?php echo $this->Form->input('id');?>
<div class="row">
	<div class="col-md-9">
		<ul class="nav nav-tabs" role="tablist">
			<li class="active"><?php echo $this->Html->link(__('Details'), '#details', ["data-toggle" => 'tab', 'role' => 'tab']);?></li>
			<li><?php echo $this->Html->link(__('Misc.'), '#misc', ["data-toggle" => 'tab', 'role' => 'tab']);?></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="details">
				<div class="row">
					<div class="col-sm-12">
						<?php echo $this->Form->chosen('business_id', ['empty' => false]);?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<?php echo $this->Form->chosen('contract_type_id', ['empty' => false]);?>
					</div>
					<div class="col-sm-3">
						<?php echo $this->Form->datepicker('start', ['type' => 'text']);?>
					</div>
					<div class="col-sm-3">
						<?php echo $this->Form->datepicker('end', ['type' => 'text']);?>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="misc">
				<?php echo $this->Form->input('comments', ['rows' => 7, 'placeholder' => false]);?>
			</div>
		</div>
	</div>
	<div class="col-md-3 tabs-next">
		<?php echo $this->element('forms/buttons-bottom');?>
	</div>
</div>
<?php echo $this->Form->end();