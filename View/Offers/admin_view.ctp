<div class="row">
	<div class="col-sm-3 col-md-2">
		<div class="list-group">
			<?php echo $this->Element->listItemLinkAdd();?>
			<?php echo $this->Element->listItemLinkEdit($offer['Offer']['id']);?>
			<?php
			if (!empty($offer['Offer']['file_name'])) {
				echo $this->Html->link(__('Download'), ['action' => 'download', $offer['Offer']['id']], ['class' => 'list-group-item', 'icon' => 'download']);
			}
			?>
		</div>
	</div>
	<div class="col-sm-9 col-md-10">
		<div class="panel panel-default">
			<div class="panel-body">
				<dl class="dl-horizontal">
					<dt><?php echo __('Id');?></dt>
					<dd>
						<?php echo h($offer['Offer']['id']);?>
						&nbsp;
					</dd>
					<dt><?php echo __('User');?></dt>
					<dd>
						<?php echo $this->Html->link($offer['User']['fullname'], ['controller' => 'users', 'action' => 'view', $offer['User']['id']]);?>
						&nbsp;
					</dd>
					<dt><?php echo __('Description');?></dt>
					<dd>
						<?php echo h($offer['Offer']['description']);?>
						&nbsp;
					</dd>
					<dt><?php echo __('Contact');?></dt>
					<dd>
						<?php echo $this->Html->link($offer['Contact']['fullname'], ['controller' => 'contacts', 'action' => 'view', $offer['Contact']['id']]);?>
						&nbsp;
					</dd>
					<dt><?php echo __('Business');?></dt>
					<dd>
						<?php echo $this->Html->link($offer['Business']['fullname'], ['controller' => 'businesses', 'action' => 'view', $offer['Business']['id']]);?>
						&nbsp;
					</dd>
					<dt><?php echo __('Offer Status');?></dt>
					<dd>
						<?php echo $this->Html->link($offer['OfferStatus']['status'], ['controller' => 'offer_statuses', 'action' => 'view', $offer['OfferStatus']['id']]);?>
						&nbsp;
					</dd>
					<dt><?php echo __('Sented');?></dt>
					<dd>
						<?php echo h($offer['Offer']['sented']);?>
						&nbsp;
					</dd>
					<dt><?php echo __('Accepted');?></dt>
					<dd>
						<?php echo h($offer['Offer']['accepted']);?>
						&nbsp;
					</dd>
					<dt><?php echo __('Created');?></dt>
					<dd>
						<?php echo h($offer['Offer']['created']);?>
						&nbsp;
					</dd>
					<dt><?php echo __('Updated');?></dt>
					<dd>
						<?php echo h($offer['Offer']['updated']);?>
						&nbsp;
					</dd>
				</dl>
			</div>
		</div>
	</div>
</div>
