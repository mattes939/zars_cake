<div class="regions form">
<?php echo $this->Form->create('Region'); ?>
	<fieldset>
		<legend><?php echo __('Edit Region'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('country_id');
		echo $this->Form->input('name');
		echo $this->Form->input('slug');
		echo $this->Form->input('html_title');
		echo $this->Form->input('html_keywords');
		echo $this->Form->input('html_description');
		echo $this->Form->input('Area');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $this->Form->value('Region.id')], ['confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Region.id'))]); ?></li>
		<li><?php echo $this->Html->link(__('List Regions'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), ['controller' => 'countries', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), ['controller' => 'countries', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Districts'), ['controller' => 'districts', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New District'), ['controller' => 'districts', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), ['controller' => 'areas', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), ['controller' => 'areas', 'action' => 'add']); ?> </li>
	</ul>
</div>
