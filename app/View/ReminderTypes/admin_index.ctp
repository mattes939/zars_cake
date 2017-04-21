<div class="reminderTypes index">
	<h2><?php echo __('Reminder Types'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($reminderTypes as $reminderType): ?>
	<tr>
		<td><?php echo h($reminderType['ReminderType']['id']); ?>&nbsp;</td>
		<td><?php echo h($reminderType['ReminderType']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $reminderType['ReminderType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $reminderType['ReminderType']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $reminderType['ReminderType']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $reminderType['ReminderType']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Reminder Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reminders'), array('controller' => 'reminders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reminder'), array('controller' => 'reminders', 'action' => 'add')); ?> </li>
	</ul>
</div>
