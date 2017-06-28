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
			<?php echo $this->Html->link($houseDate['House']['name'], ['controller' => 'houses', 'action' => 'view', $houseDate['House']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Travel Date'); ?></dt>
		<dd>
			<?php echo $this->Html->link($houseDate['TravelDate']['id'], ['controller' => 'travel_dates', 'action' => 'view', $houseDate['TravelDate']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Condition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($houseDate['DateCondition']['name'], ['controller' => 'date_conditions', 'action' => 'view', $houseDate['DateCondition']['id']]); ?>
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
		<li><?php echo $this->Html->link(__('Edit House Date'), ['action' => 'edit', $houseDate['HouseDate']['id']]); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete House Date'), ['action' => 'delete', $houseDate['HouseDate']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $houseDate['HouseDate']['id'])]); ?> </li>
		<li><?php echo $this->Html->link(__('List House Dates'), ['action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House Date'), ['action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Dates'), ['controller' => 'travel_dates', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date'), ['controller' => 'travel_dates', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Date Conditions'), ['controller' => 'date_conditions', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Date Condition'), ['controller' => 'date_conditions', 'action' => 'add']); ?> </li>
	</ul>
</div>
