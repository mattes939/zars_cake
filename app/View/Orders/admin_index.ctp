<div class="orders index">
	<h2><?php echo __('Orders'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('company_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('house_id'); ?></th>
			<th><?php echo $this->Paginator->sort('travel_date_id'); ?></th>
			<th><?php echo $this->Paginator->sort('attendants'); ?></th>
			<th><?php echo $this->Paginator->sort('adults'); ?></th>
			<th><?php echo $this->Paginator->sort('young'); ?></th>
			<th><?php echo $this->Paginator->sort('children'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('confirmed'); ?></th>
			<th><?php echo $this->Paginator->sort('canceled'); ?></th>
			<th><?php echo $this->Paginator->sort('start_day'); ?></th>
			<th><?php echo $this->Paginator->sort('end_day'); ?></th>
			<th><?php echo $this->Paginator->sort('start_time'); ?></th>
			<th><?php echo $this->Paginator->sort('end_time'); ?></th>
			<th><?php echo $this->Paginator->sort('employer_contribution'); ?></th>
			<th><?php echo $this->Paginator->sort('animals'); ?></th>
			<th><?php echo $this->Paginator->sort('animals_details'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('discount'); ?></th>
			<th><?php echo $this->Paginator->sort('final_price'); ?></th>
			<th><?php echo $this->Paginator->sort('provision'); ?></th>
			<th><?php echo $this->Paginator->sort('provision_reg'); ?></th>
			<th><?php echo $this->Paginator->sort('billing_price'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orders as $order): ?>
	<tr>
		<td><?php echo h($order['Order']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($order['Company']['name'], array('controller' => 'companies', 'action' => 'view', $order['Company']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['User']['username'], array('controller' => 'users', 'action' => 'view', $order['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['House']['name'], array('controller' => 'houses', 'action' => 'view', $order['House']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['TravelDate']['id'], array('controller' => 'travel_dates', 'action' => 'view', $order['TravelDate']['id'])); ?>
		</td>
		<td><?php echo h($order['Order']['attendants']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['adults']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['young']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['children']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['comment']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['created']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['confirmed']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['canceled']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['start_day']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['end_day']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['start_time']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['end_time']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['employer_contribution']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['animals']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['animals_details']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['price']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['discount']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['final_price']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['provision']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['provision_reg']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['billing_price']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['notes']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $order['Order']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $order['Order']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $order['Order']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $order['Order']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Dates'), array('controller' => 'travel_dates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date'), array('controller' => 'travel_dates', 'action' => 'add')); ?> </li>
	</ul>
</div>
