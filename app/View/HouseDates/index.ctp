<div class="houseDates index">
	<h2><?php echo __('House Dates'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('house_id'); ?></th>
			<th><?php echo $this->Paginator->sort('travel_date_id'); ?></th>
			<th><?php echo $this->Paginator->sort('date_condition_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($houseDates as $houseDate): ?>
	<tr>
		<td><?php echo h($houseDate['HouseDate']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($houseDate['House']['name'], ['controller' => 'houses', 'action' => 'view', $houseDate['House']['id']]); ?>
		</td>
		<td>
			<?php echo $this->Html->link($houseDate['TravelDate']['id'], ['controller' => 'travel_dates', 'action' => 'view', $houseDate['TravelDate']['id']]); ?>
		</td>
		<td>
			<?php echo $this->Html->link($houseDate['DateCondition']['name'], ['controller' => 'date_conditions', 'action' => 'view', $houseDate['DateCondition']['id']]); ?>
		</td>
		<td><?php echo h($houseDate['HouseDate']['created']); ?>&nbsp;</td>
		<td><?php echo h($houseDate['HouseDate']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $houseDate['HouseDate']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $houseDate['HouseDate']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $houseDate['HouseDate']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $houseDate['HouseDate']['id'])]); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter([
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	]);
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), [], null, ['class' => 'prev disabled']);
		echo $this->Paginator->numbers(['separator' => '']);
		echo $this->Paginator->next(__('next') . ' >', [], null, ['class' => 'next disabled']);
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New House Date'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Dates'), ['controller' => 'travel_dates', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date'), ['controller' => 'travel_dates', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Date Conditions'), ['controller' => 'date_conditions', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Date Condition'), ['controller' => 'date_conditions', 'action' => 'add']); ?> </li>
	</ul>
</div>
