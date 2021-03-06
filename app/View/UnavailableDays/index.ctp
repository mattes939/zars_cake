<div class="unavailableDays index">
	<h2><?php echo __('Unavailable Days'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('house_date_id'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($unavailableDays as $unavailableDay): ?>
	<tr>
		<td><?php echo h($unavailableDay['UnavailableDay']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($unavailableDay['HouseDate']['id'], ['controller' => 'house_dates', 'action' => 'view', $unavailableDay['HouseDate']['id']]); ?>
		</td>
		<td><?php echo h($unavailableDay['UnavailableDay']['date']); ?>&nbsp;</td>
		<td><?php echo h($unavailableDay['UnavailableDay']['created']); ?>&nbsp;</td>
		<td><?php echo h($unavailableDay['UnavailableDay']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $unavailableDay['UnavailableDay']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $unavailableDay['UnavailableDay']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $unavailableDay['UnavailableDay']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $unavailableDay['UnavailableDay']['id'])]); ?>
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
		<li><?php echo $this->Html->link(__('New Unavailable Day'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List House Dates'), ['controller' => 'house_dates', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House Date'), ['controller' => 'house_dates', 'action' => 'add']); ?> </li>
	</ul>
</div>
