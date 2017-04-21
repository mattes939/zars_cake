<div class="travelDates form">
<?php echo $this->Form->create('TravelDate'); ?>
	<fieldset>
		<legend><?php echo __('Edit Travel Date'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TravelDate.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('TravelDate.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Travel Dates'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
	</ul>
</div>
