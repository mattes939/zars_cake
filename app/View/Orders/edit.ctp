<div class="orders form">
<?php echo $this->Form->create('Order'); ?>
	<fieldset>
		<legend><?php echo __('Edit Order'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('order_status_id');
		echo $this->Form->input('house_date_id');
		echo $this->Form->input('company_id');
		echo $this->Form->input('portal_id');
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
		echo $this->Form->input('code');
		echo $this->Form->input('pp');
		echo $this->Form->input('customer_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Order.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Order.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Portals'), array('controller' => 'portals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Portal'), array('controller' => 'portals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Dates'), array('controller' => 'travel_dates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date'), array('controller' => 'travel_dates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List House Dates'), array('controller' => 'house_dates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House Date'), array('controller' => 'house_dates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Statuses'), array('controller' => 'order_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Status'), array('controller' => 'order_statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reminders'), array('controller' => 'reminders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reminder'), array('controller' => 'reminders', 'action' => 'add')); ?> </li>
	</ul>
</div>
