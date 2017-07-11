<div class="companies form">
<?php echo $this->Form->create('Company'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Company'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('street');
		echo $this->Form->input('city');
		echo $this->Form->input('ico');
		echo $this->Form->input('dic');
		echo $this->Form->input('bank_account');
		echo $this->Form->input('bank_code');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $this->Form->value('Company.id')], ['confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Company.id'))]); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), ['controller' => 'orders', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), ['controller' => 'orders', 'action' => 'add']); ?> </li>
	</ul>
</div>
