<div class="specialOffers index">
	<h2><?php echo __('Special Offers'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('lft'); ?></th>
			<th><?php echo $this->Paginator->sort('rght'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('house_id'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('from'); ?></th>
			<th><?php echo $this->Paginator->sort('to'); ?></th>
			<th><?php echo $this->Paginator->sort('referential'); ?></th>
			<th><?php echo $this->Paginator->sort('hidden'); ?></th>
			<th><?php echo $this->Paginator->sort('html_title'); ?></th>
			<th><?php echo $this->Paginator->sort('html_keywords'); ?></th>
			<th><?php echo $this->Paginator->sort('html_description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($specialOffers as $specialOffer): ?>
	<tr>
		<td><?php echo h($specialOffer['SpecialOffer']['id']); ?>&nbsp;</td>
		<td><?php echo h($specialOffer['SpecialOffer']['lft']); ?>&nbsp;</td>
		<td><?php echo h($specialOffer['SpecialOffer']['rght']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($specialOffer['ParentSpecialOffer']['id'], ['controller' => 'special_offers', 'action' => 'view', $specialOffer['ParentSpecialOffer']['id']]); ?>
		</td>
		<td>
			<?php echo $this->Html->link($specialOffer['House']['name'], ['controller' => 'houses', 'action' => 'view', $specialOffer['House']['id']]); ?>
		</td>
		<td><?php echo h($specialOffer['SpecialOffer']['content']); ?>&nbsp;</td>
		<td><?php echo h($specialOffer['SpecialOffer']['from']); ?>&nbsp;</td>
		<td><?php echo h($specialOffer['SpecialOffer']['to']); ?>&nbsp;</td>
		<td><?php echo h($specialOffer['SpecialOffer']['referential']); ?>&nbsp;</td>
		<td><?php echo h($specialOffer['SpecialOffer']['hidden']); ?>&nbsp;</td>
		<td><?php echo h($specialOffer['SpecialOffer']['html_title']); ?>&nbsp;</td>
		<td><?php echo h($specialOffer['SpecialOffer']['html_keywords']); ?>&nbsp;</td>
		<td><?php echo h($specialOffer['SpecialOffer']['html_description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $specialOffer['SpecialOffer']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $specialOffer['SpecialOffer']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $specialOffer['SpecialOffer']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $specialOffer['SpecialOffer']['id'])]); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter([
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	]);
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), [], null, ['class' => 'prev disabled']);
		echo $this->Paginator->numbers(['separator' => '']);
		echo $this->Paginator->next(__('next') . ' >', [], null, ['class' => 'next disabled']);
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Special Offer'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Special Offers'), ['controller' => 'special_offers', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Special Offer'), ['controller' => 'special_offers', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Portals'), ['controller' => 'portals', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Portal'), ['controller' => 'portals', 'action' => 'add']); ?> </li>
	</ul>
</div>
