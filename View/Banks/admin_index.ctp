<?php $this->Html->addCrumb($this->Html->link(__('Banks'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-bank fa-fw']])); ?>
	<div class="toolbar toolbar-default">
		<?php echo $this->Html->link(__('Add'), ['action' => 'add'],
			['class' => 'btn btn-success btn-sm', 'icon' => 'plus']); ?>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped small">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th><?php echo $this->Paginator->sort('modified'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($banks as $bank) : ?>
					<tr>
						<td><?php echo h($bank['Bank']['id']); ?>&nbsp;</td>
						<td><?php echo h($bank['Bank']['name']); ?>&nbsp;</td>
						<td><?php echo h($bank['Bank']['modified']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Element->btnLinkView($bank['Bank']['id']); ?>
							<?php echo $this->Element->btnLinkEdit($bank['Bank']['id']); ?>
							<?php echo $this->Element->btnLinkDelete($bank['Bank']['id']); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
