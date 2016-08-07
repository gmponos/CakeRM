<?php echo $this->Form->create(null,
	['action' => 'search', 'type' => 'GET', 'role' => 'search', 'class' => 'toolbar-form toolbar-right']) ?>
	<div class="form-group">
		<?php echo $this->Form->input('haystack', [
			'class' => 'form-control input-sm',
			'div' => false,
			'label' => false,
			'placeholder' => __('Search')
		]); ?>
	</div>
	<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-search"></i></button>
<?php echo $this->Form->end();
