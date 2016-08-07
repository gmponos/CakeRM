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
		<div class="list-group">
			<a class="list-group-item active">
				<h4 class="list-group-item-heading"><?php echo __('Description');?></h4>
				<p class="list-group-item-text">
					<?php echo nl2br($offer['Offer']['description']);?>&nbsp;
				</p>
			</a>
		</div>
		<div class="row">
			<div class="col-xs-3">
				<div class="list-group">
					<span class="list-group-item">
						<h4 class="list-group-item-heading"><?php echo __('User');?></h4>
						<p class="list-group-item-text">
							<?php echo $this->Html->link($offer['User']['fullname'], ['controller' => 'users', 'action' => 'view', $offer['User']['id']]);?>&nbsp;
						</p>
					</span>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="list-group">
					<span class="list-group-item">
						<h4 class="list-group-item-heading"><?php echo __('Responsible');?></h4>
						<p class="list-group-item-text">
							<?php echo $this->Html->link($offer['Responsible']['fullname'], ['controller' => 'users', 'action' => 'view', $offer['User']['id']]);?>&nbsp;
						</p>
					</span>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="list-group">
					<span class="list-group-item">
						<h4 class="list-group-item-heading"><?php echo __('Offer Status');?></h4>
						<p class="list-group-item-text">
							<?php echo h($offer['OfferStatus']['status']);?>
							&nbsp;
						</p>
					</span>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="list-group">
					<span class="list-group-item">
						<h4 class="list-group-item-heading"><?php echo __('Offer Status');?></h4>
						<p class="list-group-item-text">
							<?php
							$types = Set::classicExtract($offer['OfferType'], '{n}.type');
							if (!empty($types) && is_array($types)) {
								echo implode(', ', $types);
							}
							?>
							&nbsp;
						</p>
					</span>
				</div>
			</div>	
		</div>
		<div class="row">
			<div class="col-xs-6">
				<h4><?php echo __('Business Details');?></h4>
				<div class="list-group">
					<span class="list-group-item">
						<h4 class="list-group-item-heading"><?php echo __('Business');?></h4>
						<p class="list-group-item-text">
							<?php echo $this->Html->link($offer['Business']['business'], ['controller' => 'businesses', 'action' => 'view', $offer['Business']['id']]);?>&nbsp;
						</p>
					</span>
					<span class="list-group-item">
						<h4 class="list-group-item-heading"><?php echo __('Firm');?></h4>
						<p class="list-group-item-text">
							<?php echo $this->Html->link($offer['Business']['firm'], ['controller' => 'businesses', 'action' => 'view', $offer['Business']['id']]);?>&nbsp;
						</p>
					</span>
					<span class="list-group-item">
						<h4 class="list-group-item-heading"><?php echo __('Phones');?></h4>
						<p class="list-group-item-text">
							<?php echo $offer['Business']['phones'];?>&nbsp;
						</p>
					</span>
				</div>
			</div>
			<div class="col-xs-6">
				<h4><?php echo __('Contact Details');?></h4>
				<div class="list-group">
					<span class="list-group-item">
						<h4 class="list-group-item-heading"><?php echo __('Contact');?></h4>
						<p class="list-group-item-text">
							<?php echo $this->Html->link($offer['Contact']['fullname'], ['controller' => 'contacts', 'action' => 'view', $offer['Contact']['id']]);?>&nbsp;
						</p>
					</span>
					<span class="list-group-item">
						<h4 class="list-group-item-heading"><?php echo __('Phones');?></h4>
						<p class="list-group-item-text">
							<?php echo $offer['Contact']['phones'];?>&nbsp;
						</p>
					</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4">
				<div class="list-group">
					<a class="list-group-item">
						<h4 class="list-group-item-heading"><?php echo __('Date Created');?></h4>
						<p class="list-group-item-text">
							<?php echo h($offer['Offer']['date_created']);?>&nbsp;
						</p>
					</a>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="list-group">
					<span class="list-group-item">
						<h4 class="list-group-item-heading"><?php echo __('Date sented');?></h4>
						<p class="list-group-item-text">
							<?php echo $offer['Offer']['date_sented'];?>&nbsp;
						</p>
					</span>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="list-group">
					<span class="list-group-item">
						<h4 class="list-group-item-heading"><?php echo __('Date accepted');?></h4>
						<p class="list-group-item-text">
							<?php echo $offer['Offer']['date_accepted'];?>&nbsp;
						</p>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>