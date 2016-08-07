<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo $this->Form->create('OpportunityCommunication', [
			'url' => [
				'action' => 'addForRelated', $opportunity_id, 'admin' => true,
			], 'data-toggle' => 'ajax-form', 'data-update' => '#opportunity-communications-tab-related',
		]); ?>
		<?php echo $this->Form->input('description', [
			'label' => false, 'placeholder' => __('Type your comment'), 'rows' => 3,
		]) ?>
		<?php echo $this->Form->btnSubmit(__('Send')) ?>
		<?php echo $this->Form->end() ?>
	</div>
	<?php if (!empty($communications)) : ?>
		<div class="list-group">
			<?php foreach ($communications as $communication) : ?>
				<div class="list-group-item">
					<h4 class="list-group-item-heading small">
						<strong><?php echo $communication['ModifiedUser']['fullname']; ?></strong>
						<time class="text-muted pull-right"><?php echo $communication['OpportunityCommunication']['modified']; ?></time>
					</h4>
					<p class="list-group-item-text small"><?php echo $communication['OpportunityCommunication']['description']; ?></p>
					<?php
					if ($this->Auth->user('id') == $communication['ModifiedUser']['id']) :
						echo $this->Html->link('delete', [
							'action' => 'delete', 'controller', 'opportunity_communications',
							$communication['OpportunityCommunication']['id'],
						], ['class' => 'btn btn-link btn-xs', 'icon' => ['class' => 'fa fa-times fa-fw']]);
					endif;
					?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>