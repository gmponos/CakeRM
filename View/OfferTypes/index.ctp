<div class="toolbar toolbar-default">
		<?php echo $this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm', 'icon' => 'plus']);?>
</div>
<div class="table-responsive">
	<table class="table table-hover table-striped table-limited small">
		<tr>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo __('Actions');?></th>
		</tr>
		<?php foreach ($offerTypes as $offerType) :?>
			<tr>
				<td><?php echo h($offerType['OfferType']['type']);?>&nbsp;</td>
				<td>
					<?php echo $this->Element->btnLinkView($offerType['OfferType']['id']);?>					
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
