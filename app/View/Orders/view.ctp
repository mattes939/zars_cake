<div class="orders view">
<h2><?php echo __('Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($order['Order']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['Company']['name'], array('controller' => 'companies', 'action' => 'view', $order['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['User']['username'], array('controller' => 'users', 'action' => 'view', $order['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('House'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['House']['name'], array('controller' => 'houses', 'action' => 'view', $order['House']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Travel Date'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['TravelDate']['id'], array('controller' => 'travel_dates', 'action' => 'view', $order['TravelDate']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attendants'); ?></dt>
		<dd>
			<?php echo h($order['Order']['attendants']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adults'); ?></dt>
		<dd>
			<?php echo h($order['Order']['adults']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Young'); ?></dt>
		<dd>
			<?php echo h($order['Order']['young']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Children'); ?></dt>
		<dd>
			<?php echo h($order['Order']['children']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($order['Order']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($order['Order']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confirmed'); ?></dt>
		<dd>
			<?php echo h($order['Order']['confirmed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Canceled'); ?></dt>
		<dd>
			<?php echo h($order['Order']['canceled']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Day'); ?></dt>
		<dd>
			<?php echo h($order['Order']['start_day']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Day'); ?></dt>
		<dd>
			<?php echo h($order['Order']['end_day']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Time'); ?></dt>
		<dd>
			<?php echo h($order['Order']['start_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Time'); ?></dt>
		<dd>
			<?php echo h($order['Order']['end_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employer Contribution'); ?></dt>
		<dd>
			<?php echo h($order['Order']['employer_contribution']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Animals'); ?></dt>
		<dd>
			<?php echo h($order['Order']['animals']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Animals Details'); ?></dt>
		<dd>
			<?php echo h($order['Order']['animals_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($order['Order']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discount'); ?></dt>
		<dd>
			<?php echo h($order['Order']['discount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Final Price'); ?></dt>
		<dd>
			<?php echo h($order['Order']['final_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provision'); ?></dt>
		<dd>
			<?php echo h($order['Order']['provision']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provision Reg'); ?></dt>
		<dd>
			<?php echo h($order['Order']['provision_reg']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Billing Price'); ?></dt>
		<dd>
			<?php echo h($order['Order']['billing_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($order['Order']['notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($order['Order']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order'), array('action' => 'edit', $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order'), array('action' => 'delete', $order['Order']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $order['Order']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Dates'), array('controller' => 'travel_dates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date'), array('controller' => 'travel_dates', 'action' => 'add')); ?> </li>
	</ul>
</div>
