<div class="pricelists view">
<h2><?php echo __('Pricelist'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pricelist['Pricelist']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($pricelist['Pricelist']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pricelist'), array('action' => 'edit', $pricelist['Pricelist']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pricelist'), array('action' => 'delete', $pricelist['Pricelist']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $pricelist['Pricelist']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Pricelists'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pricelist'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prices'), array('controller' => 'prices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Price'), array('controller' => 'prices', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Prices'); ?></h3>
	<?php if (!empty($pricelist['Price'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('House Id'); ?></th>
		<th><?php echo __('Travel Date Type Id'); ?></th>
		<th><?php echo __('Pricelist Id'); ?></th>
		<th><?php echo __('Min Nights'); ?></th>
		<th><?php echo __('Min Persons'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Owner Basic'); ?></th>
		<th><?php echo __('Customer Basic'); ?></th>
		<th><?php echo __('Customer Additional Person Night'); ?></th>
		<th><?php echo __('Pricescol'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($pricelist['Price'] as $price): ?>
		<tr>
			<td><?php echo $price['id']; ?></td>
			<td><?php echo $price['house_id']; ?></td>
			<td><?php echo $price['travel_date_type_id']; ?></td>
			<td><?php echo $price['pricelist_id']; ?></td>
			<td><?php echo $price['min_nights']; ?></td>
			<td><?php echo $price['min_persons']; ?></td>
			<td><?php echo $price['created']; ?></td>
			<td><?php echo $price['modified']; ?></td>
			<td><?php echo $price['owner_basic']; ?></td>
			<td><?php echo $price['customer_basic']; ?></td>
			<td><?php echo $price['customer_additional_person_night']; ?></td>
			<td><?php echo $price['pricescol']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'prices', 'action' => 'view', $price['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'prices', 'action' => 'edit', $price['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'prices', 'action' => 'delete', $price['id']), array('confirm' => __('Are you sure you want to delete # %s?', $price['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Price'), array('controller' => 'prices', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
