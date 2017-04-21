<div class="specialOffers view">
<h2><?php echo __('Special Offer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($specialOffer['SpecialOffer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($specialOffer['SpecialOffer']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($specialOffer['SpecialOffer']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Special Offer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($specialOffer['ParentSpecialOffer']['id'], array('controller' => 'special_offers', 'action' => 'view', $specialOffer['ParentSpecialOffer']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('House'); ?></dt>
		<dd>
			<?php echo $this->Html->link($specialOffer['House']['name'], array('controller' => 'houses', 'action' => 'view', $specialOffer['House']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($specialOffer['SpecialOffer']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('From'); ?></dt>
		<dd>
			<?php echo h($specialOffer['SpecialOffer']['from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('To'); ?></dt>
		<dd>
			<?php echo h($specialOffer['SpecialOffer']['to']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Referential'); ?></dt>
		<dd>
			<?php echo h($specialOffer['SpecialOffer']['referential']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hidden'); ?></dt>
		<dd>
			<?php echo h($specialOffer['SpecialOffer']['hidden']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Title'); ?></dt>
		<dd>
			<?php echo h($specialOffer['SpecialOffer']['html_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Keywords'); ?></dt>
		<dd>
			<?php echo h($specialOffer['SpecialOffer']['html_keywords']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Description'); ?></dt>
		<dd>
			<?php echo h($specialOffer['SpecialOffer']['html_description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Special Offer'), array('action' => 'edit', $specialOffer['SpecialOffer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Special Offer'), array('action' => 'delete', $specialOffer['SpecialOffer']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $specialOffer['SpecialOffer']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Special Offers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Special Offer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Special Offers'), array('controller' => 'special_offers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Special Offer'), array('controller' => 'special_offers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Portals'), array('controller' => 'portals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Portal'), array('controller' => 'portals', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Special Offers'); ?></h3>
	<?php if (!empty($specialOffer['ChildSpecialOffer'])): ?>
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
	<?php foreach ($specialOffer['ChildSpecialOffer'] as $childSpecialOffer): ?>
		<tr>
			<td><?php echo $childSpecialOffer['id']; ?></td>
			<td><?php echo $childSpecialOffer['lft']; ?></td>
			<td><?php echo $childSpecialOffer['rght']; ?></td>
			<td><?php echo $childSpecialOffer['parent_id']; ?></td>
			<td><?php echo $childSpecialOffer['house_id']; ?></td>
			<td><?php echo $childSpecialOffer['content']; ?></td>
			<td><?php echo $childSpecialOffer['from']; ?></td>
			<td><?php echo $childSpecialOffer['to']; ?></td>
			<td><?php echo $childSpecialOffer['referential']; ?></td>
			<td><?php echo $childSpecialOffer['hidden']; ?></td>
			<td><?php echo $childSpecialOffer['html_title']; ?></td>
			<td><?php echo $childSpecialOffer['html_keywords']; ?></td>
			<td><?php echo $childSpecialOffer['html_description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'special_offers', 'action' => 'view', $childSpecialOffer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'special_offers', 'action' => 'edit', $childSpecialOffer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'special_offers', 'action' => 'delete', $childSpecialOffer['id']), array('confirm' => __('Are you sure you want to delete # %s?', $childSpecialOffer['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Special Offer'), array('controller' => 'special_offers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Portals'); ?></h3>
	<?php if (!empty($specialOffer['Portal'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($specialOffer['Portal'] as $portal): ?>
		<tr>
			<td><?php echo $portal['id']; ?></td>
			<td><?php echo $portal['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'portals', 'action' => 'view', $portal['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'portals', 'action' => 'edit', $portal['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'portals', 'action' => 'delete', $portal['id']), array('confirm' => __('Are you sure you want to delete # %s?', $portal['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Portal'), array('controller' => 'portals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
