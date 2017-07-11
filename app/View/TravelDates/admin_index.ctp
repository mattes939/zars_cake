<div class="travelDates index">
	<h2><?php echo __('Travel Dates'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('travel_date_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('start'); ?></th>
			<th><?php echo $this->Paginator->sort('end'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($travelDates as $travelDate): ?>
	<tr>
		<td><?php echo h($travelDate['TravelDate']['id']); ?>&nbsp;</td>
		<td><?php echo h($travelDate['TravelDate']['travel_date_type_id']); ?>&nbsp;</td>
		<td><?php echo h($travelDate['TravelDate']['start']); ?>&nbsp;</td>
		<td><?php echo h($travelDate['TravelDate']['end']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $travelDate['TravelDate']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $travelDate['TravelDate']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $travelDate['TravelDate']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $travelDate['TravelDate']['id'])]); ?>
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
		<li><?php echo $this->Html->link(__('New Travel Date'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), ['controller' => 'orders', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), ['controller' => 'orders', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
	</ul>
</div>
