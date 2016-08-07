<div class="panel panel-default">
    <div class="panel-body">
        <?= $this->Html->link(__('Add'), ['action' => 'add'],
            ['class' => 'btn btn-success btn-sm', 'icon' => 'plus']); ?>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-hover table-striped table-limited small">
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('channel'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th><?= __('Actions'); ?></th>
        </tr>
        <?php foreach ($channels as $channel) : ?>
			<tr>
				<td><?= h($channel['Channel']['id']); ?>&nbsp;</td>
				<td><?= h($channel['Channel']['channel']); ?>&nbsp;</td>
				<td><?= h($channel['Channel']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?= $this->Element->btnLinkView($channel['Channel']['id']); ?>
					<?= $this->Element->btnLinkEdit($channel['Channel']['id']); ?>
					<?= $this->Element->btnLinkDelete($channel['Channel']['id']); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
