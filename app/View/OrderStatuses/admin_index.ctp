<div class="orderStatuses index">
	<h2><?php echo __('Order Statuses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orderStatuses as $orderStatus): ?>
	<tr>
		<td><?php echo h($orderStatus['OrderStatus']['id']); ?>&nbsp;</td>
		<td><?php echo h($orderStatus['OrderStatus']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $orderStatus['OrderStatus']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $orderStatus['OrderStatus']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderStatus['OrderStatus']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $orderStatus['OrderStatus']['id'])]); ?>
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
		<li><?php echo $this->Html->link(__('New Order Status'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), ['controller' => 'orders', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), ['controller' => 'orders', 'action' => 'add']); ?> </li>
	</ul>
</div>
