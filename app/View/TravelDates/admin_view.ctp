<div class="travelDates view">
<h2><?php echo __('Travel Date'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($travelDate['TravelDate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Travel Date Type Id'); ?></dt>
		<dd>
			<?php echo h($travelDate['TravelDate']['travel_date_type_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('From'); ?></dt>
		<dd>
			<?php echo h($travelDate['TravelDate']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('To'); ?></dt>
		<dd>
			<?php echo h($travelDate['TravelDate']['end']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Travel Date'), array('action' => 'edit', $travelDate['TravelDate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Travel Date'), array('action' => 'delete', $travelDate['TravelDate']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $travelDate['TravelDate']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Dates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($travelDate['Order'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
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
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($travelDate['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td><?php echo $order['company_id']; ?></td>
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
<div class="related">
	<h3><?php echo __('Related Houses'); ?></h3>
	<?php if (!empty($travelDate['House'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Region Id'); ?></th>
		<th><?php echo __('District Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Long Name'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Coordinates'); ?></th>
		<th><?php echo __('Html Title'); ?></th>
		<th><?php echo __('Html Keywords'); ?></th>
		<th><?php echo __('Html Description'); ?></th>
		<th><?php echo __('Text Description'); ?></th>
		<th><?php echo __('Text Location'); ?></th>
		<th><?php echo __('Text Equipment'); ?></th>
		<th><?php echo __('Text Activities'); ?></th>
		<th><?php echo __('Text Summer Activities'); ?></th>
		<th><?php echo __('Text Winter Activities'); ?></th>
		<th><?php echo __('Text Trips'); ?></th>
		<th><?php echo __('Text Important'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Mesto'); ?></th>
		<th><?php echo __('Cenal'); ?></th>
		<th><?php echo __('Cenaz'); ?></th>
		<th><?php echo __('Area'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($travelDate['House'] as $house): ?>
		<tr>
			<td><?php echo $house['id']; ?></td>
			<td><?php echo $house['user_id']; ?></td>
			<td><?php echo $house['region_id']; ?></td>
			<td><?php echo $house['district_id']; ?></td>
			<td><?php echo $house['code']; ?></td>
			<td><?php echo $house['name']; ?></td>
			<td><?php echo $house['slug']; ?></td>
			<td><?php echo $house['long_name']; ?></td>
			<td><?php echo $house['active']; ?></td>
			<td><?php echo $house['website']; ?></td>
			<td><?php echo $house['coordinates']; ?></td>
			<td><?php echo $house['html_title']; ?></td>
			<td><?php echo $house['html_keywords']; ?></td>
			<td><?php echo $house['html_description']; ?></td>
			<td><?php echo $house['text_description']; ?></td>
			<td><?php echo $house['text_location']; ?></td>
			<td><?php echo $house['text_equipment']; ?></td>
			<td><?php echo $house['text_activities']; ?></td>
			<td><?php echo $house['text_summer_activities']; ?></td>
			<td><?php echo $house['text_winter_activities']; ?></td>
			<td><?php echo $house['text_trips']; ?></td>
			<td><?php echo $house['text_important']; ?></td>
			<td><?php echo $house['created']; ?></td>
			<td><?php echo $house['modified']; ?></td>
			<td><?php echo $house['mesto']; ?></td>
			<td><?php echo $house['cenal']; ?></td>
			<td><?php echo $house['cenaz']; ?></td>
			<td><?php echo $house['area']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'houses', 'action' => 'view', $house['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'houses', 'action' => 'edit', $house['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'houses', 'action' => 'delete', $house['id']), array('confirm' => __('Are you sure you want to delete # %s?', $house['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
