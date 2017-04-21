<div class="propertyTypes view">
<h2><?php echo __('Property Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($propertyType['PropertyType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($propertyType['PropertyType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Property Type'), array('action' => 'edit', $propertyType['PropertyType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Property Type'), array('action' => 'delete', $propertyType['PropertyType']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $propertyType['PropertyType']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Property Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Property Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Properties'), array('controller' => 'properties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Property'), array('controller' => 'properties', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Properties'); ?></h3>
	<?php if (!empty($propertyType['Property'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Property Type Id'); ?></th>
		<th><?php echo __('Important'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Html Title'); ?></th>
		<th><?php echo __('Html Keywords'); ?></th>
		<th><?php echo __('Html Description'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($propertyType['Property'] as $property): ?>
		<tr>
			<td><?php echo $property['id']; ?></td>
			<td><?php echo $property['property_type_id']; ?></td>
			<td><?php echo $property['important']; ?></td>
			<td><?php echo $property['name']; ?></td>
			<td><?php echo $property['slug']; ?></td>
			<td><?php echo $property['html_title']; ?></td>
			<td><?php echo $property['html_keywords']; ?></td>
			<td><?php echo $property['html_description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'properties', 'action' => 'view', $property['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'properties', 'action' => 'edit', $property['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'properties', 'action' => 'delete', $property['id']), array('confirm' => __('Are you sure you want to delete # %s?', $property['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Property'), array('controller' => 'properties', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
