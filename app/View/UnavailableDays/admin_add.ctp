<div class="unavailableDays form">
<?php echo $this->Form->create('UnavailableDay'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Unavailable Day'); ?></legend>
	<?php
		echo $this->Form->input('house_date_id');
		echo $this->Form->input('date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Unavailable Days'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List House Dates'), array('controller' => 'house_dates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House Date'), array('controller' => 'house_dates', 'action' => 'add')); ?> </li>
	</ul>
</div>
