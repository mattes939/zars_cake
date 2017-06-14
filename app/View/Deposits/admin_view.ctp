<div class="deposits view">
<h2><?php echo __('Deposit'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($deposit['Deposit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($deposit['Order']['id'], array('controller' => 'orders', 'action' => 'view', $deposit['Order']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deposit Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($deposit['DepositType']['name'], array('controller' => 'deposit_types', 'action' => 'view', $deposit['DepositType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($deposit['Deposit']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maturity'); ?></dt>
		<dd>
			<?php echo h($deposit['Deposit']['maturity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pay Date'); ?></dt>
		<dd>
			<?php echo h($deposit['Deposit']['pay_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($deposit['Deposit']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($deposit['Deposit']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Deposit'), array('action' => 'edit', $deposit['Deposit']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Deposit'), array('action' => 'delete', $deposit['Deposit']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $deposit['Deposit']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Deposits'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deposit'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Deposit Types'), array('controller' => 'deposit_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deposit Type'), array('controller' => 'deposit_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
