<div class="reminders form">
<?php echo $this->Form->create('Reminder', [
    'inputDefaults' => [
        'div' => ['class' => 'form-group'],
        'class' => 'form-control'
    ]
]); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Reminder'); ?></legend>
	<?php
		
		echo $this->Form->input('reminder_type_id', ['label' => 'Typ upomínky']);
                echo $this->Form->input('subject', ['value' => $text['subject']]);
		echo $this->Form->input('text', ['value' => $text['text'], 'rows' => 10]);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Odeslat a uložit email')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Reminders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Reminder Types'), array('controller' => 'reminder_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reminder Type'), array('controller' => 'reminder_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
	</ul>
</div>
