<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo $this->Form->create('TaskAction', [
			'url' => [
				'action' => 'addForRelated',
				'admin' => true,
				$task_id,
			],
			'data-toggle' => 'ajax-form',
			'data-update' => '#task-action-tab-related',
		]); ?>
		<?php echo $this->Form->input('description', [
			'label' => false,
			'placeholder' => __('Type your comment'),
			'rows' => 3,
		]) ?>
		<?php echo $this->Form->btnSubmit(__('Send')) ?>
		<?php echo $this->Form->end() ?>
	</div>
	<?php if (!empty($taskActions)) : ?>
		<div class="list-group">
			<?php foreach ($taskActions as $taskAction) : ?>
				<div class="list-group-item">
					<h4 class="list-group-item-heading small">
						<strong><?php echo $taskAction['ModifiedUser']['fullname']; ?></strong>
						<?= $this->Html->time($taskAction['TaskAction']['date_modified'], 'text-muted pull-right'); ?>
					</h4>

					<p class="list-group-item-text small"><?= $taskAction['TaskAction']['description']; ?></p>
					<?php
					if (AuthComponent::user('id') == $taskAction['ModifiedUser']['id']) :
						echo $this->Html->link(
							'delete', [
							'admin' => true,
							'action' => 'delete',
							'controller' => 'task_actions',
							$taskAction['TaskAction']['id'],
							$task_id,
						], [
								'class' => 'btn btn-link btn-xs',
								'data-toggle' => 'delete',
								'data-update' => '#task-action-tab-related',
								'icon' => ['class' => 'fa fa-times fa-fw'],
							]
						);
					endif;
					?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>