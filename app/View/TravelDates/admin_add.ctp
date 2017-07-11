<div class="travelDates form">
<?php echo $this->Form->create('TravelDate'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Travel Date'); ?></legend>
	<?php
		echo $this->Form->input('travel_date_type_id');
		echo $this->Form->input('start');
		echo $this->Form->input('end');
		echo $this->Form->input('House');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Travel Dates'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), ['controller' => 'orders', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), ['controller' => 'orders', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
	</ul>
</div>
