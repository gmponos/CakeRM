<div class="repairs index">
    <table>
        <tr>
            <th><?= __('Created'); ?></th>
            <th><?= __('User'); ?></th>
            <th><?= __('Description'); ?></th>
            <th><?= __('Business'); ?></th>
            <th><?= __('Contact'); ?></th>
            <th><?= __('Received'); ?></th>
            <th><?= __('Repaired'); ?></th>
            <th><?= __('Sented'); ?></th>
        </tr>
        <?php foreach ($repairs as $repair) : ?>
			<tr>
				<td>
					<time><?= h($repair['Repair']['date_created']) ?></time>
				</td>
				<td><?= $repair['RepairedUser']['firstname']; ?>&nbsp;</td>
				<td><?= $this->Text->autoParagraph($repair['Repair']['description']); ?>&nbsp;</td>
				<td>
					<div><?= $this->Html->link($repair['Business']['firm'],
							['controller' => 'businesses', 'action' => 'view', $repair['Business']['id']]); ?></div>
					<div><?= $repair['Business']['business']; ?></div>
					<?php if (!empty($repair['Business']['phones'])) : ?>
						<span class="phone">
							<b><?= __('Tel:') ?></b>
							<?= $repair['Business']['phones'] ?>
						</span>
					<?php endif; ?>
				</td>
				<td>
					<?= $this->Html->link($repair['Contact']['fullname'],
						['controller' => 'contacts', 'action' => 'view', $repair['Contact']['id']]); ?>
				</td>
				<td>
					<time><?= h($repair['Repair']['date_received']); ?>&nbsp;</time>
				</td>
				<td><?= h($repair['Repair']['repaired']); ?>&nbsp;</td>
				<td><?= h($repair['Repair']['sented']); ?>&nbsp;</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>