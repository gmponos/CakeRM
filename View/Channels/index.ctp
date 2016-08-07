<div class="table-responsive">
    <table class="table table-hover table-striped table-limited small">
        <tr>
            <th><?php echo $this->Paginator->sort('channel'); ?></th>
			<th><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($channels as $channel) : ?>
			<tr>
				<td><?php echo h($channel['Channel']['channel']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Element->btnLinkView($channel['Channel']['id']); ?>
					<?php echo $this->Element->btnLinkEdit($channel['Channel']['id']); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php
echo $this->element('pagination/pagination');
