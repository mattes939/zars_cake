<div class="properties form">
<?php echo $this->Form->create('Property'); ?>
	<fieldset>
		<legend><?php echo __('Add Property'); ?></legend>
                <div style="float: left;width: 300px;">
	<?php
		echo $this->Form->input('property_type_id', ['type' => 'radio']);
                ?></div><div style="float: right;width: 300px; clear: none;margin-top:300px;"> <?php
		echo $this->Form->input('important');
		echo $this->Form->input('name', ['autofocus']);
//		echo $this->Form->input('slug');
		echo $this->Form->input('html_title');
		echo $this->Form->input('html_keywords');
		echo $this->Form->input('html_description');
                
                 echo $this->Form->end(__('Submit'));
                ?></div>
	</fieldset>
<?php ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Properties'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Property Types'), ['controller' => 'property_types', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Property Type'), ['controller' => 'property_types', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Selections'), ['controller' => 'selections', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Selection'), ['controller' => 'selections', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Values'), ['controller' => 'values', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Value'), ['controller' => 'values', 'action' => 'add']); ?> </li>
	</ul>
</div>
