<div class="houses view">
<h2><?php echo __('House'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($house['House']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($house['User']['username'], array('controller' => 'users', 'action' => 'view', $house['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo $this->Html->link($house['Region']['name'], array('controller' => 'regions', 'action' => 'view', $house['Region']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($house['District']['name'], array('controller' => 'districts', 'action' => 'view', $house['District']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($house['House']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($house['House']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($house['House']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Long Name'); ?></dt>
		<dd>
			<?php echo h($house['House']['long_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($house['House']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($house['House']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coordinates'); ?></dt>
		<dd>
			<?php echo h($house['House']['coordinates']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Title'); ?></dt>
		<dd>
			<?php echo h($house['House']['html_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Keywords'); ?></dt>
		<dd>
			<?php echo h($house['House']['html_keywords']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Description'); ?></dt>
		<dd>
			<?php echo h($house['House']['html_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text Description'); ?></dt>
		<dd>
			<?php echo h($house['House']['text_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text Prices'); ?></dt>
		<dd>
			<?php echo h($house['House']['text_prices']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text Equipment'); ?></dt>
		<dd>
			<?php echo h($house['House']['text_equipment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text Activities'); ?></dt>
		<dd>
			<?php echo h($house['House']['text_activities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text Summer Activities'); ?></dt>
		<dd>
			<?php echo h($house['House']['text_summer_activities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text Winter Activities'); ?></dt>
		<dd>
			<?php echo h($house['House']['text_winter_activities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text Trips'); ?></dt>
		<dd>
			<?php echo h($house['House']['text_trips']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($house['House']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($house['House']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit House'), array('action' => 'edit', $house['House']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete House'), array('action' => 'delete', $house['House']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $house['House']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('controller' => 'regions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Districts'), array('controller' => 'districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District'), array('controller' => 'districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reminders'), array('controller' => 'reminders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reminder'), array('controller' => 'reminders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reviews'), array('controller' => 'reviews', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Review'), array('controller' => 'reviews', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Special Offers'), array('controller' => 'special_offers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Special Offer'), array('controller' => 'special_offers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Values'), array('controller' => 'values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Value'), array('controller' => 'values', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), array('controller' => 'areas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Portals'), array('controller' => 'portals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Portal'), array('controller' => 'portals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Dates'), array('controller' => 'travel_dates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date'), array('controller' => 'travel_dates', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Addresses'); ?></h3>
	<?php if (!empty($house['Address'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Address Type Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Street'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Psc'); ?></th>
		<th><?php echo __('House Id'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($house['Address'] as $address): ?>
		<tr>
			<td><?php echo $address['id']; ?></td>
			<td><?php echo $address['address_type_id']; ?></td>
			<td><?php echo $address['user_id']; ?></td>
			<td><?php echo $address['street']; ?></td>
			<td><?php echo $address['city']; ?></td>
			<td><?php echo $address['psc']; ?></td>
			<td><?php echo $address['house_id']; ?></td>
			<td><?php echo $address['country_id']; ?></td>
			<td><?php echo $address['created']; ?></td>
			<td><?php echo $address['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'addresses', 'action' => 'view', $address['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'addresses', 'action' => 'edit', $address['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'addresses', 'action' => 'delete', $address['id']), array('confirm' => __('Are you sure you want to delete # %s?', $address['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($house['Order'])): ?>
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
	<?php foreach ($house['Order'] as $order): ?>
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
	<h3><?php echo __('Related Reminders'); ?></h3>
	<?php if (!empty($house['Reminder'])): ?>
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
	<?php foreach ($house['Reminder'] as $reminder): ?>
		<tr>
			<td><?php echo $reminder['id']; ?></td>
			<td><?php echo $reminder['order_id']; ?></td>
			<td><?php echo $reminder['reminder_type_id']; ?></td>
			<td><?php echo $reminder['date']; ?></td>
			<td><?php echo $reminder['created']; ?></td>
			<td><?php echo $reminder['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'reminders', 'action' => 'view', $reminder['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'reminders', 'action' => 'edit', $reminder['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'reminders', 'action' => 'delete', $reminder['id']), array('confirm' => __('Are you sure you want to delete # %s?', $reminder['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Reminder'), array('controller' => 'reminders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Reviews'); ?></h3>
	<?php if (!empty($house['Review'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('House Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Score'); ?></th>
		<th><?php echo __('Pros'); ?></th>
		<th><?php echo __('Cons'); ?></th>
		<th><?php echo __('Public'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($house['Review'] as $review): ?>
		<tr>
			<td><?php echo $review['id']; ?></td>
			<td><?php echo $review['house_id']; ?></td>
			<td><?php echo $review['user_id']; ?></td>
			<td><?php echo $review['score']; ?></td>
			<td><?php echo $review['pros']; ?></td>
			<td><?php echo $review['cons']; ?></td>
			<td><?php echo $review['public']; ?></td>
			<td><?php echo $review['created']; ?></td>
			<td><?php echo $review['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'reviews', 'action' => 'view', $review['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'reviews', 'action' => 'edit', $review['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'reviews', 'action' => 'delete', $review['id']), array('confirm' => __('Are you sure you want to delete # %s?', $review['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Review'), array('controller' => 'reviews', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Special Offers'); ?></h3>
	<?php if (!empty($house['SpecialOffer'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('House Id'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('From'); ?></th>
		<th><?php echo __('To'); ?></th>
		<th><?php echo __('Referential'); ?></th>
		<th><?php echo __('Hidden'); ?></th>
		<th><?php echo __('Html Title'); ?></th>
		<th><?php echo __('Html Keywords'); ?></th>
		<th><?php echo __('Html Description'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($house['SpecialOffer'] as $specialOffer): ?>
		<tr>
			<td><?php echo $specialOffer['id']; ?></td>
			<td><?php echo $specialOffer['lft']; ?></td>
			<td><?php echo $specialOffer['rght']; ?></td>
			<td><?php echo $specialOffer['parent_id']; ?></td>
			<td><?php echo $specialOffer['house_id']; ?></td>
			<td><?php echo $specialOffer['content']; ?></td>
			<td><?php echo $specialOffer['from']; ?></td>
			<td><?php echo $specialOffer['to']; ?></td>
			<td><?php echo $specialOffer['referential']; ?></td>
			<td><?php echo $specialOffer['hidden']; ?></td>
			<td><?php echo $specialOffer['html_title']; ?></td>
			<td><?php echo $specialOffer['html_keywords']; ?></td>
			<td><?php echo $specialOffer['html_description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'special_offers', 'action' => 'view', $specialOffer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'special_offers', 'action' => 'edit', $specialOffer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'special_offers', 'action' => 'delete', $specialOffer['id']), array('confirm' => __('Are you sure you want to delete # %s?', $specialOffer['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Special Offer'), array('controller' => 'special_offers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Values'); ?></h3>
	<?php if (!empty($house['Value'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('House Id'); ?></th>
		<th><?php echo __('Property Id'); ?></th>
		<th><?php echo __('True'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($house['Value'] as $value): ?>
		<tr>
			<td><?php echo $value['id']; ?></td>
			<td><?php echo $value['house_id']; ?></td>
			<td><?php echo $value['property_id']; ?></td>
			<td><?php echo $value['switch']; ?></td>
			<td><?php echo $value['value']; ?></td>
			<td><?php echo $value['created']; ?></td>
			<td><?php echo $value['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'values', 'action' => 'view', $value['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'values', 'action' => 'edit', $value['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'values', 'action' => 'delete', $value['id']), array('confirm' => __('Are you sure you want to delete # %s?', $value['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Value'), array('controller' => 'values', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Areas'); ?></h3>
	<?php if (!empty($house['Area'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Map'); ?></th>
		<th><?php echo __('Html Title'); ?></th>
		<th><?php echo __('Html Description'); ?></th>
		<th><?php echo __('Html Keywords'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($house['Area'] as $area): ?>
		<tr>
			<td><?php echo $area['id']; ?></td>
			<td><?php echo $area['name']; ?></td>
			<td><?php echo $area['slug']; ?></td>
			<td><?php echo $area['map']; ?></td>
			<td><?php echo $area['html_title']; ?></td>
			<td><?php echo $area['html_description']; ?></td>
			<td><?php echo $area['html_keywords']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'areas', 'action' => 'view', $area['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'areas', 'action' => 'edit', $area['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'areas', 'action' => 'delete', $area['id']), array('confirm' => __('Are you sure you want to delete # %s?', $area['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Area'), array('controller' => 'areas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Portals'); ?></h3>
	<?php if (!empty($house['Portal'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($house['Portal'] as $portal): ?>
		<tr>
			<td><?php echo $portal['id']; ?></td>
			<td><?php echo $portal['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'portals', 'action' => 'view', $portal['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'portals', 'action' => 'edit', $portal['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'portals', 'action' => 'delete', $portal['id']), array('confirm' => __('Are you sure you want to delete # %s?', $portal['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Portal'), array('controller' => 'portals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Travel Dates'); ?></h3>
	<?php if (!empty($house['TravelDate'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Travel Date Type Id'); ?></th>
		<th><?php echo __('From'); ?></th>
		<th><?php echo __('To'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($house['TravelDate'] as $travelDate): ?>
		<tr>
			<td><?php echo $travelDate['id']; ?></td>
			<td><?php echo $travelDate['travel_date_type_id']; ?></td>
			<td><?php echo $travelDate['from']; ?></td>
			<td><?php echo $travelDate['to']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'travel_dates', 'action' => 'view', $travelDate['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'travel_dates', 'action' => 'edit', $travelDate['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'travel_dates', 'action' => 'delete', $travelDate['id']), array('confirm' => __('Are you sure you want to delete # %s?', $travelDate['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Travel Date'), array('controller' => 'travel_dates', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
