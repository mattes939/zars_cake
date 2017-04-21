<div class="properties view">
<h2><?php echo __('Property'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($property['Property']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Property Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($property['PropertyType']['name'], array('controller' => 'property_types', 'action' => 'view', $property['PropertyType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Important'); ?></dt>
		<dd>
			<?php echo h($property['Property']['important']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($property['Property']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($property['Property']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Title'); ?></dt>
		<dd>
			<?php echo h($property['Property']['html_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Keywords'); ?></dt>
		<dd>
			<?php echo h($property['Property']['html_keywords']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Description'); ?></dt>
		<dd>
			<?php echo h($property['Property']['html_description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Property'), array('action' => 'edit', $property['Property']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Property'), array('action' => 'delete', $property['Property']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $property['Property']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Properties'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Property'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Property Types'), array('controller' => 'property_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Property Type'), array('controller' => 'property_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Selections'), array('controller' => 'selections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selection'), array('controller' => 'selections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Values'), array('controller' => 'values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Value'), array('controller' => 'values', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Selections'); ?></h3>
	<?php if (!empty($property['Selection'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Area Id'); ?></th>
		<th><?php echo __('Property Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Html Keywords'); ?></th>
		<th><?php echo __('Html Title'); ?></th>
		<th><?php echo __('Html Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($property['Selection'] as $selection): ?>
		<tr>
			<td><?php echo $selection['id']; ?></td>
			<td><?php echo $selection['area_id']; ?></td>
			<td><?php echo $selection['property_id']; ?></td>
			<td><?php echo $selection['name']; ?></td>
			<td><?php echo $selection['slug']; ?></td>
			<td><?php echo $selection['content']; ?></td>
			<td><?php echo $selection['html_keywords']; ?></td>
			<td><?php echo $selection['html_title']; ?></td>
			<td><?php echo $selection['html_description']; ?></td>
			<td><?php echo $selection['created']; ?></td>
			<td><?php echo $selection['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'selections', 'action' => 'view', $selection['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'selections', 'action' => 'edit', $selection['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'selections', 'action' => 'delete', $selection['id']), array('confirm' => __('Are you sure you want to delete # %s?', $selection['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Selection'), array('controller' => 'selections', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Values'); ?></h3>
	<?php if (!empty($property['Value'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('House Id'); ?></th>
		<th><?php echo __('Property Id'); ?></th>
		<th><?php echo __('True'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($property['Value'] as $value): ?>
		<tr>
			<td><?php echo $value['id']; ?></td>
			<td><?php echo $value['house_id']; ?></td>
			<td><?php echo $value['property_id']; ?></td>
			<td><?php echo $value['switch']; ?></td>
			<td><?php echo $value['value']; ?></td>
			<td><?php echo $value['created']; ?></td>
			<td><?php echo $value['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'values', 'action' => 'view', $value['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'values', 'action' => 'edit', $value['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'values', 'action' => 'delete', $value['id']), array('confirm' => __('Are you sure you want to delete # %s?', $value['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Value'), array('controller' => 'values', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
