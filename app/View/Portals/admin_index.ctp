<div class="portals index">
	<h2><?php echo __('Portals'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($portals as $portal): ?>
	<tr>
		<td><?php echo h($portal['Portal']['id']); ?>&nbsp;</td>
		<td><?php echo h($portal['Portal']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $portal['Portal']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $portal['Portal']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $portal['Portal']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $portal['Portal']['id'])]); ?>
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
		<li><?php echo $this->Html->link(__('New Portal'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Special Offers'), ['controller' => 'special_offers', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Special Offer'), ['controller' => 'special_offers', 'action' => 'add']); ?> </li>
	</ul>
</div>
