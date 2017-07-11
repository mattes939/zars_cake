<div class="values form">
<?php echo $this->Form->create('Value'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Value'); ?></legend>
	<?php
		echo $this->Form->input('house_id');
		echo $this->Form->input('property_id');
		echo $this->Form->input('switch');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Values'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Properties'), ['controller' => 'properties', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Property'), ['controller' => 'properties', 'action' => 'add']); ?> </li>
	</ul>
</div>
