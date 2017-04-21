<div class="regions view">
<h2><?php echo __('Region'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($region['Region']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($region['Country']['name'], array('controller' => 'countries', 'action' => 'view', $region['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($region['Region']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($region['Region']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Title'); ?></dt>
		<dd>
			<?php echo h($region['Region']['html_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Keywords'); ?></dt>
		<dd>
			<?php echo h($region['Region']['html_keywords']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Description'); ?></dt>
		<dd>
			<?php echo h($region['Region']['html_description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Region'), array('action' => 'edit', $region['Region']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Region'), array('action' => 'delete', $region['Region']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $region['Region']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Districts'), array('controller' => 'districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District'), array('controller' => 'districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), array('controller' => 'areas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Districts'); ?></h3>
	<?php if (!empty($region['District'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Region Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Html Title'); ?></th>
		<th><?php echo __('Html Keywords'); ?></th>
		<th><?php echo __('Html Description'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($region['District'] as $district): ?>
		<tr>
			<td><?php echo $district['id']; ?></td>
			<td><?php echo $district['region_id']; ?></td>
			<td><?php echo $district['name']; ?></td>
			<td><?php echo $district['slug']; ?></td>
			<td><?php echo $district['html_title']; ?></td>
			<td><?php echo $district['html_keywords']; ?></td>
			<td><?php echo $district['html_description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'districts', 'action' => 'view', $district['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'districts', 'action' => 'edit', $district['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'districts', 'action' => 'delete', $district['id']), array('confirm' => __('Are you sure you want to delete # %s?', $district['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New District'), array('controller' => 'districts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Houses'); ?></h3>
	<?php if (!empty($region['House'])): ?>
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
	<?php foreach ($region['House'] as $house): ?>
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
				<?php echo $this->Html->link(__('View'), array('controller' => 'houses', 'action' => 'view', $house['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'houses', 'action' => 'edit', $house['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'houses', 'action' => 'delete', $house['id']), array('confirm' => __('Are you sure you want to delete # %s?', $house['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Areas'); ?></h3>
	<?php if (!empty($region['Area'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Map'); ?></th>
		<th><?php echo __('Html Title'); ?></th>
		<th><?php echo __('Html Description'); ?></th>
		<th><?php echo __('Html Keywords'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($region['Area'] as $area): ?>
		<tr>
			<td><?php echo $area['id']; ?></td>
			<td><?php echo $area['name']; ?></td>
			<td><?php echo $area['slug']; ?></td>
			<td><?php echo $area['map']; ?></td>
			<td><?php echo $area['html_title']; ?></td>
			<td><?php echo $area['html_description']; ?></td>
			<td><?php echo $area['html_keywords']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'areas', 'action' => 'view', $area['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'areas', 'action' => 'edit', $area['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'areas', 'action' => 'delete', $area['id']), array('confirm' => __('Are you sure you want to delete # %s?', $area['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Area'), array('controller' => 'areas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
