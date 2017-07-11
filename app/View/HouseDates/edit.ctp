<div class="houseDates form">
<?php echo $this->Form->create('HouseDate'); ?>
	<fieldset>
		<legend><?php echo __('Edit House Date'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('house_id');
		echo $this->Form->input('travel_date_id');
		echo $this->Form->input('date_condition_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $this->Form->value('HouseDate.id')], ['confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('HouseDate.id'))]); ?></li>
		<li><?php echo $this->Html->link(__('List House Dates'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Dates'), ['controller' => 'travel_dates', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date'), ['controller' => 'travel_dates', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Date Conditions'), ['controller' => 'date_conditions', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Date Condition'), ['controller' => 'date_conditions', 'action' => 'add']); ?> </li>
	</ul>
</div>
