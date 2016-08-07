<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo $this->Form->create('TaskAction', [
			'url' => ['action' => 'addForRelated', $task_id, 'admin' => true],
			'data-toggle' => 'ajax-form',
			'data-update' => '#task-action-tab-related',
		]); ?>
		<?php echo $this->Form->input('description',
			['label' => false, 'placeholder' => __('Type your comment'), 'rows' => 3]) ?>
		<?php echo $this->Form->btnSubmit(__('Send')) ?>
		<?php echo $this->Form->end() ?>
	</div>
	<?php if (!empty($taskActions)) : ?>
		<div class="list-group">
			<?php foreach ($taskActions as $taskAction) : ?>
				<div class="list-group-item">
					<h4 class="list-group-item-heading small">
						<strong><?php echo $taskAction['ModifiedUser']['fullname']; ?></strong>
						<time
							class="text-muted pull-right"><?php echo $taskAction['TaskAction']['date_modified']; ?></time>
					</h4>
					<p class="list-group-item-text small"><?php echo $taskAction['TaskAction']['description']; ?></p>
					<?php
					if ($this->Auth->user('id') == $taskAction['ModifiedUser']['id']) :
						echo $this->Html->link('delete',
							['action' => 'delete', 'controller', 'task_actions', $taskAction['TaskAction']['id']],
							['class' => 'btn btn-link btn-xs', 'icon' => ['class' => 'fa fa-times fa-fw']]);
					endif;
					?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>