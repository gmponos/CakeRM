<div class="panel panel-default">
	<div class="panel-body">
		<?php echo $this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm', 'icon' => 'plus']);?>
	</div>
</div>
<div class="table-responsive">
	<table class="table table-hover table-striped small">
		<tr>
			<td><time><?php echo h($offer['Offer']['date_updated']);?></time></td>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('business_id');?></th>
			<th><?php echo $this->Paginator->sort('contact_id');?></th>
			<th><?php echo __('Offer Type');?></th>			
			<th><?php echo $this->Paginator->sort('status_id');?></th>
			<th><?php echo $this->Paginator->sort('responsible_id');?></th>
			<th><?php echo $this->Paginator->sort('file');?></th>
			<th><?php echo $this->Paginator->sort('sented');?></th>
			<th><?php echo $this->Paginator->sort('accepted');?></th>
			<th><?php echo __('Actions');?></th>
		</tr>
		<?php foreach ($offers as $offer) :?>
			<tr>
				<td><?php echo h($offer['Offer']['date_created']);?></td>				
				<td><?php echo h($offer['Offer']['date_updated']);?></td>
				<td>
					<div>
						<?php echo $this->Html->link($offer['User']['lastname'], ['controller' => 'users', 'action' => 'view', $offer['User']['id']]);?>
					</div>
				</td>
				<td><?php echo h($offer['Offer']['description']);?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($offer['Business']['fullname'], ['controller' => 'businesses', 'action' => 'view', $offer['Business']['id']]);?>
				</td>
				<td>
					<?php echo $this->Html->link($offer['Contact']['fullname'], ['controller' => 'contacts', 'action' => 'view', $offer['Contact']['id']]);?>
				</td>
				<td>
					<?php
					$types = Set::classicExtract($offer['OfferType'], '{n}.type');
					if (!empty($types) && is_array($types)) {
						echo implode(', ', $types);
					}
					?>
				</td>				
				<td>
					<?php echo $this->Html->link($offer['OfferStatus']['status'], ['controller' => 'offer_statuses', 'action' => 'view', $offer['OfferStatus']['id']]);?>
				</td>
				<td>
					<?php echo $this->Html->link($offer['Responsible']['lastname'], ['controller' => 'users', 'action' => 'view', $offer['Responsible']['id']]);?>
				</td>
				<td>
					<?php
					if (!empty($offer['Offer']['file_name'])) {
						echo $this->Html->link(__('Download'), ['action' => 'download', $offer['Offer']['id']], ['icon' => 'download']);
					}
					?>
					&nbsp;
				</td>				
				<td><?php echo h($offer['Offer']['date_sented']);?>&nbsp;</td>
				<td><?php echo h($offer['Offer']['date_accepted']);?>&nbsp;</td>
				<td>
					<div class="btn-group-nowrap">
						<?php echo $this->Element->btnLinkView($offer['Offer']['id']);?>
						<?php echo $this->Element->btnLinkEdit($offer['Offer']['id']);?>
						<?php echo $this->Element->btnLinkMail($offer['Offer']['id']);?>
					</div>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
