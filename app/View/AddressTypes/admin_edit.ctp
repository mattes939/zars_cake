<div class="addressTypes form">
<?php echo $this->Form->create('AddressType'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Address Type'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AddressType.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('AddressType.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Address Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
