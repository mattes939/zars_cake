<div class="addresses view">
<h2><?php echo __('Address'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($address['Address']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($address['AddressType']['name'], ['controller' => 'address_types', 'action' => 'view', $address['AddressType']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($address['User']['username'], ['controller' => 'users', 'action' => 'view', $address['User']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($address['Address']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($address['Address']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Psc'); ?></dt>
		<dd>
			<?php echo h($address['Address']['psc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('House'); ?></dt>
		<dd>
			<?php echo $this->Html->link($address['House']['name'], ['controller' => 'houses', 'action' => 'view', $address['House']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($address['Country']['name'], ['controller' => 'countries', 'action' => 'view', $address['Country']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($address['Address']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($address['Address']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Address'), ['action' => 'edit', $address['Address']['id']]); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address['Address']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $address['Address']['id'])]); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), ['action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), ['action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Address Types'), ['controller' => 'address_types', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Address Type'), ['controller' => 'address_types', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), ['controller' => 'users', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), ['controller' => 'users', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), ['controller' => 'countries', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), ['controller' => 'countries', 'action' => 'add']); ?> </li>
	</ul>
</div>
