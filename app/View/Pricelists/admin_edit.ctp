<div class="pricelists form">
<?php echo $this->Form->create('Pricelist'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Pricelist'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Pricelist.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Pricelist.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Pricelists'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Prices'), array('controller' => 'prices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Price'), array('controller' => 'prices', 'action' => 'add')); ?> </li>
	</ul>
</div>
