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
			<?php echo $this->Html->link($houseDate['House']['name'], array('controller' => 'houses', 'action' => 'view', $houseDate['House']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($houseDate['TravelDate']['id'], array('controller' => 'travel_dates', 'action' => 'view', $houseDate['TravelDate']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($houseDate['DateCondition']['name'], array('controller' => 'date_conditions', 'action' => 'view', $houseDate['DateCondition']['id'])); ?>
		</td>
		<td><?php echo h($houseDate['HouseDate']['created']); ?>&nbsp;</td>
		<td><?php echo h($houseDate['HouseDate']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $houseDate['HouseDate']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $houseDate['HouseDate']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $houseDate['HouseDate']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $houseDate['HouseDate']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New House Date'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Dates'), array('controller' => 'travel_dates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date'), array('controller' => 'travel_dates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Date Conditions'), array('controller' => 'date_conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Date Condition'), array('controller' => 'date_conditions', 'action' => 'add')); ?> </li>
	</ul>
</div>