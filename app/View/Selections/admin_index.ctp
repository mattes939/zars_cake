<div class="selections index">
	<h2><?php echo __('Selections'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('area_id'); ?></th>
			<th><?php echo $this->Paginator->sort('property_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('html_keywords'); ?></th>
			<th><?php echo $this->Paginator->sort('html_title'); ?></th>
			<th><?php echo $this->Paginator->sort('html_description'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($selections as $selection): ?>
	<tr>
		<td><?php echo h($selection['Selection']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($selection['Area']['name'], ['controller' => 'areas', 'action' => 'view', $selection['Area']['id']]); ?>
		</td>
		<td>
			<?php echo $this->Html->link($selection['Property']['name'], ['controller' => 'properties', 'action' => 'view', $selection['Property']['id']]); ?>
		</td>
		<td><?php echo h($selection['Selection']['name']); ?>&nbsp;</td>
		<td><?php echo h($selection['Selection']['slug']); ?>&nbsp;</td>
		<td><?php echo h($selection['Selection']['content']); ?>&nbsp;</td>
		<td><?php echo h($selection['Selection']['html_keywords']); ?>&nbsp;</td>
		<td><?php echo h($selection['Selection']['html_title']); ?>&nbsp;</td>
		<td><?php echo h($selection['Selection']['html_description']); ?>&nbsp;</td>
		<td><?php echo h($selection['Selection']['created']); ?>&nbsp;</td>
		<td><?php echo h($selection['Selection']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $selection['Selection']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $selection['Selection']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $selection['Selection']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $selection['Selection']['id'])]); ?>
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
		<li><?php echo $this->Html->link(__('New Selection'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Areas'), ['controller' => 'areas', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), ['controller' => 'areas', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Properties'), ['controller' => 'properties', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Property'), ['controller' => 'properties', 'action' => 'add']); ?> </li>
	</ul>
</div>
