<div class="reminderTypes form">
<?php echo $this->Form->create('ReminderType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Reminder Type'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $this->Form->value('ReminderType.id')], ['confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('ReminderType.id'))]); ?></li>
		<li><?php echo $this->Html->link(__('List Reminder Types'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Reminders'), ['controller' => 'reminders', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Reminder'), ['controller' => 'reminders', 'action' => 'add']); ?> </li>
	</ul>
</div>
