<div class="propertyTypes index">
	<h2><?php echo __('Property Types'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($propertyTypes as $propertyType): ?>
	<tr>
		<td><?php echo h($propertyType['PropertyType']['id']); ?>&nbsp;</td>
		<td><?php echo h($propertyType['PropertyType']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $propertyType['PropertyType']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $propertyType['PropertyType']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $propertyType['PropertyType']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $propertyType['PropertyType']['id'])]); ?>
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
		<li><?php echo $this->Html->link(__('New Property Type'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Properties'), ['controller' => 'properties', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Property'), ['controller' => 'properties', 'action' => 'add']); ?> </li>
	</ul>
</div>
