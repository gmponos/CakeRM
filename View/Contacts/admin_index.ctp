<?php $this->Html->addCrumb($this->Html->link(__('Contacts'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-book fa-fw']])); ?>
	<div class="toolbar toolbar-default">
		<?php echo $this->element('search'); ?>
		<?php echo $this->Html->link(__('Add'), ['action' => 'add'],
			['class' => 'btn btn-success btn-sm', 'icon' => 'plus']); ?>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped small">
			<thead>
				<tr>
					<th><?php echo __('id'); ?></th>
					<th><?php echo $this->Paginator->sort('lastname'); ?></th>
					<th><?php echo $this->Paginator->sort('firstname'); ?></th>
					<th><?php echo __('Phones'); ?></th>
					<th><?php echo $this->Paginator->sort('State.name', __('State')); ?></th>
					<th><?php echo $this->Paginator->sort('City.name', __('City')); ?></th>
					<th class="visible-lg"><?php echo $this->Paginator->sort('updated', __('Updated')); ?></th>
					<th><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($contacts as $contact) : ?>
					<tr>
						<td><?php echo h($contact['Contact']['id']); ?>&nbsp;</td>
						<td><?php echo h($contact['Contact']['lastname']); ?>&nbsp;</td>
						<td><?php echo h($contact['Contact']['firstname']); ?>&nbsp;</td>
						<td>
							<?php if (!empty($contact['Contact']['phones'])) : ?>
								<strong><?php echo __('Tel:') ?></strong>
								<?php echo $contact['Contact']['phones']; ?>
							<?php endif; ?>
							&nbsp;
						</td>
						<td><?php echo $this->Html->link($contact['State']['name'],
								['controller' => 'states', 'action' => 'view', $contact['State']['id']]) ?></td>
						<td><?php echo $this->Html->link($contact['City']['name'],
								['controller' => 'cities', 'action' => 'view', $contact['City']['id']]) ?></td>
						<td class="visible-lg">
							<time><?php echo $contact['Contact']['updated']; ?></time>
						</td>
						<td class="actions">
							<?php echo $this->Element->btnLinkView($contact['Contact']['id']); ?>
							<?php echo $this->Element->btnLinkEdit($contact['Contact']['id']); ?>
							<?php echo $this->Element->btnLinkDelete($contact['Contact']['id']); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
