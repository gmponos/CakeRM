<div class="table-responsive">
    <table class="table table-hover table-striped small">
        <thead>
        <tr>
            <th><?php echo __('Id') ?></th>
			<th><?php echo __('Fullname'); ?></th>
			<th><?php echo __('Phones'); ?></th>
			<th><?php echo __('Email'); ?></th>
			<th><?php echo __('State'); ?></th>
			<th><?php echo __('City'); ?></th>
			<th><?php echo __('Contact Type'); ?></th>
			<th><?php echo __('Actions'); ?></th>
		</tr>
		</thead>
		<?php if (!empty($contacts)) : ?>
			<tbody>
			<?php foreach ($contacts as $contact) : ?>
				<tr>
					<td><?php echo $contact['Contact']['id'] ?></td>
					<td><?php echo $contact['Contact']['fullname']; ?></td>
					<td><?php echo $contact['Contact']['phones']; ?></td>
					<td><?php echo $this->Text->autoLinkEmails($contact['Contact']['email']) ?></td>
					<td><?php echo $contact['State']['name']; ?></td>
					<td><?php echo $contact['City']['name']; ?></td>
					<td><?php echo (empty($contact['ContactType']['type']) ? '' : $contact['ContactType']['type']); ?></td>
					<td>
						<div class="btn-group-nowrap">
							<?php echo $this->Element->btnLinkView($contact['Contact']['id']); ?>
							<?php echo $this->Element->btnLinkEdit($contact['Contact']['id']); ?>
							<?php echo $this->Element->btnLinkDelete($contact['Contact']['id']); ?>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		<?php endif; ?>
	</table>
</div>