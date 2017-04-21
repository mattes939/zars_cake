<div class="travelDateTypes view">
<h2><?php echo __('Travel Date Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($travelDateType['TravelDateType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($travelDateType['TravelDateType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Travel Date Type'), array('action' => 'edit', $travelDateType['TravelDateType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Travel Date Type'), array('action' => 'delete', $travelDateType['TravelDateType']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $travelDateType['TravelDateType']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Date Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Dates'), array('controller' => 'travel_dates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date'), array('controller' => 'travel_dates', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Travel Dates'); ?></h3>
	<?php if (!empty($travelDateType['TravelDate'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Travel Date Type Id'); ?></th>
		<th><?php echo __('From'); ?></th>
		<th><?php echo __('To'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($travelDateType['TravelDate'] as $travelDate): ?>
		<tr>
			<td><?php echo $travelDate['id']; ?></td>
			<td><?php echo $travelDate['travel_date_type_id']; ?></td>
			<td><?php echo $travelDate['from']; ?></td>
			<td><?php echo $travelDate['to']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'travel_dates', 'action' => 'view', $travelDate['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'travel_dates', 'action' => 'edit', $travelDate['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'travel_dates', 'action' => 'delete', $travelDate['id']), array('confirm' => __('Are you sure you want to delete # %s?', $travelDate['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Travel Date'), array('controller' => 'travel_dates', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
