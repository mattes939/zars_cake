<div class="countries view">
<h2><?php echo __('Country'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($country['Country']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($country['Country']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($country['Country']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Title'); ?></dt>
		<dd>
			<?php echo h($country['Country']['html_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Keywords'); ?></dt>
		<dd>
			<?php echo h($country['Country']['html_keywords']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Description'); ?></dt>
		<dd>
			<?php echo h($country['Country']['html_description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Country'), ['action' => 'edit', $country['Country']['id']]); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Country'), ['action' => 'delete', $country['Country']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $country['Country']['id'])]); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), ['action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), ['action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), ['controller' => 'addresses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), ['controller' => 'addresses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), ['controller' => 'regions', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), ['controller' => 'regions', 'action' => 'add']); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Addresses'); ?></h3>
	<?php if (!empty($country['Address'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Address Type Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Street'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Psc'); ?></th>
		<th><?php echo __('House Id'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($country['Address'] as $address): ?>
		<tr>
			<td><?php echo $address['id']; ?></td>
			<td><?php echo $address['address_type_id']; ?></td>
			<td><?php echo $address['user_id']; ?></td>
			<td><?php echo $address['street']; ?></td>
			<td><?php echo $address['city']; ?></td>
			<td><?php echo $address['psc']; ?></td>
			<td><?php echo $address['house_id']; ?></td>
			<td><?php echo $address['country_id']; ?></td>
			<td><?php echo $address['created']; ?></td>
			<td><?php echo $address['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), ['controller' => 'addresses', 'action' => 'view', $address['id']]); ?>
				<?php echo $this->Html->link(__('Edit'), ['controller' => 'addresses', 'action' => 'edit', $address['id']]); ?>
				<?php echo $this->Form->postLink(__('Delete'), ['controller' => 'addresses', 'action' => 'delete', $address['id']], ['confirm' => __('Are you sure you want to delete # %s?', $address['id'])]); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Address'), ['controller' => 'addresses', 'action' => 'add']); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Regions'); ?></h3>
	<?php if (!empty($country['Region'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Html Title'); ?></th>
		<th><?php echo __('Html Keywords'); ?></th>
		<th><?php echo __('Html Description'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($country['Region'] as $region): ?>
		<tr>
			<td><?php echo $region['id']; ?></td>
			<td><?php echo $region['country_id']; ?></td>
			<td><?php echo $region['name']; ?></td>
			<td><?php echo $region['slug']; ?></td>
			<td><?php echo $region['html_title']; ?></td>
			<td><?php echo $region['html_keywords']; ?></td>
			<td><?php echo $region['html_description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), ['controller' => 'regions', 'action' => 'view', $region['id']]); ?>
				<?php echo $this->Html->link(__('Edit'), ['controller' => 'regions', 'action' => 'edit', $region['id']]); ?>
				<?php echo $this->Form->postLink(__('Delete'), ['controller' => 'regions', 'action' => 'delete', $region['id']], ['confirm' => __('Are you sure you want to delete # %s?', $region['id'])]); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Region'), ['controller' => 'regions', 'action' => 'add']); ?> </li>
		</ul>
	</div>
</div>
