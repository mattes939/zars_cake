<div class="houseDates view">
<h2><?php echo __('House Date'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($houseDate['HouseDate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('House'); ?></dt>
		<dd>
			<?php echo $this->Html->link($houseDate['House']['name'], array('controller' => 'houses', 'action' => 'view', $houseDate['House']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Travel Date'); ?></dt>
		<dd>
			<?php echo $this->Html->link($houseDate['TravelDate']['id'], array('controller' => 'travel_dates', 'action' => 'view', $houseDate['TravelDate']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Condition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($houseDate['DateCondition']['name'], array('controller' => 'date_conditions', 'action' => 'view', $houseDate['DateCondition']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($houseDate['HouseDate']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($houseDate['HouseDate']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit House Date'), array('action' => 'edit', $houseDate['HouseDate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete House Date'), array('action' => 'delete', $houseDate['HouseDate']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $houseDate['HouseDate']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List House Dates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House Date'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Dates'), array('controller' => 'travel_dates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date'), array('controller' => 'travel_dates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Date Conditions'), array('controller' => 'date_conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Date Condition'), array('controller' => 'date_conditions', 'action' => 'add')); ?> </li>
	</ul>
</div>
