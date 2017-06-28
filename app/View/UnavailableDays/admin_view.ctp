<div class="unavailableDays view">
<h2><?php echo __('Unavailable Day'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($unavailableDay['UnavailableDay']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('House Date'); ?></dt>
		<dd>
			<?php echo $this->Html->link($unavailableDay['HouseDate']['id'], ['controller' => 'house_dates', 'action' => 'view', $unavailableDay['HouseDate']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($unavailableDay['UnavailableDay']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($unavailableDay['UnavailableDay']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($unavailableDay['UnavailableDay']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Unavailable Day'), ['action' => 'edit', $unavailableDay['UnavailableDay']['id']]); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Unavailable Day'), ['action' => 'delete', $unavailableDay['UnavailableDay']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $unavailableDay['UnavailableDay']['id'])]); ?> </li>
		<li><?php echo $this->Html->link(__('List Unavailable Days'), ['action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Unavailable Day'), ['action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List House Dates'), ['controller' => 'house_dates', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House Date'), ['controller' => 'house_dates', 'action' => 'add']); ?> </li>
	</ul>
</div>
