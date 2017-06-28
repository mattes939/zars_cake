<div class="orders form">
<?php echo $this->Form->create('Order'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Order'); ?></legend>
	<?php
		echo $this->Form->input('company_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('house_id');
		echo $this->Form->input('travel_date_id');
		echo $this->Form->input('attendants');
		echo $this->Form->input('adults');
		echo $this->Form->input('young');
		echo $this->Form->input('children');
		echo $this->Form->input('comment');
		echo $this->Form->input('confirmed');
		echo $this->Form->input('canceled');
		echo $this->Form->input('start_day');
		echo $this->Form->input('end_day');
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
		echo $this->Form->input('employer_contribution');
		echo $this->Form->input('animals');
		echo $this->Form->input('animals_details');
		echo $this->Form->input('price');
		echo $this->Form->input('discount');
		echo $this->Form->input('final_price');
		echo $this->Form->input('provision');
		echo $this->Form->input('provision_reg');
		echo $this->Form->input('billing_price');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Orders'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), ['controller' => 'companies', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), ['controller' => 'companies', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), ['controller' => 'users', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), ['controller' => 'users', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Dates'), ['controller' => 'travel_dates', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date'), ['controller' => 'travel_dates', 'action' => 'add']); ?> </li>
	</ul>
</div>
