<div class="districts view">
<h2><?php echo __('District'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($district['District']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo $this->Html->link($district['Region']['name'], ['controller' => 'regions', 'action' => 'view', $district['Region']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($district['District']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($district['District']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Title'); ?></dt>
		<dd>
			<?php echo h($district['District']['html_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Keywords'); ?></dt>
		<dd>
			<?php echo h($district['District']['html_keywords']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Description'); ?></dt>
		<dd>
			<?php echo h($district['District']['html_description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit District'), ['action' => 'edit', $district['District']['id']]); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete District'), ['action' => 'delete', $district['District']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $district['District']['id'])]); ?> </li>
		<li><?php echo $this->Html->link(__('List Districts'), ['action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New District'), ['action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), ['controller' => 'regions', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), ['controller' => 'regions', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Houses'); ?></h3>
	<?php if (!empty($district['House'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Region Id'); ?></th>
		<th><?php echo __('District Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Long Name'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Coordinates'); ?></th>
		<th><?php echo __('Html Title'); ?></th>
		<th><?php echo __('Html Keywords'); ?></th>
		<th><?php echo __('Html Description'); ?></th>
		<th><?php echo __('Text Description'); ?></th>
		<th><?php echo __('Text Prices'); ?></th>
		<th><?php echo __('Text Equipment'); ?></th>
		<th><?php echo __('Text Activities'); ?></th>
		<th><?php echo __('Text Summer Activities'); ?></th>
		<th><?php echo __('Text Winter Activities'); ?></th>
		<th><?php echo __('Text Trips'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($district['House'] as $house): ?>
		<tr>
			<td><?php echo $house['id']; ?></td>
			<td><?php echo $house['user_id']; ?></td>
			<td><?php echo $house['region_id']; ?></td>
			<td><?php echo $house['district_id']; ?></td>
			<td><?php echo $house['code']; ?></td>
			<td><?php echo $house['name']; ?></td>
			<td><?php echo $house['slug']; ?></td>
			<td><?php echo $house['long_name']; ?></td>
			<td><?php echo $house['active']; ?></td>
			<td><?php echo $house['website']; ?></td>
			<td><?php echo $house['coordinates']; ?></td>
			<td><?php echo $house['html_title']; ?></td>
			<td><?php echo $house['html_keywords']; ?></td>
			<td><?php echo $house['html_description']; ?></td>
			<td><?php echo $house['text_description']; ?></td>
			<td><?php echo $house['text_prices']; ?></td>
			<td><?php echo $house['text_equipment']; ?></td>
			<td><?php echo $house['text_activities']; ?></td>
			<td><?php echo $house['text_summer_activities']; ?></td>
			<td><?php echo $house['text_winter_activities']; ?></td>
			<td><?php echo $house['text_trips']; ?></td>
			<td><?php echo $house['created']; ?></td>
			<td><?php echo $house['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), ['controller' => 'houses', 'action' => 'view', $house['id']]); ?>
				<?php echo $this->Html->link(__('Edit'), ['controller' => 'houses', 'action' => 'edit', $house['id']]); ?>
				<?php echo $this->Form->postLink(__('Delete'), ['controller' => 'houses', 'action' => 'delete', $house['id']], ['confirm' => __('Are you sure you want to delete # %s?', $house['id'])]); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		</ul>
	</div>
</div>
