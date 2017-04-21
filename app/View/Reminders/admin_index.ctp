<div class="reminders index">
	<h2><?php echo __('Reminders'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('order_id'); ?></th>
			<th><?php echo $this->Paginator->sort('reminder_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($reminders as $reminder): ?>
	<tr>
		<td><?php echo h($reminder['Reminder']['id']); ?>&nbsp;</td>
		<td><?php echo h($reminder['Reminder']['order_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($reminder['ReminderType']['name'], array('controller' => 'reminder_types', 'action' => 'view', $reminder['ReminderType']['id'])); ?>
		</td>
		<td><?php echo h($reminder['Reminder']['date']); ?>&nbsp;</td>
		<td><?php echo h($reminder['Reminder']['created']); ?>&nbsp;</td>
		<td><?php echo h($reminder['Reminder']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $reminder['Reminder']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $reminder['Reminder']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $reminder['Reminder']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $reminder['Reminder']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Reminder'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reminder Types'), array('controller' => 'reminder_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reminder Type'), array('controller' => 'reminder_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
	</ul>
</div>
