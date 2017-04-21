<div class="rooms view">
<h2><?php echo __('Room'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($room['Room']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('House'); ?></dt>
		<dd>
			<?php echo $this->Html->link($room['House']['name'], array('controller' => 'houses', 'action' => 'view', $room['House']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($room['Room']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Floor'); ?></dt>
		<dd>
			<?php echo h($room['Room']['floor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Size'); ?></dt>
		<dd>
			<?php echo h($room['Room']['size']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Heating'); ?></dt>
		<dd>
			<?php echo h($room['Room']['heating']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Single Beds'); ?></dt>
		<dd>
			<?php echo h($room['Room']['single_beds']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Double Beds'); ?></dt>
		<dd>
			<?php echo h($room['Room']['double_beds']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bunk Beds'); ?></dt>
		<dd>
			<?php echo h($room['Room']['bunk_beds']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Beds'); ?></dt>
		<dd>
			<?php echo h($room['Room']['total_beds']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Extra Beds'); ?></dt>
		<dd>
			<?php echo h($room['Room']['extra_beds']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($room['Room']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($room['Room']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Room'), array('action' => 'edit', $room['Room']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Room'), array('action' => 'delete', $room['Room']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $room['Room']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
	</ul>
</div>
