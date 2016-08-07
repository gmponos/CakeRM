<div class="toolbar toolbar-default">
    <?= $this->Html->link(__('Add'), ['action' => 'add'],
        ['class' => 'btn btn-success btn-sm', 'icon' => 'plus']); ?>
</div>
<div class="table-responsive">
    <table class="table table-hover table-striped table-limited small">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('campaign', __('Campaign')); ?></th>
				<th><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($campaigns as $campaign) : ?>
				<tr>
					<td><?php echo h($campaign['Campaign']['campaign']); ?></td>
					<td class="text-nowrap">
						<?php echo $this->Element->btnLinkView($campaign['Campaign']['id']); ?>
						<?php echo $this->Element->btnLinkEdit($campaign['Campaign']['id']); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>