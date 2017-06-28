<div class="dateConditions form">
<?php echo $this->Form->create('DateCondition'); ?>
	<fieldset>
		<legend><?php echo __('Add Date Condition'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Date Conditions'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Houses Travel Dates'), ['controller' => 'houses_travel_dates', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Houses Travel Date'), ['controller' => 'houses_travel_dates', 'action' => 'add']); ?> </li>
	</ul>
</div>
