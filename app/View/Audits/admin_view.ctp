<div class="audits view">
<h2><?php echo __('Audit'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($audit['Audit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo h($audit['Audit']['event']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Model'); ?></dt>
		<dd>
			<?php echo h($audit['Audit']['model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entity Id'); ?></dt>
		<dd>
			<?php echo h($audit['Audit']['entity_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Request Id'); ?></dt>
		<dd>
			<?php echo h($audit['Audit']['request_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Json Object'); ?></dt>
		<dd>
			<?php echo h($audit['Audit']['json_object']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($audit['Audit']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Source Id'); ?></dt>
		<dd>
			<?php echo h($audit['Audit']['source_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($audit['Audit']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Audit'), array('action' => 'edit', $audit['Audit']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Audit'), array('action' => 'delete', $audit['Audit']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $audit['Audit']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Audits'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Audit'), array('action' => 'add')); ?> </li>
	</ul>
</div>
