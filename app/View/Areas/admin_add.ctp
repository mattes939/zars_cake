<div class="areas form">
<?php echo $this->Form->create('Area'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Area'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('slug');
		echo $this->Form->input('map');
		echo $this->Form->input('html_title');
		echo $this->Form->input('html_description');
		echo $this->Form->input('html_keywords');
		echo $this->Form->input('Article');
		echo $this->Form->input('House');
		echo $this->Form->input('Region');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Areas'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Selections'), ['controller' => 'selections', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Selection'), ['controller' => 'selections', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), ['controller' => 'articles', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), ['controller' => 'articles', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), ['controller' => 'regions', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), ['controller' => 'regions', 'action' => 'add']); ?> </li>
	</ul>
</div>
