<div class="companies index">
	<h2><?php echo __('Companies'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('street'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('ico'); ?></th>
			<th><?php echo $this->Paginator->sort('dic'); ?></th>
			<th><?php echo $this->Paginator->sort('bank_account'); ?></th>
			<th><?php echo $this->Paginator->sort('bank_code'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($companies as $company): ?>
	<tr>
		<td><?php echo h($company['Company']['id']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['name']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['street']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['city']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['ico']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['dic']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['bank_account']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['bank_code']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $company['Company']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $company['Company']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $company['Company']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $company['Company']['id'])]); ?>
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
		<li><?php echo $this->Html->link(__('New Company'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), ['controller' => 'orders', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), ['controller' => 'orders', 'action' => 'add']); ?> </li>
	</ul>
</div>
