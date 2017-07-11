<div class="properties form">
<?php echo $this->Form->create('Property'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Property'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('property_type_id');
		echo $this->Form->input('important');
		echo $this->Form->input('name');
		echo $this->Form->input('slug');
		echo $this->Form->input('html_title');
		echo $this->Form->input('html_keywords');
		echo $this->Form->input('html_description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $this->Form->value('Property.id')], ['confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Property.id'))]); ?></li>
		<li><?php echo $this->Html->link(__('List Properties'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Property Types'), ['controller' => 'property_types', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Property Type'), ['controller' => 'property_types', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Selections'), ['controller' => 'selections', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Selection'), ['controller' => 'selections', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Values'), ['controller' => 'values', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Value'), ['controller' => 'values', 'action' => 'add']); ?> </li>
	</ul>
</div>
