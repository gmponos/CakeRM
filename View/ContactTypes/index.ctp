<?php $this->Html->addCrumb($this->Html->link(__('Contacts'), ['controller' => 'contacts', 'action' => 'index'], ['icon' => 'book']));?>
<?php $this->Html->addCrumb($this->Html->link(__('Contact Types'), ['action' => 'index']));?>
<div class="table-responsive">
	<table class="table table-hover table-striped table-limited small">
		<tr>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo __('Actions');?></th>
		</tr>
		<?php foreach ($contactTypes as $contactType) :?>
			<tr>
				<td><?php echo h($contactType['ContactType']['type'])?></td>
				<td>
					<div class="btn-group-nowrap">
						<?php echo $this->Element->btnLinkView($contactType['ContactType']['id']);?>
					</div>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>