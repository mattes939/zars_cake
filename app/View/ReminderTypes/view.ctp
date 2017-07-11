<div class="reminderTypes view">
<h2><?php echo __('Reminder Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($reminderType['ReminderType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($reminderType['ReminderType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reminder Type'), ['action' => 'edit', $reminderType['ReminderType']['id']]); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reminder Type'), ['action' => 'delete', $reminderType['ReminderType']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $reminderType['ReminderType']['id'])]); ?> </li>
		<li><?php echo $this->Html->link(__('List Reminder Types'), ['action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Reminder Type'), ['action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Reminders'), ['controller' => 'reminders', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Reminder'), ['controller' => 'reminders', 'action' => 'add']); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Reminders'); ?></h3>
	<?php if (!empty($reminderType['Reminder'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Reminder Type Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($reminderType['Reminder'] as $reminder): ?>
		<tr>
			<td><?php echo $reminder['id']; ?></td>
			<td><?php echo $reminder['order_id']; ?></td>
			<td><?php echo $reminder['reminder_type_id']; ?></td>
			<td><?php echo $reminder['date']; ?></td>
			<td><?php echo $reminder['created']; ?></td>
			<td><?php echo $reminder['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), ['controller' => 'reminders', 'action' => 'view', $reminder['id']]); ?>
				<?php echo $this->Html->link(__('Edit'), ['controller' => 'reminders', 'action' => 'edit', $reminder['id']]); ?>
				<?php echo $this->Form->postLink(__('Delete'), ['controller' => 'reminders', 'action' => 'delete', $reminder['id']], ['confirm' => __('Are you sure you want to delete # %s?', $reminder['id'])]); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Reminder'), ['controller' => 'reminders', 'action' => 'add']); ?> </li>
		</ul>
	</div>
</div>
