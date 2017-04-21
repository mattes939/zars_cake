<div class="areas view">
<h2><?php echo __('Area'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($area['Area']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($area['Area']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($area['Area']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Map'); ?></dt>
		<dd>
			<?php echo h($area['Area']['map']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Title'); ?></dt>
		<dd>
			<?php echo h($area['Area']['html_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Description'); ?></dt>
		<dd>
			<?php echo h($area['Area']['html_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Keywords'); ?></dt>
		<dd>
			<?php echo h($area['Area']['html_keywords']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Area'), array('action' => 'edit', $area['Area']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Area'), array('action' => 'delete', $area['Area']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $area['Area']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Selections'), array('controller' => 'selections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selection'), array('controller' => 'selections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('controller' => 'regions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Selections'); ?></h3>
	<?php if (!empty($area['Selection'])): ?>
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
	<?php foreach ($area['Selection'] as $selection): ?>
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
	<h3><?php echo __('Related Articles'); ?></h3>
	<?php if (!empty($area['Article'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Hidden'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Html Title'); ?></th>
		<th><?php echo __('Html Keywords'); ?></th>
		<th><?php echo __('Html Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($area['Article'] as $article): ?>
		<tr>
			<td><?php echo $article['id']; ?></td>
			<td><?php echo $article['lft']; ?></td>
			<td><?php echo $article['rght']; ?></td>
			<td><?php echo $article['parent_id']; ?></td>
			<td><?php echo $article['title']; ?></td>
			<td><?php echo $article['content']; ?></td>
			<td><?php echo $article['hidden']; ?></td>
			<td><?php echo $article['slug']; ?></td>
			<td><?php echo $article['html_title']; ?></td>
			<td><?php echo $article['html_keywords']; ?></td>
			<td><?php echo $article['html_description']; ?></td>
			<td><?php echo $article['created']; ?></td>
			<td><?php echo $article['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'articles', 'action' => 'view', $article['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'articles', 'action' => 'edit', $article['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'articles', 'action' => 'delete', $article['id']), array('confirm' => __('Are you sure you want to delete # %s?', $article['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Houses'); ?></h3>
	<?php if (!empty($area['House'])): ?>
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
	<?php foreach ($area['House'] as $house): ?>
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
	<h3><?php echo __('Related Regions'); ?></h3>
	<?php if (!empty($area['Region'])): ?>
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
	<?php foreach ($area['Region'] as $region): ?>
		<tr>
			<td><?php echo $region['id']; ?></td>
			<td><?php echo $region['country_id']; ?></td>
			<td><?php echo $region['name']; ?></td>
			<td><?php echo $region['slug']; ?></td>
			<td><?php echo $region['html_title']; ?></td>
			<td><?php echo $region['html_keywords']; ?></td>
			<td><?php echo $region['html_description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'regions', 'action' => 'view', $region['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'regions', 'action' => 'edit', $region['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'regions', 'action' => 'delete', $region['id']), array('confirm' => __('Are you sure you want to delete # %s?', $region['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
