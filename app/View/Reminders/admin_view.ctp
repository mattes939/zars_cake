	<dl>
		
		<dt><?php echo __('Druh'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reminder['ReminderType']['name'], array('controller' => 'reminder_types', 'action' => 'view', $reminder['ReminderType']['id'])); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Odesláno'); ?></dt>
		<dd>
			<?php echo $this->Time->format($reminder['Reminder']['created'], '%e. %m. %y'); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Předmět'); ?></dt>
		<dd>
			<?php echo h($reminder['Reminder']['subject']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Text'); ?></dt>
		<dd>
			<?php echo $reminder['Reminder']['text']; ?>
			&nbsp;
		</dd>
	</dl>