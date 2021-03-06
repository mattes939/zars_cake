<div class="districts index">
	<h2><?php echo __('Districts'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('region_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('html_title'); ?></th>
			<th><?php echo $this->Paginator->sort('html_keywords'); ?></th>
			<th><?php echo $this->Paginator->sort('html_description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($districts as $district): ?>
	<tr>
		<td><?php echo h($district['District']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($district['Region']['name'], ['controller' => 'regions', 'action' => 'view', $district['Region']['id']]); ?>
		</td>
		<td><?php echo h($district['District']['name']); ?>&nbsp;</td>
		<td><?php echo h($district['District']['slug']); ?>&nbsp;</td>
		<td><?php echo h($district['District']['html_title']); ?>&nbsp;</td>
		<td><?php echo h($district['District']['html_keywords']); ?>&nbsp;</td>
		<td><?php echo h($district['District']['html_description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $district['District']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $district['District']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $district['District']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $district['District']['id'])]); ?>
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
		<li><?php echo $this->Html->link(__('New District'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Regions'), ['controller' => 'regions', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), ['controller' => 'regions', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
	</ul>
</div>
