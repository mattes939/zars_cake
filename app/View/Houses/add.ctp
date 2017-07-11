<div class="houses form">
<?php echo $this->Form->create('House'); ?>
	<fieldset>
		<legend><?php echo __('Add House'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('region_id');
		echo $this->Form->input('district_id');
		echo $this->Form->input('code');
		echo $this->Form->input('name');
		echo $this->Form->input('slug');
		echo $this->Form->input('long_name');
		echo $this->Form->input('active');
		echo $this->Form->input('website');
		echo $this->Form->input('coordinates');
		echo $this->Form->input('html_title');
		echo $this->Form->input('html_keywords');
		echo $this->Form->input('html_description');
		echo $this->Form->input('text_description');
		echo $this->Form->input('text_prices');
		echo $this->Form->input('text_equipment');
		echo $this->Form->input('text_activities');
		echo $this->Form->input('text_summer_activities');
		echo $this->Form->input('text_winter_activities');
		echo $this->Form->input('text_trips');
		echo $this->Form->input('Area');
		echo $this->Form->input('Portal');
		echo $this->Form->input('TravelDate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Houses'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), ['controller' => 'users', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), ['controller' => 'users', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), ['controller' => 'regions', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), ['controller' => 'regions', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Districts'), ['controller' => 'districts', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New District'), ['controller' => 'districts', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), ['controller' => 'addresses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), ['controller' => 'addresses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), ['controller' => 'orders', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), ['controller' => 'orders', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Reminders'), ['controller' => 'reminders', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Reminder'), ['controller' => 'reminders', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Reviews'), ['controller' => 'reviews', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Review'), ['controller' => 'reviews', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Special Offers'), ['controller' => 'special_offers', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Special Offer'), ['controller' => 'special_offers', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Values'), ['controller' => 'values', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Value'), ['controller' => 'values', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), ['controller' => 'areas', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), ['controller' => 'areas', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Portals'), ['controller' => 'portals', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Portal'), ['controller' => 'portals', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Dates'), ['controller' => 'travel_dates', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date'), ['controller' => 'travel_dates', 'action' => 'add']); ?> </li>
	</ul>
</div>
