<div class="prices index">
	<h2><?php echo __('Prices'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('house_id'); ?></th>
			<th><?php echo $this->Paginator->sort('travel_date_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('min_nights'); ?></th>
			<th><?php echo $this->Paginator->sort('min_persons'); ?></th>
			<th><?php echo $this->Paginator->sort('owner_basic'); ?></th>
			<th><?php echo $this->Paginator->sort('owner_additional_person_night'); ?></th>
			<th><?php echo $this->Paginator->sort('customer_basic'); ?></th>
			<th><?php echo $this->Paginator->sort('customer_additional_person_night'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($prices as $price): ?>
	<tr>
		<td><?php echo h($price['Price']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($price['House']['name'], array('controller' => 'houses', 'action' => 'view', $price['House']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($price['TravelDateType']['name'], array('controller' => 'travel_date_types', 'action' => 'view', $price['TravelDateType']['id'])); ?>
		</td>
		<td><?php echo h($price['Price']['min_nights']); ?>&nbsp;</td>
		<td><?php echo h($price['Price']['min_persons']); ?>&nbsp;</td>
		<td><?php echo h($price['Price']['owner_basic']); ?>&nbsp;</td>
		<td><?php echo h($price['Price']['owner_additional_person_night']); ?>&nbsp;</td>
		<td><?php echo h($price['Price']['customer_basic']); ?>&nbsp;</td>
		<td><?php echo h($price['Price']['customer_additional_person_night']); ?>&nbsp;</td>
		<td><?php echo h($price['Price']['notes']); ?>&nbsp;</td>
		<td><?php echo h($price['Price']['created']); ?>&nbsp;</td>
		<td><?php echo h($price['Price']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $price['Price']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $price['Price']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $price['Price']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $price['Price']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Price'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Date Types'), array('controller' => 'travel_date_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date Type'), array('controller' => 'travel_date_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
