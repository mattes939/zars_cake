<div class="portals form">
<?php echo $this->Form->create('Portal'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Portal'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('House');
		echo $this->Form->input('SpecialOffer');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $this->Form->value('Portal.id')], ['confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Portal.id'))]); ?></li>
		<li><?php echo $this->Html->link(__('List Portals'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Houses'), ['controller' => 'houses', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), ['controller' => 'houses', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Special Offers'), ['controller' => 'special_offers', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Special Offer'), ['controller' => 'special_offers', 'action' => 'add']); ?> </li>
	</ul>
</div>
