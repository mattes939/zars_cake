<div class="values view">
<h2><?php echo __('Value'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($value['Value']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('House'); ?></dt>
		<dd>
			<?php echo $this->Html->link($value['House']['name'], array('controller' => 'houses', 'action' => 'view', $value['House']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Property'); ?></dt>
		<dd>
			<?php echo $this->Html->link($value['Property']['name'], array('controller' => 'properties', 'action' => 'view', $value['Property']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('True'); ?></dt>
		<dd>
			<?php echo h($value['Value']['switch']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($value['Value']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($value['Value']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($value['Value']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Value'), array('action' => 'edit', $value['Value']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Value'), array('action' => 'delete', $value['Value']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $value['Value']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Values'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Value'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Properties'), array('controller' => 'properties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Property'), array('controller' => 'properties', 'action' => 'add')); ?> </li>
	</ul>
</div>
