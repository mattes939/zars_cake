<div class="articles form">
<?php echo $this->Form->create('Article'); ?>
	<fieldset>
		<legend><?php echo __('Edit Article'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('lft');
		echo $this->Form->input('rght');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('title');
		echo $this->Form->input('content');
		echo $this->Form->input('hidden');
		echo $this->Form->input('slug');
		echo $this->Form->input('html_title');
		echo $this->Form->input('html_keywords');
		echo $this->Form->input('html_description');
		echo $this->Form->input('Area');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $this->Form->value('Article.id')], ['confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Article.id'))]); ?></li>
		<li><?php echo $this->Html->link(__('List Articles'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Articles'), ['controller' => 'articles', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Article'), ['controller' => 'articles', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), ['controller' => 'areas', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), ['controller' => 'areas', 'action' => 'add']); ?> </li>
	</ul>
</div>
