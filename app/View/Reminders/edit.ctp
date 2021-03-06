<div class="reminders form">
<?php echo $this->Form->create('Reminder'); ?>
	<fieldset>
		<legend><?php echo __('Edit Reminder'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('order_id');
		echo $this->Form->input('reminder_type_id');
		echo $this->Form->input('date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $this->Form->value('Reminder.id')], ['confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Reminder.id'))]); ?></li>
		<li><?php echo $this->Html->link(__('List Reminders'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Reminder Types'), ['controller' => 'reminder_types', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Reminder Type'), ['controller' => 'reminder_types', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
	</ul>
</div>
