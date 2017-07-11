<div class="values index">
	<h2><?php echo __('Values'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('house_id'); ?></th>
			<th><?php echo $this->Paginator->sort('property_id'); ?></th>
			<th><?php echo $this->Paginator->sort('switch'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($values as $value): ?>
	<tr>
		<td><?php echo h($value['Value']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($value['House']['name'], ['controller' => 'houses', 'action' => 'view', $value['House']['id']]); ?>
		</td>
		<td>
			<?php echo $this->Html->link($value['Property']['name'], ['controller' => 'properties', 'action' => 'view', $value['Property']['id']]); ?>
		</td>
		<td><?php echo h($value['Value']['switch']); ?>&nbsp;</td>
		<td><?php echo h($value['Value']['value']); ?>&nbsp;</td>
		<td><?php echo h($value['Value']['created']); ?>&nbsp;</td>
		<td><?php echo h($value['Value']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $value['Value']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $value['Value']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $value['Value']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $value['Value']['id'])]); ?>
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
		<li><?php echo $this->Html->link(__('New Value'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Properties'), ['controller' => 'properties', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Property'), ['controller' => 'properties', 'action' => 'add']); ?> </li>
	</ul>
</div>
