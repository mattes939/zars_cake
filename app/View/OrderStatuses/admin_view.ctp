<div class="orderStatuses view">
<h2><?php echo __('Order Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($orderStatus['OrderStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($orderStatus['OrderStatus']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order Status'), array('action' => 'edit', $orderStatus['OrderStatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order Status'), array('action' => 'delete', $orderStatus['OrderStatus']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $orderStatus['OrderStatus']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($orderStatus['Order'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Order Status Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Portal Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('House Id'); ?></th>
		<th><?php echo __('Travel Date Id'); ?></th>
		<th><?php echo __('Attendants'); ?></th>
		<th><?php echo __('Adults'); ?></th>
		<th><?php echo __('Young'); ?></th>
		<th><?php echo __('Children'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Confirmed'); ?></th>
		<th><?php echo __('Canceled'); ?></th>
		<th><?php echo __('Start Day'); ?></th>
		<th><?php echo __('End Day'); ?></th>
		<th><?php echo __('Start Time'); ?></th>
		<th><?php echo __('End Time'); ?></th>
		<th><?php echo __('Employer Contribution'); ?></th>
		<th><?php echo __('Animals'); ?></th>
		<th><?php echo __('Animals Details'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Discount'); ?></th>
		<th><?php echo __('Final Price'); ?></th>
		<th><?php echo __('Provision'); ?></th>
		<th><?php echo __('Provision Reg'); ?></th>
		<th><?php echo __('Billing Price'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Pp'); ?></th>
		<th><?php echo __('Customer Date'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($orderStatus['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td><?php echo $order['order_status_id']; ?></td>
			<td><?php echo $order['company_id']; ?></td>
			<td><?php echo $order['portal_id']; ?></td>
			<td><?php echo $order['user_id']; ?></td>
			<td><?php echo $order['house_id']; ?></td>
			<td><?php echo $order['travel_date_id']; ?></td>
			<td><?php echo $order['attendants']; ?></td>
			<td><?php echo $order['adults']; ?></td>
			<td><?php echo $order['young']; ?></td>
			<td><?php echo $order['children']; ?></td>
			<td><?php echo $order['comment']; ?></td>
			<td><?php echo $order['created']; ?></td>
			<td><?php echo $order['confirmed']; ?></td>
			<td><?php echo $order['canceled']; ?></td>
			<td><?php echo $order['start_day']; ?></td>
			<td><?php echo $order['end_day']; ?></td>
			<td><?php echo $order['start_time']; ?></td>
			<td><?php echo $order['end_time']; ?></td>
			<td><?php echo $order['employer_contribution']; ?></td>
			<td><?php echo $order['animals']; ?></td>
			<td><?php echo $order['animals_details']; ?></td>
			<td><?php echo $order['price']; ?></td>
			<td><?php echo $order['discount']; ?></td>
			<td><?php echo $order['final_price']; ?></td>
			<td><?php echo $order['provision']; ?></td>
			<td><?php echo $order['provision_reg']; ?></td>
			<td><?php echo $order['billing_price']; ?></td>
			<td><?php echo $order['notes']; ?></td>
			<td><?php echo $order['modified']; ?></td>
			<td><?php echo $order['code']; ?></td>
			<td><?php echo $order['pp']; ?></td>
			<td><?php echo $order['customer_date']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), array('confirm' => __('Are you sure you want to delete # %s?', $order['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
