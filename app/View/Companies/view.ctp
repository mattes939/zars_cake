<div class="companies view">
<h2><?php echo __('Company'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($company['Company']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($company['Company']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($company['Company']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($company['Company']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ico'); ?></dt>
		<dd>
			<?php echo h($company['Company']['ico']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dic'); ?></dt>
		<dd>
			<?php echo h($company['Company']['dic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bank Account'); ?></dt>
		<dd>
			<?php echo h($company['Company']['bank_account']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bank Code'); ?></dt>
		<dd>
			<?php echo h($company['Company']['bank_code']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Company'), ['action' => 'edit', $company['Company']['id']]); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Company'), ['action' => 'delete', $company['Company']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $company['Company']['id'])]); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), ['action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), ['action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), ['controller' => 'orders', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), ['controller' => 'orders', 'action' => 'add']); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($company['Order'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('House Id'); ?></th>
		<th><?php echo __('Travel Date Id'); ?></th>
		<th><?php echo __('Attendants'); ?></th>
		<th><?php echo __('Adults'); ?></th>
		<th><?php echo __('Young'); ?></th>
		<th><?php echo __('Children'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Confirmed'); ?></th>
		<th><?php echo __('Canceled'); ?></th>
		<th><?php echo __('Start Day'); ?></th>
		<th><?php echo __('End Day'); ?></th>
		<th><?php echo __('Start Time'); ?></th>
		<th><?php echo __('End Time'); ?></th>
		<th><?php echo __('Employer Contribution'); ?></th>
		<th><?php echo __('Animals'); ?></th>
		<th><?php echo __('Animals Details'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Discount'); ?></th>
		<th><?php echo __('Final Price'); ?></th>
		<th><?php echo __('Provision'); ?></th>
		<th><?php echo __('Provision Reg'); ?></th>
		<th><?php echo __('Billing Price'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($company['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td><?php echo $order['company_id']; ?></td>
			<td><?php echo $order['user_id']; ?></td>
			<td><?php echo $order['house_id']; ?></td>
			<td><?php echo $order['travel_date_id']; ?></td>
			<td><?php echo $order['attendants']; ?></td>
			<td><?php echo $order['adults']; ?></td>
			<td><?php echo $order['young']; ?></td>
			<td><?php echo $order['children']; ?></td>
			<td><?php echo $order['comment']; ?></td>
			<td><?php echo $order['created']; ?></td>
			<td><?php echo $order['confirmed']; ?></td>
			<td><?php echo $order['canceled']; ?></td>
			<td><?php echo $order['start_day']; ?></td>
			<td><?php echo $order['end_day']; ?></td>
			<td><?php echo $order['start_time']; ?></td>
			<td><?php echo $order['end_time']; ?></td>
			<td><?php echo $order['employer_contribution']; ?></td>
			<td><?php echo $order['animals']; ?></td>
			<td><?php echo $order['animals_details']; ?></td>
			<td><?php echo $order['price']; ?></td>
			<td><?php echo $order['discount']; ?></td>
			<td><?php echo $order['final_price']; ?></td>
			<td><?php echo $order['provision']; ?></td>
			<td><?php echo $order['provision_reg']; ?></td>
			<td><?php echo $order['billing_price']; ?></td>
			<td><?php echo $order['notes']; ?></td>
			<td><?php echo $order['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), ['controller' => 'orders', 'action' => 'view', $order['id']]); ?>
				<?php echo $this->Html->link(__('Edit'), ['controller' => 'orders', 'action' => 'edit', $order['id']]); ?>
				<?php echo $this->Form->postLink(__('Delete'), ['controller' => 'orders', 'action' => 'delete', $order['id']], ['confirm' => __('Are you sure you want to delete # %s?', $order['id'])]); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), ['controller' => 'orders', 'action' => 'add']); ?> </li>
		</ul>
	</div>
</div>
