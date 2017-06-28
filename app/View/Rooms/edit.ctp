<div class="rooms form">
<?php echo $this->Form->create('Room'); ?>
	<fieldset>
		<legend><?php echo __('Edit Room'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('house_id');
		echo $this->Form->input('name');
		echo $this->Form->input('floor');
		echo $this->Form->input('size');
		echo $this->Form->input('heating');
		echo $this->Form->input('single_beds');
		echo $this->Form->input('double_beds');
		echo $this->Form->input('bunk_beds');
		echo $this->Form->input('total_beds');
		echo $this->Form->input('extra_beds');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $this->Form->value('Room.id')], ['confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Room.id'))]); ?></li>
		<li><?php echo $this->Html->link(__('List Rooms'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
	</ul>
</div>
