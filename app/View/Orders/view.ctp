<div class="orders view">
<h2><?php echo __('Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($order['Order']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['OrderStatus']['name'], ['controller' => 'order_statuses', 'action' => 'view', $order['OrderStatus']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('House Date'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['HouseDate']['id'], ['controller' => 'house_dates', 'action' => 'view', $order['HouseDate']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['Company']['name'], ['controller' => 'companies', 'action' => 'view', $order['Company']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Portal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['Portal']['name'], ['controller' => 'portals', 'action' => 'view', $order['Portal']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['User']['username'], ['controller' => 'users', 'action' => 'view', $order['User']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('House'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['House']['name'], ['controller' => 'houses', 'action' => 'view', $order['House']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Travel Date'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['TravelDate']['id'], ['controller' => 'travel_dates', 'action' => 'view', $order['TravelDate']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attendants'); ?></dt>
		<dd>
			<?php echo h($order['Order']['attendants']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adults'); ?></dt>
		<dd>
			<?php echo h($order['Order']['adults']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Young'); ?></dt>
		<dd>
			<?php echo h($order['Order']['young']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Children'); ?></dt>
		<dd>
			<?php echo h($order['Order']['children']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($order['Order']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($order['Order']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confirmed'); ?></dt>
		<dd>
			<?php echo h($order['Order']['confirmed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Canceled'); ?></dt>
		<dd>
			<?php echo h($order['Order']['canceled']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Day'); ?></dt>
		<dd>
			<?php echo h($order['Order']['start_day']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Day'); ?></dt>
		<dd>
			<?php echo h($order['Order']['end_day']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Time'); ?></dt>
		<dd>
			<?php echo h($order['Order']['start_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Time'); ?></dt>
		<dd>
			<?php echo h($order['Order']['end_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employer Contribution'); ?></dt>
		<dd>
			<?php echo h($order['Order']['employer_contribution']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Animals'); ?></dt>
		<dd>
			<?php echo h($order['Order']['animals']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Animals Details'); ?></dt>
		<dd>
			<?php echo h($order['Order']['animals_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($order['Order']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discount'); ?></dt>
		<dd>
			<?php echo h($order['Order']['discount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Final Price'); ?></dt>
		<dd>
			<?php echo h($order['Order']['final_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provision'); ?></dt>
		<dd>
			<?php echo h($order['Order']['provision']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provision Reg'); ?></dt>
		<dd>
			<?php echo h($order['Order']['provision_reg']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Billing Price'); ?></dt>
		<dd>
			<?php echo h($order['Order']['billing_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($order['Order']['notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($order['Order']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($order['Order']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pp'); ?></dt>
		<dd>
			<?php echo h($order['Order']['pp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer Date'); ?></dt>
		<dd>
			<?php echo h($order['Order']['customer_date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order'), ['action' => 'edit', $order['Order']['id']]); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order['Order']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $order['Order']['id'])]); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), ['action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), ['action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), ['controller' => 'companies', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), ['controller' => 'companies', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Portals'), ['controller' => 'portals', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Portal'), ['controller' => 'portals', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), ['controller' => 'users', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), ['controller' => 'users', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Dates'), ['controller' => 'travel_dates', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date'), ['controller' => 'travel_dates', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List House Dates'), ['controller' => 'house_dates', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House Date'), ['controller' => 'house_dates', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Statuses'), ['controller' => 'order_statuses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Status'), ['controller' => 'order_statuses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Reminders'), ['controller' => 'reminders', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Reminder'), ['controller' => 'reminders', 'action' => 'add']); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Reminders'); ?></h3>
	<?php if (!empty($order['Reminder'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Reminder Type Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($order['Reminder'] as $reminder): ?>
		<tr>
			<td><?php echo $reminder['id']; ?></td>
			<td><?php echo $reminder['order_id']; ?></td>
			<td><?php echo $reminder['reminder_type_id']; ?></td>
			<td><?php echo $reminder['date']; ?></td>
			<td><?php echo $reminder['created']; ?></td>
			<td><?php echo $reminder['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), ['controller' => 'reminders', 'action' => 'view', $reminder['id']]); ?>
				<?php echo $this->Html->link(__('Edit'), ['controller' => 'reminders', 'action' => 'edit', $reminder['id']]); ?>
				<?php echo $this->Form->postLink(__('Delete'), ['controller' => 'reminders', 'action' => 'delete', $reminder['id']], ['confirm' => __('Are you sure you want to delete # %s?', $reminder['id'])]); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Reminder'), ['controller' => 'reminders', 'action' => 'add']); ?> </li>
		</ul>
	</div>
</div>
