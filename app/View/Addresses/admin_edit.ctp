<div class="addresses form">
<?php echo $this->Form->create('Address'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Address'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('address_type_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('street');
		echo $this->Form->input('city');
		echo $this->Form->input('psc');
		echo $this->Form->input('house_id');
		echo $this->Form->input('country_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $this->Form->value('Address.id')], ['confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Address.id'))]); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Address Types'), ['controller' => 'address_types', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Address Type'), ['controller' => 'address_types', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), ['controller' => 'users', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), ['controller' => 'users', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), ['controller' => 'countries', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), ['controller' => 'countries', 'action' => 'add']); ?> </li>
	</ul>
</div>
