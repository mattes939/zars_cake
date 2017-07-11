<div class="prices view">
<h2><?php echo __('Price'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($price['Price']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('House'); ?></dt>
		<dd>
			<?php echo $this->Html->link($price['House']['name'], array('controller' => 'houses', 'action' => 'view', $price['House']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Travel Date Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($price['TravelDateType']['name'], array('controller' => 'travel_date_types', 'action' => 'view', $price['TravelDateType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Nights'); ?></dt>
		<dd>
			<?php echo h($price['Price']['min_nights']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Persons'); ?></dt>
		<dd>
			<?php echo h($price['Price']['min_persons']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Owner Basic'); ?></dt>
		<dd>
			<?php echo h($price['Price']['owner_basic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Owner Additional Person Night'); ?></dt>
		<dd>
			<?php echo h($price['Price']['owner_additional_person_night']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer Basic'); ?></dt>
		<dd>
			<?php echo h($price['Price']['customer_basic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer Additional Person Night'); ?></dt>
		<dd>
			<?php echo h($price['Price']['customer_additional_person_night']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($price['Price']['notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($price['Price']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($price['Price']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Price'), array('action' => 'edit', $price['Price']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Price'), array('action' => 'delete', $price['Price']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $price['Price']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Prices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Price'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Date Types'), array('controller' => 'travel_date_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Date Type'), array('controller' => 'travel_date_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
