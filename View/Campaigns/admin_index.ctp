<div class="panel panel-default">
    <div class="panel-body">
        <?php echo $this->Html->link(__('Add'), ['action' => 'add'],
			['class' => 'btn btn-success btn-sm', 'icon' => 'plus']); ?>
	</div>
</div>
<div class="table-responsive">
	<table class="table table-hover table-striped small">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('campaign'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($campaigns as $campaign) : ?>
			<tr>
				<td><?php echo h($campaign['Campaign']['id']); ?>&nbsp;</td>
				<td><?php echo h($campaign['Campaign']['campaign']); ?>&nbsp;</td>
				<td><?php echo h($campaign['Campaign']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Element->btnLinkView($campaign['Campaign']['id']); ?>
					<?php echo $this->Element->btnLinkEdit($campaign['Campaign']['id']); ?>
					<?php echo $this->Element->btnLinkDelete($campaign['Campaign']['id']); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>