<div class="travelDateTypes index">
	<h2><?php echo __('Travel Date Types'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($travelDateTypes as $travelDateType): ?>
	<tr>
		<td><?php echo h($travelDateType['TravelDateType']['id']); ?>&nbsp;</td>
		<td><?php echo h($travelDateType['TravelDateType']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $travelDateType['TravelDateType']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $travelDateType['TravelDateType']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $travelDateType['TravelDateType']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $travelDateType['TravelDateType']['id'])]); ?>
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
		<li><?php echo $this->Html->link(__('New Travel Date Type'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Travel Dates'), ['controller' => 'travel_dates', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date'), ['controller' => 'travel_dates', 'action' => 'add']); ?> </li>
	</ul>
</div>
