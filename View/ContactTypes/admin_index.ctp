<?php $this->Html->addCrumb($this->Html->link(__('Contacts'), [
	'controller' => 'contacts',
	'action' => 'index',
], ['icon' => 'book'])); ?>
<?php $this->Html->addCrumb($this->Html->link(__('Contact Types'), ['action' => 'index'])); ?>
<div class="toolbar toolbar-default">
	<?= $this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm', 'icon' => 'plus']); ?>
</div>
<div class="table-responsive">
	<table class="table table-hover table-striped table-limited small">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('type'); ?></th>
				<th><?php echo $this->Paginator->sort('modified'); ?></th>
				<th><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($contactTypes as $contactType) : ?>
				<tr>
					<td><?php echo h($contactType['ContactType']['id']) ?></td>
					<td><?php echo h($contactType['ContactType']['type']) ?></td>
					<td><?php echo h($contactType['ContactType']['modified']) ?></td>
					<td>
						<div class="btn-group-nowrap">
							<?php echo $this->Element->btnLinkView($contactType['ContactType']['id']); ?>
							<?php echo $this->Element->btnLinkEdit($contactType['ContactType']['id']); ?>
							<?php echo $this->Element->btnLinkDelete($contactType['ContactType']['id']); ?>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
