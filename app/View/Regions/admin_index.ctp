<div class="regions index">
	<h2><?php echo __('Regions'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('html_title'); ?></th>
			<th><?php echo $this->Paginator->sort('html_keywords'); ?></th>
			<th><?php echo $this->Paginator->sort('html_description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($regions as $region): ?>
	<tr>
		<td><?php echo h($region['Region']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($region['Country']['name'], ['controller' => 'countries', 'action' => 'view', $region['Country']['id']]); ?>
		</td>
		<td><?php echo h($region['Region']['name']); ?>&nbsp;</td>
		<td><?php echo h($region['Region']['slug']); ?>&nbsp;</td>
		<td><?php echo h($region['Region']['html_title']); ?>&nbsp;</td>
		<td><?php echo h($region['Region']['html_keywords']); ?>&nbsp;</td>
		<td><?php echo h($region['Region']['html_description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $region['Region']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $region['Region']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $region['Region']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $region['Region']['id'])]); ?>
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
		<li><?php echo $this->Html->link(__('New Region'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), ['controller' => 'countries', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), ['controller' => 'countries', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Districts'), ['controller' => 'districts', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New District'), ['controller' => 'districts', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), ['controller' => 'areas', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), ['controller' => 'areas', 'action' => 'add']); ?> </li>
	</ul>
</div>
