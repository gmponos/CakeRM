<div class="table-responsive">
    <table class="table table-hover table-striped small">
        <tr>
            <th><?php echo __('Fullname'); ?></th>
			<th><?php echo __('Phones'); ?></th>
			<th><?php echo __('Email'); ?></th>
			<th><?php echo __('State'); ?></th>
			<th><?php echo __('City'); ?></th>
			<th><?php echo __('Contact Type'); ?></th>
			<th><?php echo __('Actions'); ?></th>
		</tr>
		<?php if (!empty($contacts)) : ?>
			<?php foreach ($contacts as $contact) : ?>
				<tr>
					<td><?php echo $contact['Contact']['fullname']; ?></td>
					<td><?php echo $contact['Contact']['phones']; ?></td>
					<td><?php echo $this->Text->autoLinkEmails($contact['Contact']['email']) ?></td>
					<td><?php echo $contact['State']['name']; ?></td>
					<td><?php echo $contact['City']['name']; ?></td>
					<td><?php echo (empty($contact['ContactType']['type']) ? '' : $contact['ContactType']['type']); ?></td>
					<td class="actions">
						<?php echo $this->Element->btnLinkView($contact['Contact']['id']); ?>
						<?php echo $this->Element->btnLinkEdit($contact['Contact']['id']); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</table>
</div>