<div class="dateConditions index">
	<h2><?php echo __('Date Conditions'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($dateConditions as $dateCondition): ?>
	<tr>
		<td><?php echo h($dateCondition['DateCondition']['id']); ?>&nbsp;</td>
		<td><?php echo h($dateCondition['DateCondition']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $dateCondition['DateCondition']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $dateCondition['DateCondition']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $dateCondition['DateCondition']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $dateCondition['DateCondition']['id'])]); ?>
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
		<li><?php echo $this->Html->link(__('New Date Condition'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Houses Travel Dates'), ['controller' => 'houses_travel_dates', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Houses Travel Date'), ['controller' => 'houses_travel_dates', 'action' => 'add']); ?> </li>
	</ul>
</div>
