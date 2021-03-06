<div class="selections view">
<h2><?php echo __('Selection'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($selection['Selection']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area'); ?></dt>
		<dd>
			<?php echo $this->Html->link($selection['Area']['name'], ['controller' => 'areas', 'action' => 'view', $selection['Area']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Property'); ?></dt>
		<dd>
			<?php echo $this->Html->link($selection['Property']['name'], ['controller' => 'properties', 'action' => 'view', $selection['Property']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($selection['Selection']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($selection['Selection']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($selection['Selection']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Keywords'); ?></dt>
		<dd>
			<?php echo h($selection['Selection']['html_keywords']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Title'); ?></dt>
		<dd>
			<?php echo h($selection['Selection']['html_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Description'); ?></dt>
		<dd>
			<?php echo h($selection['Selection']['html_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($selection['Selection']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($selection['Selection']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Selection'), ['action' => 'edit', $selection['Selection']['id']]); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Selection'), ['action' => 'delete', $selection['Selection']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $selection['Selection']['id'])]); ?> </li>
		<li><?php echo $this->Html->link(__('List Selections'), ['action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Selection'), ['action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), ['controller' => 'areas', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), ['controller' => 'areas', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Properties'), ['controller' => 'properties', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Property'), ['controller' => 'properties', 'action' => 'add']); ?> </li>
	</ul>
</div>
