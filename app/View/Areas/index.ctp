<div class="areas index">
	<h2><?php echo __('Areas'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('map'); ?></th>
			<th><?php echo $this->Paginator->sort('html_title'); ?></th>
			<th><?php echo $this->Paginator->sort('html_description'); ?></th>
			<th><?php echo $this->Paginator->sort('html_keywords'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($areas as $area): ?>
	<tr>
		<td><?php echo h($area['Area']['id']); ?>&nbsp;</td>
		<td><?php echo h($area['Area']['name']); ?>&nbsp;</td>
		<td><?php echo h($area['Area']['slug']); ?>&nbsp;</td>
		<td><?php echo h($area['Area']['map']); ?>&nbsp;</td>
		<td><?php echo h($area['Area']['html_title']); ?>&nbsp;</td>
		<td><?php echo h($area['Area']['html_description']); ?>&nbsp;</td>
		<td><?php echo h($area['Area']['html_keywords']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $area['Area']['slug'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $area['Area']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $area['Area']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $area['Area']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Area'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Selections'), array('controller' => 'selections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selection'), array('controller' => 'selections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('controller' => 'regions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
	</ul>
</div>
