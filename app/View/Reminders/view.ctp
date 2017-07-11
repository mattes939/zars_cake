<div class="reminders view">
<h2><?php echo __('Reminder'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($reminder['Reminder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order Id'); ?></dt>
		<dd>
			<?php echo h($reminder['Reminder']['order_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reminder Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reminder['ReminderType']['name'], ['controller' => 'reminder_types', 'action' => 'view', $reminder['ReminderType']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($reminder['Reminder']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($reminder['Reminder']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($reminder['Reminder']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reminder'), ['action' => 'edit', $reminder['Reminder']['id']]); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reminder'), ['action' => 'delete', $reminder['Reminder']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $reminder['Reminder']['id'])]); ?> </li>
		<li><?php echo $this->Html->link(__('List Reminders'), ['action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Reminder'), ['action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Reminder Types'), ['controller' => 'reminder_types', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Reminder Type'), ['controller' => 'reminder_types', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
	</ul>
</div>
