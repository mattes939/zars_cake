<div class="dateConditions view">
<h2><?php echo __('Date Condition'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dateCondition['DateCondition']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($dateCondition['DateCondition']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Date Condition'), array('action' => 'edit', $dateCondition['DateCondition']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Date Condition'), array('action' => 'delete', $dateCondition['DateCondition']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $dateCondition['DateCondition']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Date Conditions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Date Condition'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses Travel Dates'), array('controller' => 'houses_travel_dates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Houses Travel Date'), array('controller' => 'houses_travel_dates', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Houses Travel Dates'); ?></h3>
	<?php if (!empty($dateCondition['HousesTravelDate'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('House Id'); ?></th>
		<th><?php echo __('Travel Date Id'); ?></th>
		<th><?php echo __('Date Condition Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dateCondition['HousesTravelDate'] as $housesTravelDate): ?>
		<tr>
			<td><?php echo $housesTravelDate['id']; ?></td>
			<td><?php echo $housesTravelDate['house_id']; ?></td>
			<td><?php echo $housesTravelDate['travel_date_id']; ?></td>
			<td><?php echo $housesTravelDate['date_condition_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'houses_travel_dates', 'action' => 'view', $housesTravelDate['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'houses_travel_dates', 'action' => 'edit', $housesTravelDate['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'houses_travel_dates', 'action' => 'delete', $housesTravelDate['id']), array('confirm' => __('Are you sure you want to delete # %s?', $housesTravelDate['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Houses Travel Date'), array('controller' => 'houses_travel_dates', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
