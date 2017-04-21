<div class="reminderTypes form">
<?php echo $this->Form->create('ReminderType'); ?>
	<fieldset>
		<legend><?php echo __('Add Reminder Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Reminder Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Reminders'), array('controller' => 'reminders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reminder'), array('controller' => 'reminders', 'action' => 'add')); ?> </li>
	</ul>
</div>
