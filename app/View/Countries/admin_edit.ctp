<div class="countries form">
<?php echo $this->Form->create('Country'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Country'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $this->Form->value('Country.id')], ['confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Country.id'))]); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses'), ['controller' => 'addresses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), ['controller' => 'addresses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), ['controller' => 'regions', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), ['controller' => 'regions', 'action' => 'add']); ?> </li>
	</ul>
</div>
