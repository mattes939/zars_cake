<div class="travelDateTypes form">
<?php echo $this->Form->create('TravelDateType'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Travel Date Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $this->Form->value('TravelDateType.id')], ['confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('TravelDateType.id'))]); ?></li>
		<li><?php echo $this->Html->link(__('List Travel Date Types'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Travel Dates'), ['controller' => 'travel_dates', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date'), ['controller' => 'travel_dates', 'action' => 'add']); ?> </li>
	</ul>
</div>
