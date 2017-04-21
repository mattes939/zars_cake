<div class="portals view">
<h2><?php echo __('Portal'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($portal['Portal']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($portal['Portal']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Portal'), array('action' => 'edit', $portal['Portal']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Portal'), array('action' => 'delete', $portal['Portal']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $portal['Portal']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Portals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Portal'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Special Offers'), array('controller' => 'special_offers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Special Offer'), array('controller' => 'special_offers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Houses'); ?></h3>
	<?php if (!empty($portal['House'])): ?>
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
	<?php foreach ($portal['House'] as $house): ?>
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
	<h3><?php echo __('Related Special Offers'); ?></h3>
	<?php if (!empty($portal['SpecialOffer'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('House Id'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('From'); ?></th>
		<th><?php echo __('To'); ?></th>
		<th><?php echo __('Referential'); ?></th>
		<th><?php echo __('Hidden'); ?></th>
		<th><?php echo __('Html Title'); ?></th>
		<th><?php echo __('Html Keywords'); ?></th>
		<th><?php echo __('Html Description'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($portal['SpecialOffer'] as $specialOffer): ?>
		<tr>
			<td><?php echo $specialOffer['id']; ?></td>
			<td><?php echo $specialOffer['lft']; ?></td>
			<td><?php echo $specialOffer['rght']; ?></td>
			<td><?php echo $specialOffer['parent_id']; ?></td>
			<td><?php echo $specialOffer['house_id']; ?></td>
			<td><?php echo $specialOffer['content']; ?></td>
			<td><?php echo $specialOffer['from']; ?></td>
			<td><?php echo $specialOffer['to']; ?></td>
			<td><?php echo $specialOffer['referential']; ?></td>
			<td><?php echo $specialOffer['hidden']; ?></td>
			<td><?php echo $specialOffer['html_title']; ?></td>
			<td><?php echo $specialOffer['html_keywords']; ?></td>
			<td><?php echo $specialOffer['html_description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'special_offers', 'action' => 'view', $specialOffer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'special_offers', 'action' => 'edit', $specialOffer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'special_offers', 'action' => 'delete', $specialOffer['id']), array('confirm' => __('Are you sure you want to delete # %s?', $specialOffer['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Special Offer'), array('controller' => 'special_offers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
