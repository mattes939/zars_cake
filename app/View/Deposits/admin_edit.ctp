<div class="deposits form">
<?php echo $this->Form->create('Deposit'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Deposit'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('order_id');
		echo $this->Form->input('deposit_type_id');
		echo $this->Form->input('price');
		echo $this->Form->input('maturity');
		echo $this->Form->input('pay_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Deposit.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Deposit.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Deposits'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Deposit Types'), array('controller' => 'deposit_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deposit Type'), array('controller' => 'deposit_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
