<div class="properties index">
	<h2><?php echo __('Properties'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('property_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('important'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('html_title'); ?></th>
			<th><?php echo $this->Paginator->sort('html_keywords'); ?></th>
			<th><?php echo $this->Paginator->sort('html_description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($properties as $property): ?>
	<tr>
		<td><?php echo h($property['Property']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($property['PropertyType']['name'], ['controller' => 'property_types', 'action' => 'view', $property['PropertyType']['id']]); ?>
		</td>
		<td><?php echo h($property['Property']['important']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['name']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['slug']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['html_title']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['html_keywords']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['html_description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $property['Property']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $property['Property']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $property['Property']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $property['Property']['id'])]); ?>
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
		<li><?php echo $this->Html->link(__('New Property'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Property Types'), ['controller' => 'property_types', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Property Type'), ['controller' => 'property_types', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Selections'), ['controller' => 'selections', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Selection'), ['controller' => 'selections', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Values'), ['controller' => 'values', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Value'), ['controller' => 'values', 'action' => 'add']); ?> </li>
	</ul>
</div>
