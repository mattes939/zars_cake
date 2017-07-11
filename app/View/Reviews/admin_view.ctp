<div class="reviews view">
<h2><?php echo __('Review'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($review['Review']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('House'); ?></dt>
		<dd>
			<?php echo $this->Html->link($review['House']['name'], ['controller' => 'houses', 'action' => 'view', $review['House']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($review['User']['username'], ['controller' => 'users', 'action' => 'view', $review['User']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Score'); ?></dt>
		<dd>
			<?php echo h($review['Review']['score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pros'); ?></dt>
		<dd>
			<?php echo h($review['Review']['pros']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cons'); ?></dt>
		<dd>
			<?php echo h($review['Review']['cons']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Public'); ?></dt>
		<dd>
			<?php echo h($review['Review']['public']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($review['Review']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($review['Review']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Review'), ['action' => 'edit', $review['Review']['id']]); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Review'), ['action' => 'delete', $review['Review']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $review['Review']['id'])]); ?> </li>
		<li><?php echo $this->Html->link(__('List Reviews'), ['action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Review'), ['action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), ['controller' => 'users', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), ['controller' => 'users', 'action' => 'add']); ?> </li>
	</ul>
</div>
