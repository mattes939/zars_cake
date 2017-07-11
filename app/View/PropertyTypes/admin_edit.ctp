<div class="propertyTypes form">
<?php echo $this->Form->create('PropertyType'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Property Type'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $this->Form->value('PropertyType.id')], ['confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('PropertyType.id'))]); ?></li>
		<li><?php echo $this->Html->link(__('List Property Types'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Properties'), ['controller' => 'properties', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Property'), ['controller' => 'properties', 'action' => 'add']); ?> </li>
	</ul>
</div>
