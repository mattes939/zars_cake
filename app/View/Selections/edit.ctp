<div class="selections form">
<?php echo $this->Form->create('Selection'); ?>
	<fieldset>
		<legend><?php echo __('Edit Selection'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('area_id');
		echo $this->Form->input('property_id');
		echo $this->Form->input('name');
		echo $this->Form->input('slug');
		echo $this->Form->input('content');
		echo $this->Form->input('html_keywords');
		echo $this->Form->input('html_title');
		echo $this->Form->input('html_description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $this->Form->value('Selection.id')], ['confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Selection.id'))]); ?></li>
		<li><?php echo $this->Html->link(__('List Selections'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Areas'), ['controller' => 'areas', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), ['controller' => 'areas', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Properties'), ['controller' => 'properties', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Property'), ['controller' => 'properties', 'action' => 'add']); ?> </li>
	</ul>
</div>
