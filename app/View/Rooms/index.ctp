<div class="rooms index">
	<h2><?php echo __('Rooms'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('house_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('floor'); ?></th>
			<th><?php echo $this->Paginator->sort('size'); ?></th>
			<th><?php echo $this->Paginator->sort('heating'); ?></th>
			<th><?php echo $this->Paginator->sort('single_beds'); ?></th>
			<th><?php echo $this->Paginator->sort('double_beds'); ?></th>
			<th><?php echo $this->Paginator->sort('bunk_beds'); ?></th>
			<th><?php echo $this->Paginator->sort('total_beds'); ?></th>
			<th><?php echo $this->Paginator->sort('extra_beds'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($rooms as $room): ?>
	<tr>
		<td><?php echo h($room['Room']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($room['House']['name'], ['controller' => 'houses', 'action' => 'view', $room['House']['id']]); ?>
		</td>
		<td><?php echo h($room['Room']['name']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['floor']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['size']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['heating']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['single_beds']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['double_beds']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['bunk_beds']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['total_beds']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['extra_beds']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['created']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $room['Room']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $room['Room']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $room['Room']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $room['Room']['id'])]); ?>
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
		<li><?php echo $this->Html->link(__('New Room'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
	</ul>
</div>
