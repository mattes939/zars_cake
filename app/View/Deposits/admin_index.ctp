<div class="deposits index">
	<h2><?php echo __('Deposits'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('order_id'); ?></th>
			<th><?php echo $this->Paginator->sort('deposit_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('maturity'); ?></th>
			<th><?php echo $this->Paginator->sort('pay_date'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($deposits as $deposit): ?>
	<tr>
		<td><?php echo h($deposit['Deposit']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($deposit['Order']['id'], ['controller' => 'orders', 'action' => 'view', $deposit['Order']['id']]); ?>
		</td>
		<td>
			<?php echo $this->Html->link($deposit['DepositType']['name'], ['controller' => 'deposit_types', 'action' => 'view', $deposit['DepositType']['id']]); ?>
		</td>
		<td><?php echo h($deposit['Deposit']['price']); ?>&nbsp;</td>
		<td><?php echo h($deposit['Deposit']['maturity']); ?>&nbsp;</td>
		<td><?php echo h($deposit['Deposit']['pay_date']); ?>&nbsp;</td>
		<td><?php echo h($deposit['Deposit']['created']); ?>&nbsp;</td>
		<td><?php echo h($deposit['Deposit']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $deposit['Deposit']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $deposit['Deposit']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $deposit['Deposit']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $deposit['Deposit']['id'])]); ?>
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
		<li><?php echo $this->Html->link(__('New Deposit'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), ['controller' => 'orders', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), ['controller' => 'orders', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Deposit Types'), ['controller' => 'deposit_types', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Deposit Type'), ['controller' => 'deposit_types', 'action' => 'add']); ?> </li>
	</ul>
</div>
