<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add User'); ?></legend>
	<?php
		echo $this->Form->input('group_id');
		echo $this->Form->input('username');
		echo $this->Form->input('pwd');
		echo $this->Form->input('pin');
		echo $this->Form->input('degree');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('bank_account');
		echo $this->Form->input('hidden');
		echo $this->Form->input('active');
		echo $this->Form->input('birthday');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), ['controller' => 'groups', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), ['controller' => 'groups', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), ['controller' => 'addresses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), ['controller' => 'addresses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Logs'), ['controller' => 'logs', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), ['controller' => 'logs', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), ['controller' => 'orders', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), ['controller' => 'orders', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Reviews'), ['controller' => 'reviews', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Review'), ['controller' => 'reviews', 'action' => 'add']); ?> </li>
	</ul>
</div>
